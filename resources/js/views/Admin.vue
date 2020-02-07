<template>
	<div>

		  <div id="page-content-wrapper">

            <ul class="nav nav-pills mb-3 p-3 bg-dark text-light" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a @click="registrocomponent()" class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a @click="listadocomponent()" class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Listado de Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a @click="estadisticacomponent()" class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Estadisticas</a>
                </li>
                <li class="nav-item">
                    <a @click="perfilcomponent()" class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Perfil</a>
                </li>
                <li class="nav-item">
                    <a @click="Notificacionescomponent()" class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Notficaciones</a>
                </li>
                <li class="nav-item" style="margin-left: 24rem !important;">
                    <a class="nav-link"><font-awesome-icon icon="home"/>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" @click="logout" ><font-awesome-icon icon="sign-out-alt"/>Salir</a>
                </li>
            </ul>

	</div>

	 <div class="container-fluid">

            	<!-- MONTANDO LOS COMPONENTES -->
            	<RegistroEncargado v-if="registro === true"></RegistroEncargado>
            	<ControlUsuarios v-if="listado === true" ></ControlUsuarios>
            	<AdminPerfil v-if="perfil === true"></AdminPerfil>
            	<AdminEstadisticas v-if=" estadistica === true"></AdminEstadisticas>
            	<ControlNotificaciones v-if="notificacion === true"></ControlNotificaciones>

            </div>

</div>

</template>
<script>

	import RegistroEncargado from '../components/RegistroEncargado.vue'
	import ControlUsuarios from '../components/ControlUsuarios.vue'
	import AdminPerfil from '../components/AdminPerfil.vue'
	import AdminEstadisticas from '../components/AdminEstadisticas.vue'
	import ControlNotificaciones from '../components/ControlNotificaciones.vue'

	//IPORTAMOS LAS ALERTAS POR SI LAS NECESITAMOS
	import Swal from 'sweetalert2'

	export default{

		name:'Admin',

        components:{
     // incluyendo componentes
        RegistroEncargado,
        ControlNotificaciones,
        ControlUsuarios,
        AdminEstadisticas,
        AdminPerfil,

        },

        data(){

        	return{

        		registro: true,
        		listado: false,
        		perfil: false,
        		estadistica: false,
        		notificacion: false,
                contador: 0,

        	}

        },

        mounted () {

        },

        methods: {


        	registrocomponent(){

        		if ( this.registro === true && this.listado === false && this.perfil === false && this.estadistica === false && this.notificacion === false) {

        			this.registro = true
        			this.listado = false
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = false

        		}else{

        			this.registro = true
        			this.listado = false
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = false

        		}


        	},

        	listadocomponent(){

        			if ( this.registro === false && this.listado === true && this.perfil === false && this.estadistica === false && this.notificacion === false) {

        			this.registro = false
        			this.listado = true
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = false

        		}else{

        			this.registro = false
        			this.listado = true
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = false

        		}

        	},

        	perfilcomponent(){

        			if ( this.registro === false && this.listado === false && this.perfil === true && this.estadistica === false && this.notificacion === false) {

        			this.registro = false
        			this.listado = false
        			this.perfil = true
        			this.estadistica = false
        			this.notificacion = false

        		}else{

        			this.registro = false
        			this.listado = false
        			this.perfil = true
        			this.estadistica = false
        			this.notificacion = false

        		}

        	},

        	estadisticacomponent(){

        			if ( this.registro === false && this.listado === false && this.perfil === false && this.estadistica === true && this.notificacion === false) {

        			this.registro = false
        			this.listado = false
        			this.perfil = false
        			this.estadistica = true
        			this.notificacion = false

        		}else{

        			this.registro = false
        			this.listado = false
        			this.perfil = false
        			this.estadistica = true
        			this.notificacion = false

        		}

        	},

        	Notificacionescomponent(){

        			if ( this.registro === false && this.listado === false && this.perfil === false && this.estadistica === false && this.notificacion === true) {

        			this.registro = false
        			this.listado = false
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = true

        		}else{

        			this.registro = false
        			this.listado = false
        			this.perfil = false
        			this.estadistica = false
        			this.notificacion = true

        		}


        	},

            logout(){

                axios.post('logout')
                .then(response =>{
                    window.location.href = '/';});

            },

        },

        computed:{



        },

    }


</script>