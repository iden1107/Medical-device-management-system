<template>
    <div>
        <AdminToolbar/>
        <h1>詳細</h1>
        <p>{{device}}</p>
        <v-row>
        <v-col cols="12">
            <v-card outlined>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" md="6">
                            <v-row>
                                <v-col cols="12">
                                    <div class="device-img">
                                        <img :src="src" alt="" width="100%">
                                    </div>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>管理番号</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="number"
                                    hide-spin-buttons
                                    v-model="device.id"
                                    :filled="(device.id === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>製品名</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="text"
                                    hide-spin-buttons
                                    v-model="device.name"
                                    :filled="(device.name === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>メーカー</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="text"
                                    hide-spin-buttons
                                    v-model="device.manufacturer"
                                    :filled="(device.manufacturer === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-row>
                                <v-col cols="12">
                                    <v-subheader>状態</v-subheader>
                                    <v-btn
                                        v-for="(item,index) in status"
                                        :key="item.label" elevation="0"
                                        :color="item.color" tile class="ma-2"
                                        :outlined="index !== device.status"
                                        @click="changeStatus(index)"
                                    ><span >{{item.label}}</span>
                                    </v-btn>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>管理番号</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="number"
                                    hide-spin-buttons
                                    v-model="device.id"
                                    :filled="(device.id === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>製品名</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="text"
                                    hide-spin-buttons
                                    v-model="device.name"
                                    :filled="(device.name === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>メーカー</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="text"
                                    hide-spin-buttons
                                    v-model="device.manufacturer"
                                    :filled="(device.manufacturer === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>
        <!-- 管理画面切替 -->
    </v-row>




    </div>
</template>

<style scoped lang="scss">
.device-img{
    width: 40vh;
    height: 40vh;
}
</style>

<script>
export default {
    name: "login",
    data() {
        return {
            src:'',
            device:{},
            status:[
                {label:'稼働中',color:'#80E368'},
                {label:'待機中',color:'#6B9CE4'},
                {label:'点検中',color:'#E3DD68'},
                {label:'修理中',color:'#E36868'},
                {label:'廃棄',color:'gray'},
            ]
        };
    },
    methods: {
        async getDevices(){
            this.src = ''
            await axios.get('/api/getDevice/' + this.$route.params.id).then((res)=>{
                this.device = res.data
            })
            if(this.device.name === '点滴ポンプ'){
                this.src = '/img/device1.jpeg'
            }else{
                this.src = '/img/device2.jpeg'
            }
        },
        changeStatus(val){
            this.device.status = val
            if(val === 4){
                this.device.location = ""
            }
        }
    },
    watch:{
        $route(){
            this.getDevices()
        }
    },
    filters :{
        zeroPadding(value){
            return ( '000' + value ).slice( -4 );
        }
    },
    created(){
        this.getDevices()

    }
};
</script>
