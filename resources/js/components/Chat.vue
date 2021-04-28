<style scoped>
.card-body {
  flex-direction: column;
  border: none;
}
.chat {
  width: 100%;
  padding: 20px;
  box-shadow: inset 0 0 20px gray;
  margin-bottom: 20px;
  border: 1px solid gray;
  max-height: 600px;
  overflow-x: auto;
}

.chat .chat-right, .chat .chat-left {
  max-width: 70%;
  box-shadow: inset 0 0 8px rgb(15, 15, 15);
  padding: 12px;
  margin: 4px;
}

.chat-left{
    background-color: rgb(70, 228, 70);
}

.chat-right{
    background-color: rgb(250, 96, 96);
}

.chat{
    background-color: rgb(32, 32, 32);
}

.no-message {
  height: 200px;
  display: flex;
  align-items: center;
}
/* width */
::-webkit-scrollbar {
  width: 13px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(163, 162, 162);
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: whitesmoke;
}
</style>

<template>
  <div class="card-body">
    <div class="chat" v-if="chats.length != 0">
      <div v-for="chat in chats" style="overflow: auto">
        <div class="chat-left float-left rounded-lg" v-if="chat.user_id_1 == userid">
          {{ chat.chat }}
        </div>
        <div class="chat-right float-right rounded-lg" v-else>
          {{ chat.chat }}
        </div>
      </div>
    </div>
    <div v-else class="no-message">There are no messages</div>
    <chat-composer
      v-bind:userid="userid"
      v-bind:chats="chats"
      v-bind:friendid="friendid"
    ></chat-composer>
  </div>
</template>

<script>
export default {
  props: ["chats", "userid", "friendid"]
};
</script>
