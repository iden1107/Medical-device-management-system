<template>
    <div class="toolbar">
        <v-container>
            <router-link  to="/admin/devices" active-class="active"><v-icon size="20" :class="activeIcon('/admin/devices')" class="pb-1 pr-1">mdi-medical-bag</v-icon>機器管理</router-link>
            <router-link  to="/admin/user" active-class="active"><v-icon size="20" :class="activeIcon('/admin/user')" class="pb-1 pr-1">mdi-account-circle</v-icon>職員管理</router-link>
            <router-link  to="/admin/setting" active-class="active"><v-icon :class="activeIcon('/admin/setting')">mdi-account-cog</v-icon> 設定</router-link>
        </v-container>
    </div>
</template>

<style scoped>
.toolbar{
    position: fixed;
    z-index: 4;
    width: 100%;
    height: 70px;
    background-color: #20BFBF;
}
.container{
    max-width: 1500px;
    padding: 40px 0 0 0 ;

}
.v-application a{
    display: inline-block;
    width: 120px;
    text-decoration: none;
    line-height: 30px;
    padding: 0 10px;
    color: #FFF;
}
.active{
    border-radius: 5px 5px 0 0;
    color: #20C4AF !important;
    background-color: #FFF;
}
.inactive{
    color: #FFF ;
}
.active-icon{
    color: #20BFBF;
}
.inactive-icon{
    color: #FFF ;
}
</style>

<script>
    export default {
        methods:{
            activeIcon(val){
                if(this.$route.path.indexOf(val) !== -1 ){
                    return 'active-icon'
                }else{
                    return 'inactive-icon'
                }
            }
        },
        created(){

        }
    }
</script>
