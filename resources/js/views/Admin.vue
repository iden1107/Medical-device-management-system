<template>
<div>
    <router-link to="/home">ホーム</router-link>
    <router-link to="/admin">admin</router-link>
    <h1>管理画面</h1>

    <div>
        <p v-for="person in staff" :key="person.id">{{person.name}}</p>
    </div>
    <v-card  max-width="500" outlined >
        <v-card-title>職員登録</v-card-title>
        <v-card-text>
            <label>
                職員番号
                <input type="text" v-model="formData.id"/>
            </label>
            <label>
                パスワード
                <input type="password" v-model="formData.password"  />
            </label>
        </v-card-text>

        <v-card-actions>
            <v-btn outlined tile text >登録</v-btn>
        </v-card-actions>
        </v-card>
    <v-btn @click="logout">ログアウト</v-btn>
</div>
</template>

<script>
export default {
    name: "login",
    props:['user'],
    data() {
        return {
            formData:{
                id: "",
                password: "",
                remember: false,
            },
            staff:[],
            autoLogoutFunctionId:'',
        };
    },
    methods: {
        async logout(){
            await axios.post('/logout')
            location.href = '/'
        },
    },
    async created(){
        await axios.get('/api/user').then((res)=>{
            this.staff = res.data
        })
    }
};
</script>
