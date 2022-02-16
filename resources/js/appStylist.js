import VueAxios from 'vue-axios';
import axios from 'axios';
import '@fortawesome/fontawesome-free/css/all.css';
import VueSidebarMenu from 'vue-sidebar-menu';
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css';
import VueRouter from 'vue-router';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCoffee } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
require('./bootstrap');
library.add(faCoffee)
window.Vue = require('vue').default;
Vue.use(VueSidebarMenu)
Vue.use(VueRouter)
Vue.use(VueAxios, axios);
Vue.component('font-awesome-icon', FontAwesomeIcon)


const router = new VueRouter({
   mode: 'history',
//    routes: [
//        {
//            path: '/allUsers',
//            name: 'User',
//            component: user
//        },
//        {
//            path: '/servises',
//            name: 'services',
//            component: services
//        },
//        {
//            path: '/allStylists',
//            name: 'allStylists',
//            component: stylists
//        },
//        {
//            name: 'create',
//            path: '/create',
//            component: create
//        },
//        {
//            name: 'edit',
//            path: '/edit/:id',
//            component: edit
//        },
//        {
//            path: '/appointment',
//            name: 'appointment',
//            component: appointment
//        }
//    ],
});

Vue.component('example-component', require('./components/stylist/dashboardStylist.vue').default);

const app = new Vue({
   el: '#appStylist',
   router,
});
