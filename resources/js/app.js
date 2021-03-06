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

import services from './components/admin/allServices';
import stylists from './components/admin/allStylists';
import create from './components/admin/createServices';
import edit from './components/admin/editServices';
import user from './components/admin/allUsers';
import appointment from './components/admin/appointments';
import appointmentStylist from './components/stylist/appointmentStylist';
import commition from './components/stylist/commitionList'
import editProfile from './components/stylist/editProfile';
import dashStylist from './components/stylist/dashboardStylist';
import dashAdmin from './components/admin/dashboardAdmin';
import editProfileUser from './components/editProfile';

import Vue from 'vue';
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashAdmin
        },
        {
            path: '/allUsers',
            name: 'User',
            component: user
        },
        {
            path: '/servises',
            name: 'services',
            component: services
        },
        {
            path: '/allStylists',
            name: 'allStylists',
            component: stylists
        },
        {
            name: 'create',
            path: '/create',
            component: create
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: edit
        },
        {
            path: '/appointmentAdmin',
            name: 'appointment',
            component: appointment
        }
    ],
});

const routerS = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashStylist
        },
        {
            path: '/servises',
            name: 'services',
            component: services
        },
        {
            path: '/appointment',
            name: 'appointment',
            component: appointmentStylist
        },
        {
            path: '/commisionStylist',
            name: 'commition',
            component: commition
        },
        {
            name: 'editProfile',
            path: '/editProfile',
            component: editProfile
        },

    ],
});
const routerUser = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'editProfile',
            component: editProfileUser
        }
    ],
});
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('sidebar',require('./components/stylist/navBar.vue').default);
Vue.component('side',require('./components/admin/sideBar.vue').default);
Vue.component('example-component', require('./components/admin/dashboardAdmin.vue').default);

const app1 = new Vue({
    el: '#appStylist',
    router:routerS,
 });
 const app2 = new Vue({
    el: '#appUser',
    router:routerUser,
});

const app = new Vue({
    el: '#app',
    router:router,
});
