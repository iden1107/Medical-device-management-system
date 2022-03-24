<template>
    <v-sheet height="90vh" class="d-flex flex-column align-center justify-center" >
        <v-sheet class="mb-6 pa-4" color="#20C4AF" width="469">
            <div class="d-flex">
                <img :src="'/img/logo_yotuba01.png'" width="110" alt="">
                <div>
                    <h2>医療法人 サンプル</h2>
                    <h1>サンプル病院</h1>
                </div>
            </div>
        </v-sheet>
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
                <v-btn outlined tile text @click="login"> ログイン </v-btn>
            </v-card-actions>
        </v-card>
        <v-sheet class="mb-6 pa-4" width="469">
            <p>このサイトはポートフォリオのサンプルアプリです</p>
            <a href="https://free-materials.com/">フリー素材から</a>
        </v-sheet>

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
h1{
    font-family: 'Shippori Mincho', serif;
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
  props: ["xxx"],
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
      axios
        .post("/login", this.formData)
        .then(function (response) {
          location.href = "/admin";
        })
        .catch(function (error) {
            console.log(error)
        });
    },
  },
};
</script>
