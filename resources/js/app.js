/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: Echo } = require('laravel-echo');

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('chat', require('./components/Chat.vue').default);
Vue.component('chat-composer', require('./components/ChatComposer.vue').default);
Vue.component('onlineuser', require('./components/OnlineUser.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        chats: '',
        onlineUsers: ''
    },
    created() {
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if (friendId != undefined) {
            axios.post('/chat/getChat/' + friendId).then((response) => {
                this.chats = response.data;
            });

            Echo.private('Chat.' + friendId + '.' + userId)
                .listen('BroadcastChat', (e) => {
                    //document.getElementById('audi').play();
                    this.chats.push(e.chat);
                });
        }

        if (userId != 'null') {
            Echo.join('Online')
                .here((users) => {
                    this.onlineUsers = users;
                })
                .joining((user) => {
                    this.onlineUsers.push(user);
                })
                .leaving((user) => {
                    this.onlineUsers = this.onlineUsers.filter((u) => { u != user });
                });
        }
    }
});