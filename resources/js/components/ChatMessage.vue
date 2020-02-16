<template>
    <div>
        <div>
            <strong>{{ message.from.name }}</strong> {{ message.created_at }}
        </div>
        <div>
            {{message.text}}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: {
                type:Object,
                required:true
            }
        }
    }
</script>
