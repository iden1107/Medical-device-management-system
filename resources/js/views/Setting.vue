<template>
<div>
    <v-row>
        <v-col cols="12" md="8" class="col">
            <v-card outlined >
                <v-card-text>
                    <input type="text" :value="settingMinutes" @blur="$emit('input', $event.target.value)">
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
</div>




</template>

<style scoped lang="scss">


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
        
    }
};
</script>
