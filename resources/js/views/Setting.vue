<template>
<div>
    <AdminToolbar/>
    <h1>設定</h1>
    <v-row>
        <v-col cols="12" md="8" class="col">
            <v-card outlined >
                <v-card-text>
                    <input type="text" :value="settingMinutes" @blur="$emit('input', $event.target.value)">
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>


<v-btn @click="logout">ログアウト</v-btn>
</div>




</template>

<style scoped lang="scss">
.v-application a{
    text-decoration: none;
    line-height: 30px;
    padding: 0 5px;
    color: #FFF;
}
.router-link-exact-active{
    background-color: #20C4AF;
}

</style>

<script>
export default {
    name: "login",
    props:['settingMinutes'],
    data() {
        return {
            formData:{
                id: "",
                name: "",
                kana: "",
                department: "",
                employment_date	: "",
                password: "",
                remember: false,
            },
            staff:[],
            autoLogoutFunctionId:'',
            flag:true,
        };
    },
    methods: {
        logout(){
            axios.post('/logout')
            location.href = '/login'
        },
    }
};
</script>
