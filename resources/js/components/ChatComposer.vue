<template lang="html">
    <div class="card-body field">
        <div class="control float-left pr-2 w-75">
            <input type="text" class="form-control " v-on:keyup.enter="sendChat" v-model="chat">
        </div>
        <div class="control auto-width ">
            <input type="button" class="btn btn-success w-25" value="send" v-on:click="sendChat">
        </div>
    </div>
</template>

<script lang="ts">

export default{
    props: ['chats', 'userid', 'friendid'],
   data(){
       return {
           chat: ''
       }
   },
   methods:{
       sendChat: function(e){
           if (this.chat != ''){
               var data = {
                   chat: this.chat,
                   user_id_2: this.friendid,
                   user_id_1: this.userid
               }
               this.chat = '';

               axios.post('/chat/sendChat', data).then((response)=>{
                   this.chats.push(data)
               })
           }
       }
   }
}
</script>


<style scoped>
    .card-body{
        flex-direction: row;
        width: 100%;
        border: none;
        padding: 0%;
    }


    .auto-width{
        width:auto;
    }
</style>
