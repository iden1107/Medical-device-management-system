<template>
<!-- App.vue -->
<div @click="autoLogout">
    <v-app>
        <v-app-bar app  height="30" color="#20C4AF">
            <v-container>
                <div class="d-flex justify-center">
                    <div class="space"></div>
                    <v-spacer></v-spacer>
                    <div class="white--text text-center mt-1" height="100%"  v-show="(this.user.name ) ? true :  false">ログイン名：{{user.name}}</div>
                    <v-spacer></v-spacer>
                    <v-btn height="26" tile text  v-show="(this.user.name ) ? true :  false" @click="logout">ログアウト</v-btn>
                </div>
            </v-container>
        </v-app-bar>
        <!-- ツールバー 名前付きビューで切替 -->
        <router-view name="AdminToolBar"></router-view>
        <router-view name="ToolBar"></router-view>
        <v-main>
            <v-container>
                <keep-alive>
                    <router-view :settingMinutes="settingMinutes" @input="settingMinutes = $event"></router-view>
                </keep-alive>
            </v-container>
        </v-main>
        <v-footer app color="#20C4AF">
        </v-footer>
    </v-app>
</div>
</template>
<style scoped>
.container{
    max-width: 1500px;
    padding-top: 0px;
    padding-bottom: 0px;
}
.space{
    width: 110px;
}
.v-btn{
    padding: 0 10px 0;
    margin-top: 2px;
    background-color: #FFF;
    color: #20C4AF;
}
.v-main{
    margin-top: 80px;
}
</style>
<script>
export default {
    name: "login",
    data() {
        return {
            user:'',
            autoLogoutFunctionId:'',
            timeOutMinutes:60000 ,
            settingMinutes:10,
        };
    },
    methods: {
        autoLogout(){
            // 画面上をクリックしてから10分間を再設定して自動ログアウト
            if(this.$route.path === '/login'){
                return
            }else{
                clearTimeout(this.autoLogoutFunctionId);
                this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes * this.settingMinutes);
            }
        },
        logout(){
            // ログアウトする関数
            axios.post('/logout')
            location.href = '/login'
        },
    },
    mounted(){
        // 起動してから10分間で自動ログアウト
        if(this.$route.path === '/login'){
            return
        }else{
            this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes * this.settingMinutes);
        }
    },
    created(){
        // ログインユーザーの取得
        if(this.$route.path === '/login'){
            return
        }else{
            axios.get('/api/authUser')
                .then(response => {
                    this.user  = response.data
                })
                .catch(error => {
                    console.log(error.response.status)
                });
        }
    }
};
</script>
