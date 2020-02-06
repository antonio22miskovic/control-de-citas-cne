

require('./bootstrap');

window.Vue = require('vue');

window.axios = require('axios');
Vue.prototype.$http = window.axios;


/// LIBRERIA DE FONT AWESOME

	import { library } from "@fortawesome/fontawesome-svg-core";

	import { faHome , faBuilding , faImages , faAt ,
 			faSearch, faPrint, faEye, faTrash,faMarker,
 			faServer,faInfo , faList, faPlus, faSignOutAlt } from "@fortawesome/free-solid-svg-icons";

	import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

	library.add( faHome, faBuilding, faImages, faAt,faSearch,
 				 faPrint ,faEye ,faTrash, faMarker, faServer,
 				 faInfo, faList, faPlus,faSignOutAlt );

	Vue.component('font-awesome-icon', FontAwesomeIcon)

/// LIBRERIA DE FONT AWESOME


import Swal from 'sweetalert2'


Vue.component('home', require('./views/Home.vue').default);
// Vue.component('Admin', require('./views/Admin.vue').default);



const app = new Vue({
    el: '#app',
});
