<template>
    <div>
        <AdminToolbar/>
        <h1>詳細</h1>
        <div>

        <router-link to="/admin/devices">一覧に戻る</router-link>
        </div>
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
                                <v-col cols="8" >
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
                                    disabled
                                ></v-text-field>
                                </v-col>
                                <v-col cols="3" >
                                <v-subheader>製品名</v-subheader>
                                </v-col>
                                <v-col cols="8" >
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
                                <v-col cols="8" >
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
                            </v-row>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-row>
                                <v-col cols="3" >
                                <v-subheader>次回点検日</v-subheader>
                                </v-col>
                                <v-col cols="7" >
                                    <v-text-field
                                    height="10"
                                    single-line
                                    outlined
                                    dense
                                    color="#959595"
                                    persistent-hint
                                    type="date"
                                    hide-spin-buttons
                                    v-model="device.inspection_date"
                                    :filled="(device.inspection_date === '') ? true : false"
                                ></v-text-field>
                                </v-col>
                                <v-col cols="12" >
                                    <v-subheader>現在配置</v-subheader>
                                    <v-row>
                                        <v-col cols="5">
                                            <v-text-field
                                                height="10"
                                                single-line
                                                outlined
                                                dense
                                                color="#959595"
                                                type="text"
                                                hide-spin-buttons
                                                :value="currentLocation"
                                                :filled="(device.inspection_date === '') ? true : false"
                                                readonly
                                                class="current-location-textarea"
                                            ></v-text-field>
                                        </v-col>
                                        <v-icon size="30" class="pb-6">mdi-arrow-right-bold</v-icon>
                                        <v-col cols="5">
                                            <v-select
                                            height="10"
                                            single-line
                                            dense
                                            outlined
                                            color="#959595"
                                            :items="location"
                                            label="移動先"
                                            v-model="device.location"
                                            ></v-select>
                                        </v-col>
                                    </v-row>
                                    <div class="map">
                                        <img src="/img/img03.png" alt="" width="100%">
                                        <div class="ce subject">
                                            <v-icon size="5vh" v-show="device.location ==='臨床工学室'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="orthopedics subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='整形外科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="ophthalmology subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='眼科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="endoscope subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='内視鏡センター'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="physiological-laboratory subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='生理検査室'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="dermatology subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='皮膚科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="gynecology subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='産婦人科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="rehabilitation subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='リハビリテーション室'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="surgery subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='外科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="treatment-room subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='処置室'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="internal-medicine subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='内科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="urology subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='泌尿器科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                        <div class="pediatrics subject">
                                            <v-icon size="5vh" v-show="this.device.location ==='小児科'" :color="color[device.status]">mdi-map-marker</v-icon>
                                        </div>
                                    </div>
                                </v-col>
                                <v-col>
                                    <v-card-actions class="justify-end">
                                        <v-btn outlined tile text @click="cancel">キャンセル</v-btn>
                                        <v-btn outlined tile text @click="updateDevice">更新</v-btn>
                                    </v-card-actions>
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
.v-input{
    border-radius: 0px;
    padding: 0px;
}
.v-subheader{
    padding: 0  0 0 5px  ;
}
p{
    font-size: 0.11vw;
    margin: 0;
    padding: 0;
    // text-shadow: 1px 1px 1px #FFF;
}
.current-location-textarea{
    user-select: none;
}
// 各科目の位置
.map{
    overflow: scroll;
    position: relative;
    padding: 10px;
    // border: 1px solid black;
}
.subject{
    position: absolute;
    box-sizing: border-box;
}
.ce{
    left: 13.5%;
    bottom: 76%;
}
.orthopedics{
    left: 38%;
    bottom: 80%;
}
.ophthalmology{
    left: 49%;
    bottom: 80%;
}
.endoscope{
    left: 58%;
    bottom: 79%;
}
.physiological-laboratory{
    left: 67%;
    bottom: 76.5%;
}
.dermatology{
    left: 73.5%;
    bottom: 69%;
}
.gynecology{
    left: 85%;
    bottom: 41%;
}
.rehabilitation{
    left: 15%;
    bottom: 35.5%;
}
.surgery{
    left: 22%;
    bottom: 17%;
}
.treatment-room{
    left: 40%;
    bottom: 21%;
}
.internal-medicine{
    left: 48.3%;
    bottom: 10%;
}
.urology{
    left: 68%;
    bottom: 10%;
}
.pediatrics{
    left: 80.8%;
    bottom: 10%;
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
            ],
            currentLocation:'',
            location:['臨床工学室','整形外科','眼科','内視鏡センター','生理検査室','皮膚科','産婦人科','リハビリテーション室','外科','処置室','内科','泌尿器科','小児科',],
            color:['#80E368','#6B9CE4','#E3DD68','#E36868','gray'],
        };
    },
    methods: {
        async getDevice(){
            this.src = ''
            await axios.get('/api/getDevice/' + this.$route.params.id).then((res)=>{
                this.device = res.data
            })
            if(this.device.name === '点滴ポンプ'){
                this.src = '/img/device1.jpeg'
            }else{
                this.src = '/img/device2.jpeg'
            }
            if(this.$route.params.id){
                this.currentLocation = this.device.location.slice()
            }
        },
        changeStatus(val){
            this.device.status = val
        },
        cancel(){
            this.$router.push('/admin/devices')
        },
        async updateDevice(){
            // 廃棄（status = 4)なら配置場所がないのでlocationを空文字にする
            if(this.device.status == 4){
                this.device.location = ''
            }
            await axios.post('/api/updateDevice' , this.device)
            this.$router.push('/admin/devices')
        }

    },
    watch:{
        $route(){
            this.getDevice()
        }
    },
    filters :{
        zeroPadding(value){
            return ( '000' + value ).slice( -4 );
        }
    },
    created(){
        this.getDevice()
    }
};
</script>
