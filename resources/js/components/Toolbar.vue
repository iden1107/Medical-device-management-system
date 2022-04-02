<template>
    <div class="toolbar">
        <v-container>
            <router-link  to="/floormap" active-class="active"><v-icon size="20" :class="activeIcon('/floormap')" class="pb-1 pr-1">mdi-map-marker</v-icon>配置図</router-link>
            <router-link  to="/inventory" active-class="active"><v-icon size="20" :class="activeIcon('/inventory')" class="pb-1 pr-1">mdi-barcode</v-icon>在庫管理</router-link>
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
