<template>
    <div class="flex-1 overflow-y-scroll" v-chat-scroll>
<!--        <p>Chatting With user {{chatId}}</p>-->
        <ChatMessage
            v-for="message in messages"
            :key="message.id"
            :message="message"
        />
    </div>

</template>
<script>
    import ChatMessage from "./ChatMessage";
    export default {
        components:{
            ChatMessage
        },
        props: {
            chatId: {
                type:Number,
                required:true
            },

            messages:{
                type:Array,
                required:true
            }
        }
    }
</script>
<style>

</style>
