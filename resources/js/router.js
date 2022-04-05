import Router from 'vue-router'

import AdminToolBar from './components/AdminToolbar.vue'
import CreateUser from './views/CreateUser.vue'
import Devices from './views/Devices.vue'
import DeviceCreate from './views/DeviceCreate.vue'
import DeviceDetail from './views/DeviceDetail.vue'
import DeviceDetailEdit from './views/DeviceDetailEdit.vue'
import FloorMap from './views/FloorMap.vue'
import EditUser from './views/EditUser.vue'
import Inventory from './views/Inventory.vue'
import NotFound from './views/NotFound.vue'
import Login from './views/Login.vue'
import Setting from './views/Setting.vue'
import ToolBar from './components/Toolbar.vue'
import User from './views/User.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/admin/user',
            components: {
                default: User,
                AdminToolBar: AdminToolBar
            },
            children:[
                { path: '/', component:CreateUser,name:'user'},
                { path:'edit/:id',component:EditUser,name:'editUser'},
            ]
        },
        {
            path: '/admin/devices',
            name: 'devices',
            components: {
                default: Devices,
                AdminToolBar: AdminToolBar
            },
        },
        {
            path: '/admin/devices/create',
            name: 'deviceCreate',
            components: {
                default: DeviceCreate,
                AdminToolBar: AdminToolBar
            },
        },
        {
            path: '/admin/devices/detail/:id',
            name: 'deviceDetail',
            components: {
                default: DeviceDetail,
                AdminToolBar: AdminToolBar
            },
        },
        {
            path: '/admin/setting',
            name: 'setting',
            components: {
                default: Setting,
                AdminToolBar: AdminToolBar
            },
        },
        {
            path: '/',
            name: 'login',
            component: Login,
        },
        {
            path: '/floormap',
            name: 'floormap',
            components: {
                default: FloorMap,
                ToolBar: ToolBar
            },
        },
        {
            path: '/floormap/DeviceDetailEdit/:id',
            name: 'DeviceDetailEdit',
            components: {
                default: DeviceDetailEdit,
                ToolBar: ToolBar
            },
        },
        {
            path: '/inventory',
            name: 'Inventory',
            components: {
                default: Inventory,
                ToolBar: ToolBar
            },
        },
        {
            path: '*',
            name: 'NotFound',
            component: NotFound
        },
    ]
});
