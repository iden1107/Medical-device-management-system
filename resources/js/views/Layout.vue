<template>
    <div @click="autoLogout">
        <v-app>
            <v-app-bar app  height="30" color="#20C4AF">
                <v-container>
                    <div class="d-flex justify-center">
                        <div class="space d-none d-sm-block"></div>
                        <v-spacer class="d-none d-sm-block"></v-spacer>
                        <div class="white--text text-center mt-1" height="100%"  v-show="(this.user.name ) ? true :  false">ログイン名：{{user.name}}</div>
                        <v-spacer></v-spacer>
                        <v-btn height="26" tile text class="py-0 px-1 d-sm-none icon" v-show="(this.user.name ) ? true :  false" @click="logout"> <v-icon>mdi-logout</v-icon></v-btn>
                        <v-btn height="26" tile text class="py-0 px-1 d-none" :class="showLogoutText" @click="logout">ログアウト</v-btn>
                    </div>
                </v-container>
            </v-app-bar>
            <router-view name="AdminToolBar"></router-view>
            <router-view name="ToolBar"></router-view>
            <v-main>
                <v-container>
                    <keep-alive>
                        <router-view @child-emit="setLogoutTime"></router-view>
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
    margin-top: 2px;
    background-color: #FFF;
    color: #20C4AF;
}
.v-main{
    margin-top: 80px;
}
.icon{
    color: #FFF;
    background-color: #20C4AF;
}
</style>

<script>
export default {
    name: "Layout",
    data() {
        return {
            user:'',
            autoLogoutFunctionId:'',
            timeOutMinutes:60000 ,
            settingMinutes:'',
        };
    },
    methods: {
        autoLogout(){
            // 画面上をクリックしてから10分間を再設定して自動ログアウト
            if(this.$route.path === '/'){
                return
            }else{
                clearTimeout(this.autoLogoutFunctionId);
                this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes * this.settingMinutes)
            }
        },
        async logout(){
            // ログアウトする関数
            await axios.post('/logout')
            location.href = '/'
        },
        async setLogoutTime(){
            // 起動してから10分間で自動ログアウト
            if(this.$route.path === '/'){
                return
            }else{
                await axios.get('/api/setting')
                    .then(response => {
                        this.settingMinutes  = response.data.setting_minutes
                    })
                this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes * this.settingMinutes)
            }
        }
    },
    computed:{
        showLogoutText(){
            if(this.user.name ){
                return 'd-sm-block'
            }else{
                return ''
            }
        }
    },
    mounted(){
        this.setLogoutTime()
    },
    created(){
        // ログインユーザーの取得
        if(this.$route.path === '/'){
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
