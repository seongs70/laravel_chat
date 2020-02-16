<template>
    <div class="w-1/5 border-r-2 border-solid border-gray-600">
        <div v-for="(user, index) in users"
             :key="user.id"
        >
            {{user.name}}
        </div>
    </div>
</template>

<script>
    export default {
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
        }
    }
</script>

<style>

</style>
