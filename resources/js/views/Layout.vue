<template>
<!-- App.vue -->
<div @click="autoLogout">
    <v-app>
        <v-app-bar app height="30" color="#20C4AF">
            <span class="white--text mx-auto" height="100%" v-show="(this.user.name ) ? true :  false">ログイン名：{{user.name}}</span>
        </v-app-bar>

        <!-- アプリケーションのコンポーネントに基づいてコンテンツのサイズを決定 -->
        <v-main >
            <!-- アプリケーションに適切なgutterを提供 -->
            <v-container fluid >
            <!-- vue-routerを使用する場合 -->
            <keep-alive>
                <router-view ></router-view>
            </keep-alive>
            </v-container>
        </v-main>

        <v-footer app color="#20C4AF">
            <!-- -->
        </v-footer>
    </v-app>
</div>
</template>
<style scoped>
.container{
    max-width: 1500px;
}
</style>
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
            if(this.$route.path === '/login'){
                return
            }else{
                clearTimeout(this.autoLogoutFunctionId);
                this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes );
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
            this.autoLogoutFunctionId = setTimeout(this.logout, this.timeOutMinutes );
        }
    },
    created(){
        axios.get('/api/authUser')
            .then(response => {
                console.log(response)
                this.user  = response.data
            })
            .catch(error => {
                console.log(error.response)
            });
    }
};
</script>
