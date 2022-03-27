import Router from 'vue-router'
import Device from './views/Device.vue'
import User from './views/User.vue'
import Login from './views/Login.vue'
import CreateUser from './views/CreateUser.vue'
import EditUser from './views/EditUser.vue'
import Setting from './views/Setting.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/admin/user',
            component: User,
            children:[
                { path: '/', component:CreateUser,name:'user'},
                { path:'edit/:id',component:EditUser,name:'editUser'},
                { path: 'device', component:Device},
            ]
        },
        {
            path: '/admin/device',
            name: 'device',
            component: Device
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

    ]
});
