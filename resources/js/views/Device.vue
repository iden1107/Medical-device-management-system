<template>
    <div>
        <AdminToolbar/>


        <h1>機器管理</h1>
        <div class="div">
            <div class="ko"></div>
        </div>



    </div>
</template>

<style scoped lang="scss">
.div{
    width: 100px;
    height: 70px;
    border: 1px solid black;
    overflow-y: scroll;
}
.ko{
    width: 100px;
    height: 5px;
    background-color: aqua;
    position: fixed;
}
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
}
::-webkit-scrollbar-thumb {
    border-radius: 0px;
    background-color: rgba(0,0,0,.5);
    box-shadow: 0 0 1px rgba(255,255,255,.5);
}
</style>

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
