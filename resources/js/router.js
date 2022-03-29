import Router from 'vue-router'
import Devices from './views/Devices.vue'
import DeviceDetail from './views/DeviceDetail.vue'
import User from './views/User.vue'
import Login from './views/Login.vue'
import CreateUser from './views/CreateUser.vue'
import EditUser from './views/EditUser.vue'
import Setting from './views/Setting.vue'
import FloorMap from './views/FloorMap.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/admin/user',
            component: User,
            children:[
                { path: '/', component:CreateUser,name:'user'},
                { path:'edit/:id',component:EditUser,name:'editUser'},
            ]
        },
        {
            path: '/admin/devices',
            name: 'devices',
            component: Devices
        },
        {
            path: '/admin/devices/detail/:id',
            name: 'deviceDetail',
            component: DeviceDetail
        },
        {
            path: '/admin/setting',
            name: 'setting',
            component: Setting
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/floormap',
            name: 'floormap',
            component: FloorMap
        },

    ]
});
