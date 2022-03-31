<template>
<div>
    <v-row>
        <v-col cols="12" md="8" class="col">
            <v-card outlined >
                <v-card-title>職員名簿</v-card-title>
                <v-card-text>
                    <v-simple-table dense fixed-header>
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
        <router-view @emitGetStaff="getStaff()"></router-view>
    </v-row>
</div>
</template>

<style scoped lang="scss">


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
        };
    },
    methods: {
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
            if(this.$route.params.id == id){
                return
            }else{
                this.$router.push({ name: 'editUser', params: {id:id}})
            }
        }
    },
    created(){
        this.getStaff()
    }
};
</script>
