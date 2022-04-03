<template>
    <v-sheet height="90vh" class="d-flex flex-column align-center justify-center" >
        <v-card outlined  class="mb-6 pa-4" color="#20C4AF" max-width="500">
            <v-card-text>
                <div class="d-flex">
                    <v-icon :size="size" color="white">mdi-clover</v-icon>
                    <div class="pl-4">
                        <h2 class="text-h6 text-sm-h5">医療法人 サンプル</h2>
                        <h1  class="text-h4 text-sm-h3 ff pt-sm-2">サンプル病院</h1>
                    </div>
                </div>
            </v-card-text>
        </v-card>
        <v-card  max-width="500" outlined >
            <v-card-title style="color: #20C4AF;">医療機器管理システム</v-card-title>
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
                <v-btn tile elevation="1" @click="login"> ログイン </v-btn>
            </v-card-actions>
        </v-card>
        <div class="mb-6 pa-4" width="500">
            <p>このサイトはポートフォリオのサンプルアプリです</p>
            管理者ログイン
        </div>

    </v-sheet>
</template>

<style scoped>
input {
    border-style: inset;
    width: 100%;
    background-color: #f5f5f5;
}
input:focus {
    outline: none;
}
.ff{
    font-family: 'Shippori Mincho', serif !important;
    font-weight: 900;
    font-size: 50px;
    color: #FFF;
}
h2{
    color: #FFF;
}
</style>

<script>
export default {
    name: "login",
    data() {
        return {
            formData:{
                id: "",
                password: "",
                remember: false,
            }
        };
    },
    methods: {
        login() {
            const self = this
            axios
                .post("/login", self.formData)
                .then(function (response) {
                    if(self.formData.id == 9999){
                        location.href = "/admin/devices";
                    }else{
                        location.href = "/floormap";
                    }
                })
                .catch(function (error) {
                    console.log(error)
                });
        },
    },
    computed:{
        size () {
            switch (this.$vuetify.breakpoint.name) {
                case 'xs': return 60
                case 'sm': return 100
                case 'md': return 100
                case 'lg': return 100
                case 'xl': return 100
            }
        },
    }
};
</script>
