<template>
    <v-toolbar color="#6FE6D6" height="30">
        <v-toolbar-items>
            <router-link text to="/admin/device" active-class="aaaa">機器管理</router-link>
            <router-link text to="/admin/user" active-class="aaaa">職員管理</router-link>
        </v-toolbar-items>
    </v-toolbar>
</template>

<style scoped>
.v-application a{
    text-decoration: none;
    line-height: 30px;
    padding: 0 10px;
    color: #FFF;
}
.aaaa{
    background-color: #20C4AF;
}
</style>

<script>
    export default {

    }
</script>
