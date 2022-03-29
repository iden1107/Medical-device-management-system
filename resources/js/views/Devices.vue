<template>
    <div>
        <AdminToolbar/>
        <h1>機器管理</h1>
        <v-row>
        <v-col cols="12">
            <v-card outlined height="80vh">
                <v-card-title>機器管理台帳</v-card-title>
                <v-card-text>
                    <v-simple-table dense fixed-header>
                        <template v-slot:default >
                            <thead>
                                <tr>
                                    <th class="text-left">管理番号</th>
                                    <th class="text-left">製品名</th>
                                    <th class="text-left">メーカー</th>
                                    <th class="text-left">状態</th>
                                    <th class="text-left">次回点検日</th>
                                    <th class="text-left">現在地</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="device in devices"
                                :key="device.id"
                                style="cursor: pointer"
                                @click="link(device.id)"
                                >
                                <td>{{ device.id | zeroPadding}}</td>
                                <td>{{ device.name }}</td>
                                <td>{{ device.manufacturer }}</td>
                                <td :style="{ color: status[device.status].color }">{{ status[device.status].label }}</td>
                                <td>{{ device.inspection_date }}</td>
                                <td>{{ device.location }}</td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
            </v-card>
        </v-col>
        <!-- 管理画面切替 -->
    </v-row>




    </div>
</template>

<style scoped lang="scss">

</style>

<script>
export default {
    name: "login",
    data() {
        return {
            devices:[],
            status:[
                {label:'廃棄',color:'gray'},
                {label:'稼働中',color:'#80E368'},
                {label:'待機中',color:'#6B9CE4'},
                {label:'点検中',color:'#E3DD68'},
                {label:'修理中',color:'#E36868'},
            ]
        };
    },
    methods: {
        getDevices(){
            axios.get('/api/getDevices').then((res)=>{
                this.devices = res.data
            })
        },
        link(id){
            this.$router.push('/admin/devices/detail/' + id)
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
