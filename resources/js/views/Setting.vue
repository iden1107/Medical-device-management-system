<template>
    <div>
        <v-row>
            <v-col cols="12"  class="col">
                <v-card outlined >
                    <v-card-title>設定</v-card-title>
                    <v-card-text>
                    <v-row>
                        <v-col cols="4" md="2">
                        <v-subheader>自動ログアウト</v-subheader>
                        </v-col>
                        <v-col cols="8" md="3">
                            <v-text-field
                            height="10"
                            single-line
                            outlined
                            dense
                            color="#959595"
                            v-model="setting.minutes"
                            @blur="postSetting"
                            type="number"
                            hide-spin-buttons
                            suffix="分"
                            hint="1〜120の値で設定してください。画面上をクリックしてから設定した時間経が経過すると自動でログアウトします。"
                            persistent-hint
                        ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </div>
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
.col-4{
    margin: 0;
    padding-right: 0;
}
</style>

<script>
export default {
    name: "login",
    data() {
        return {
            setting:{minutes:''}
        };
    },
    methods: {
        async postSetting(){
            await axios.post('/api/updateSetting',this.setting)
            this.$emit('child-emit')
        }
    },
    created(){
        axios.get('/api/setting')
            .then(response => {
                this.setting.minutes  = response.data.setting_minutes
            })
    }
};
</script>
