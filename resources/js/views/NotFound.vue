<template>
    <div>
        <v-row>
            <v-col cols="12"  class="col">
                <div>
                    <h2>Not Found</h2>
                    <p>ページが見つかりません</p>
                    <router-link :to="link">ホームへ戻る</router-link>
                </div>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    name: "NotFound",
    data() {
        return {
            user:''
        };
    },
    computed: {
        link(){
            if(this.user.id === 9999){
                return '/admin/devices'
            }else{
                return '/floormap'
            }
        }
    },
    created(){
        axios.get('/api/authUser')
            .then(response => {
                this.user  = response.data
            })
            .catch(error => {
                console.log(error.response.status)
            });
    }
};
</script>
