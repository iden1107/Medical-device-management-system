<template>
    <v-col cols="12" md="4">
        <v-card  outlined >
            <v-card-title>詳細</v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>職員番号</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        persistent-hint
                        type="number"
                        hide-spin-buttons
                        v-model="editUser.id"
                        :filled="(editUser.id === '') ? true : false"
                        disabled
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>氏名</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        persistent-hint
                        v-model="editUser.name"
                        :filled="(editUser.name === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>フリガナ</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        persistent-hint
                        v-model="editUser.kana"
                        :filled="(editUser.kana === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>所属部署</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        persistent-hint
                        v-model="editUser.department"
                        :filled="(editUser.department === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>入職日</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        persistent-hint
                        type="date"
                        v-model="editUser.employment_date"
                        :filled="(editUser.employment_date === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>パスワード(再設定)</v-subheader>
                    </v-col>
                    <v-col cols="9">
                        <v-text-field
                        height="10"
                        single-line
                        outlined
                        dense
                        color="#959595"
                        hint="4桁の英数字で入力"
                        persistent-hint
                        type="password"
                        v-model="editUser.password"
                        :filled="(editUser.password === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn outlined tile text @click="staffUpdate">更新</v-btn>
                <v-btn outlined tile text @click="staffDelete">削除</v-btn>
            </v-card-actions>
        </v-card>
    </v-col>
</template>

<style scoped lang="scss">
.v-input{
    border-radius: 0px;
    padding: 0px;
}
.v-subheader{
    padding: 0;
}
.col{
    padding-top: 0;
    padding-bottom: 0;
}
</style>

<script>
export default {
    name: "login",
    data() {
        return {
            user:{},
        };
    },
    computed:{
        editUser(){
            return this.user
        }
    },
    watch:{
        $route(){
            axios.get('/api/edit/user/' + this.$route.params.id).then((res)=>{
                this.user = res.data
            })
        }
    },
    methods: {
        logout(){
            axios.post('/logout')
            location.href = '/login'
        },
        async staffUpdate(){
            await axios.post('/api/update/user/' + this.$route.params.id,this.editUser)
            await this.getEditUser()
            this.$emit('emitGetStaff')
        },
        async staffDelete(){
            await axios.post('/api/delete/user/' + this.$route.params.id)
            await this.$emit('emitGetStaff')
            this.$router.push({ name: 'user'})
        },
        async getEditUser(){
            await axios.get('/api/edit/user/' + this.$route.params.id).then((res)=>{
                this.user = res.data
            })
        }
    },
    created(){
        this.getEditUser()
    },
};
</script>
