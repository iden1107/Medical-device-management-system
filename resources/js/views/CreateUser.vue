<template>
    <v-col cols="12" md="4">
        <v-card  outlined >
            <v-card-title>職員登録</v-card-title>
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
                        hint="例）123456"
                        persistent-hint
                        type="number"
                        hide-spin-buttons
                        v-model="formData.id"
                        :filled="(formData.id === '') ? true : false"
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
                        hint="例）鈴木　一郎"
                        persistent-hint
                        v-model="formData.name"
                        :filled="(formData.name === '') ? true : false"
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
                        hint="例）スズキ　イチロウ"
                        persistent-hint
                        v-model="formData.kana"
                        :filled="(formData.kana === '') ? true : false"
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
                        hint="例）看護部"
                        persistent-hint
                        v-model="formData.department"
                        :filled="(formData.department === '') ? true : false"
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
                        hint="例）2020/04/01"
                        persistent-hint
                        type="date"
                        v-model="formData.employment_date"
                        :filled="(formData.employment_date === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="3">
                    <v-subheader>パスワード</v-subheader>
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
                        v-model="formData.password"
                        :filled="(formData.password === '') ? true : false"
                    ></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>
                <v-btn outlined tile text @click="staffStore">登録</v-btn>
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
    name: "CreateUser",
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
    },
};
</script>
