/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
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


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import services from './components/allServices';
import stylists from './components/allStylists';
import create from './components/createServices';
import edit from './components/editServices';

const router = new VueRouter({
    mode: 'history',
    routes: [
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
        }
    ],
});


Vue.component('example-component', require('./components/dashboardAdmin.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    router,
});
