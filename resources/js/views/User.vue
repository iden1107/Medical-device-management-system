<template>
<div>
    <AdminToolbar/>
    <h1>管理画面</h1>
    <v-row>
        <v-col cols="12" md="8" class="col">
            <v-card outlined >
                <v-card-title>職員名簿</v-card-title>
                <v-card-text>
                    <v-simple-table dense fixed-header height="200px">
                        <template v-slot:default >
                            <thead>
                                <tr>
                                    <th class="text-left">氏名</th>
                                    <th class="text-left">ﾌﾘｶﾞﾅ</th>
                                    <th class="text-left">部署</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="person in staff"
                                :key="person.id"
                                style="cursor: pointer"
                                @click="link(person.id)"
                                >
                                <td>{{ person.name }}</td>
                                <td>{{ person.kana }}</td>
                                <td>{{ person.department }}</td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
            </v-card>
        </v-col>
        <!-- 管理画面切替 -->
        <router-view @emitGetStaff="getStaff()"></router-view>
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
        getStaff(){
            axios.get('/api/user').then((res)=>{
                this.staff = res.data
            })
        },
        async staffStore(){
            await axios.post('/api/register',this.formData)
            this.getStaff()
            this.formData = {
                id: "",
                name: "",
                kana: "",
                department: "",
                employment_date	: "",
                password: "",
                remember: false,
            }
        },
        link(id){
            this.$router.push({ name: 'editUser', params: {id:id}})
        }
    },
    created(){
        this.getStaff()
    }
};
</script>
