<template>
<!-- App.vue -->
<div @click="autoLogout">
    <v-app>
        <v-app-bar app height="30" color="#234180">
            <span class="white--text mx-auto" height="100%" v-show="(this.user.name ) ? true :  false">ログイン名：{{user.name}}</span>
        </v-app-bar>

        <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->
        <v-main >
            <!-- アプリケーションに適切なgutterを提供 -->
            <v-container fluid>
            <!-- vue-routerを使用する場合 -->
            
            <router-view ></router-view>
            </v-container>
        </v-main>

        <v-footer app color="#234180">
            <!-- -->
        </v-footer>
    </v-app>
</div>
</template>

<script>
export default {
    name: "login",
    data() {
        return {
            user:'',
            autoLogoutFunctionId:'',
            timeOutMinutes:60000 * 10,
        };
    },
    methods: {
        autoLogout(){
            // 画面上をクリックしてから10分間を再設定して自動ログアウト
            if(this.$route.path === '/'){
                return
            }else{
                clearTimeout(this.autoLogoutFunctionId);
                this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes );
            }
        },
        logout(){
            // ログアウトする関数
            axios.post('/logout')
            location.href = '/'
        },
    },
    mounted(){
        // 起動してから10分間で自動ログアウト
        if(this.$route.path === '/'){
            return
        }else{
            this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes );
        }
    },
    created(){
        if(this.$route.path !== '/login')
            axios.get('/api/authUser').then((res)=>{
                this.user = res.data
        })
    }
};
</script>
