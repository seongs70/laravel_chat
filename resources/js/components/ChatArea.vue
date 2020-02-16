<template>
    <div class="flex-1">Chat Area
        <p>Chatting With user {{chatId}}</p>
    </div>

</template>
<script>
    export default {
        props: {
            chatId: {
                type:Number,
                required:true
            }
        }
    }
</script>
<style>

</style>
