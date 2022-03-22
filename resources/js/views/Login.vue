<template>
    <v-sheet height="100vh" class="d-flex flex-column align-center justify-center" >
        <div class="mb-6">
            <img src="https://www.rakuyohp.or.jp/files/libs/542/202107291350007667.png?1627534201" alt="">
        </div>
        <v-card  max-width="500" outlined >
        <v-card-title>医療機器管理システム</v-card-title>
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
    fname() {
      axios.get("/api/aaa").then((res) => console.log(res));
    },
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
