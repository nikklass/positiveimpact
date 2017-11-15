import 'jquery';

window.$ = window.jQuery = require('jquery');

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

//add x-csrf-token to all axios requests
let token = document.head.querySelector('meta[name="csrf-token"]');
axios.interceptors.request.use(function(config) {
    config.headers['X-CSRF-TOKEN'] = token
    return config
})

//make axios available as $http
Vue.prototype.$http = axios

window.Vue = Vue;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
