<template>
    <div>
        <v-row>
            <v-col cols="12">
                <v-card outlined >
                    <v-card-title>機器管理台帳  <v-spacer></v-spacer><v-btn tile elevation="1" @click="updateLocation">更新</v-btn></v-card-title>
                    <div>
                        <v-file-input
                        accept=".csv"
                        label="ファイル名"
                        @change="changeFile"
                        ></v-file-input>
                    </div>
                    <v-card-text>
                        <v-simple-table dense fixed-header height="75vh">
                            <template v-slot:default >
                                <thead>
                                    <tr>
                                        <th class="text-left">配置場所</th>
                                        <th class="text-left">更新前</th>
                                        <th class="text-left">更新後</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                    v-for="location in order"
                                    :key="location"
                                    >
                                    <td valign="baseline">{{ location }}</td>
                                    <td valign="baseline"><p v-for="device in devices[location]" :key="device.id">{{device.id | zeroPadding}}</p></td>
                                    <td valign="baseline"><p v-for="device in updateData[location]" :key="device.id">{{device | zeroPadding}}</p></td>
                                    </tr>
                                </tbody>
                            </template>
                        </v-simple-table>
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
    name: "Inventory",
    data() {
        return {
            updateData:{},
            status:[
                {label:'稼働中',color:'#80E368'},
                {label:'待機中',color:'#6B9CE4'},
                {label:'点検中',color:'#E3DD68'},
                {label:'修理中',color:'#E36868'},
                {label:'廃棄',color:'gray'},
            ],
            devices:[],
            order:['臨床工学室','整形外科','眼科','内視鏡センター','生理検査室','皮膚科','産婦人科','リハビリテーション室','外科','処置室','内科','泌尿器科','小児科',],
        };
    },
    computed:{


    },
    methods: {
        getDevices(){
            axios.get('/api/getDevicesByLocation').then((res)=>{
                this.devices = res.data
            })
        },
        changeFile(e){
            let obj = {}
            const self = this
            const reader = new FileReader()
            reader.onload = function() {
                let s1  = reader.result.split(/\n/)
                for(let i = 0; i < s1.length; i ++ ){
                    let s2 = s1[i].split(',')
                    let key = s2.slice(0, 1);
                    let val = s2.slice(1).map(Number);
                    obj[key] = val
                }
                self.updateData = obj
            }
            reader.readAsText( e )
        },
        updateLocation(){
            // 変更後のオブジェクトに変換する処理 
            const self = this
            let arr = []
            Object.keys(this.updateData).forEach(function (key) {
                self.updateData[key].forEach((val)=>{
                    let obj = {id:'' ,location:''}
                    obj.id = val
                    obj.location = key
                    arr.push(obj)
                })
            });
            axios.post('/api/updateLocation' , arr)
        }
    },
    watch:{
        $route(){
            this.getDevices()
        },
        file(){
            console.log('change')
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
