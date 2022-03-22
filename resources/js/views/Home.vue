<template>
    <div>
        
        <h1>Home Page</h1>
        <p>{{user.name}}</p>
        <p>{{user.id}}</p>
    </div>
</template>


<script>
export default {
    name: "login",
    props:['user'],
    data() {
        return {
            id: "",
            password: "",
            remember: false,
            errors: {},
        };
    },
    methods: {
        logout(){
            axios.post('/logout')
            location.href = '/login'
        },
    },
    mounted(){


    }
};
</script>
