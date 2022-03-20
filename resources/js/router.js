import Router from 'vue-router'
import Home from './views/Home.vue'
import About from './views/About.vue'

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/dashboard/home',
            name: 'home',
            component: Home
        },
        {
            path: '/dashboard/about',
            name: 'about',
            component: About
        },
    ]
});
