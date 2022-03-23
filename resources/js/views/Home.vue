<template>
    <div>
        <router-link to="/home">ホーム</router-link>
        <router-link to="/admin">admin</router-link>
        <h1>Home Page</h1>

    </div>
</template>


<script>
export default {
    name: "login",
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
};
</script>
