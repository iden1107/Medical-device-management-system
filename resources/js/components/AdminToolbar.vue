<template>
    <v-toolbar color="#6FE6D6" height="30">
        <v-toolbar-items>
            <router-link text to="/admin/device" active-class="active"><v-icon color="white" size="20" class="pr-1 pb-0.5">mdi-medical-bag</v-icon>機器管理</router-link>
            <router-link text to="/admin/user" active-class="active"><v-icon color="white" size="20" class="pr-1 pb-0.5">mdi-account-circle</v-icon>職員管理</router-link>
            <router-link text to="/admin/setting" active-class="active"> <img src="/img/gear.png" alt="" width="20px" style="vertical-align: -2px; padding-right:4px;"> 設定</router-link>
        </v-toolbar-items>
    </v-toolbar>
</template>

<style scoped>
.v-application a{
    width: 120px;
    text-decoration: none;
    line-height: 30px;
    padding: 0 10px;
    color: #FFF;
}
.active{
    background-color: #20C4AF;

}
</style>

<script>
    export default {

    }
</script>
