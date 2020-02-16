<template>
    <div class="w-1/5 border-2 border-solid border-gray-600">
        <div v-for="user in usersWithoutSignedInUser"
             :key="user.id"
             class="border-b-2 border-gray-600 hover:bg-gray-300 cursor-pointer"
             @click="updateChatWith(user.id)"
        >
            {{user.name}}
        </div>
    </div>
</template>

<script>
    export default {
        props:{
            currentUser:{
                type:Number,
                required: true
            }
        },
        //데이터가 바뀐것 까지 계산
        computed: {
            usersWithoutSignedInUser(){
                return this.users.filter(user=>{
                    return user.id !== this.currentUser
                });
            }
        },
        //data()  웹 network에서 받아온 데이터
        data() {
            return {
                users:[]
            }
        },
        created() {
            //ajax 통신
            axios.get('/api/users').then(res=>{
                console.log(res);
                //data객체에 데이터란걸
                 this.users = res.data.users;
            }).catch(error => {
                console.log(error);
            });
        },
        methods:{
            updateChatWith(userId) {
                this.$emit("updatedChatWith", userId);
            }
        }
    }
</script>

<style>

</style>
