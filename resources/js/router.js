import Router from 'vue-router'
import Home from './views/Home.vue'
import Admin from './views/Admin.vue'
import Login from './views/Login.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin
        },
        {
            path: '/',
            name: 'login',
            component: Login
        },
    ]
});
