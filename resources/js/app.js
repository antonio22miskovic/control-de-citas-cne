

require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');
Vue.prototype.$http = window.axios;


import Swal from 'sweetalert2'


Vue.component('home', require('./views/Home.vue').default);



const app = new Vue({
    el: '#app',
});
