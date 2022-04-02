<template>
<div>
    <div class="map">
        <img src="/img/img03.png" alt="" width="100%">
        <div class="ce subject">
            <router-link  v-for="device in devices.臨床工学室" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="orthopedics subject">
            <router-link  v-for="device in devices.整形外科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="ophthalmology subject">
            <router-link  v-for="device in devices.眼科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="endoscope subject">
            <router-link  v-for="device in devices.内視鏡センター" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="physiological-laboratory subject">
            <router-link  v-for="device in devices.生理検査室" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="dermatology subject">
            <router-link  v-for="device in devices.皮膚科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="gynecology subject">
            <router-link  v-for="device in devices.産婦人科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="rehabilitation subject">
            <router-link  v-for="device in devices.リハビリテーション室" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="surgery subject">
            <router-link  v-for="device in devices.外科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="treatment-room subject">
            <router-link  v-for="device in devices.処置室" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="internal-medicine subject">
            <router-link  v-for="device in devices.内科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="urology subject">
            <router-link  v-for="device in devices.泌尿器科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
        <div class="pediatrics subject">
            <router-link  v-for="device in devices.小児科" :key="device.id" :to="'/floormap/DeviceDetailEdit/' + device.id">
                <p :style="{ color: status[device.status].color }">{{device.id | zeroPadding}}
                <v-icon color="#FFFF00" v-show="judgeExpired(device.inspection_date)" size="1vw">mdi-hammer-wrench</v-icon></p>
            </router-link>
        </div>
    </div>
</div>
</template>

<style scoped lang="scss">
.v-application a{
    text-decoration: none;
    padding: 0 ;
}
.router-link-exact-active{
    background-color: #20C4AF;
}
p{
    font-size: 1vw;
    margin: 0;
    // text-shadow: 1px 1px 1px #FFF;
}
.v-icon{
    padding-bottom: 0.2vw;
    animation: flash 3s linear infinite;
}
// 各科目の位置
.map{
    overflow: scroll;
    position: relative;
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

// 点検項目のフラッシュアニメーション
@keyframes flash {
    0% {
        opacity: 1;
    }
    90% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

</style>

<script>
export default {
    name: "login",
    data() {
        return {
            status:[
                {label:'稼働中',color:'#80E368'},
                {label:'待機中',color:'#6B9CE4'},
                {label:'点検中',color:'#E3DD68'},
                {label:'修理中',color:'#E36868'},
                {label:'廃棄',color:'gray'},
            ],
            devices:[],
        };
    },
    computed:{

    },
    methods: {
        logout(){
            axios.post('/logout')
            location.href = '/login'
        },
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
        judgeExpired(val){
            let today = new Date()
            let inspection_date = new Date(val)
            if(today >= inspection_date){
                return true
            }else{
                return false
            }
        },
        link(id){
            this.$router.push({ name: 'editUser', params: {id:id}})
        },
        getDevices(){
            axios.get('/api/getDevicesByLocation').then((res)=>{
                this.devices = res.data
            })
        },
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
