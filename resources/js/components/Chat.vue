<template>
    <div class="flex h-full">
        <ChatUserList
            :current-user="currentUser"
            :chat-with="chatWith"
            @updatedChatWith="updateChatWith"
        />
        <div v-if="chatWith" class="w-4/5 flex flex-col">
            <ChatArea
                :chat-id="chatWith"
                :messages="messages"
            />
            <div class="flex-initial p-2">
                <input
                    class="border-2 border-solid rounded border-gray-600 w-full p-3"
                    type="text"
                    v-model="text"
                    @keyup.enter="submit"
                >
            </div>
        </div>
        <div v-else class="p-3">
            채팅 상대를 선택해주세요
        </div>
    </div>
</template>

<script>
    //다른 컴포넌트 import
    import ChatUserList from "./ChatUserList";
    import ChatArea from "./ChatArea";
    export default {
        props:{
            currentUser:{
                type:Number,
                required: true
            }
        },
        //컴포넌트 등록
        components: {
            ChatUserList,
            ChatArea
        },

        data() {
            return {
                chatWith:null,
                text:'',
                messages:[]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },

        // pusher에서 chat채널을 받아옴
        created(){
          window.Echo.private('chats').listen('MessageSent', e=>{
              // 보내는 사람이 나고 받는 사람이 상대일경우만 메시지 push
              if(e.message.to == this.currentUser && e.message.from == this.chatWith){
                  console.log(e);
                  this.messages.push(e.message);
              }

          });
        },

        methods:{
            updateChatWith(value){
                this.chatWith = value;
                this.getMessages();
            },

            getMessages(){
              axios.get('/api/messages', {
                  params:{
                      to: this.chatWith,
                      from: this.currentUser
                  }
              }).then(res => {
                  console.log(res);
                  this.messages = res.data.messages;
              })
            },

            submit(){
                if(this.text){
                    axios.post('/api/messages', {
                        text:this.text,
                        to:this.chatWith,
                        from: this.currentUser
                    }).then(res=>{
                        this.messages.push(res.data.message);
                    });
                }
                this.text = '';
            }
        }
    }
</script>



