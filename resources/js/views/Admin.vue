<template>
	<div>

		  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
             <div class="container">
                <a class="navbar-brand" href="/home">  <font-awesome-icon icon="home" /> CNE </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a @click="estadisticacomponent()"class="nav-link  m-2">Estadisticas</a>
                        </li>
                        <li class="nav-item">
                            <a @click="listadocomponent()"class="nav-link  m-2">usuarios</a>
                        </li>
                        <li>
                            <a @click="registrocomponent()"class="nav-link m-2 "><font-awesome-icon icon="user-plus"/></a>
                        </li>
                        <li class="nav-item">
                            <a @click="perfilcomponent()" class="nav-link  m-2"> <font-awesome-icon icon="user-circle"/></a>
                        </li>
                        <li class="nav-item">
                             <a @click="Notificacionescomponent()"class="nav-link  m-2" data-toggle="modal">Notficaciones</a>
                         </li>
                        <li class="nav-item">
                              <a class="nav-link  m-2" v-on:click="logout"><font-awesome-icon icon="sign-out-alt"/></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

	       <div class="container-fluid">

            	<!-- MONTANDO LOS COMPONENTES -->
            	<RegistroEncargado v-if="registro === true"></RegistroEncargado>
            	<ControlUsuarios v-if="listado === true" ></ControlUsuarios>
            	<AdminPerfil v-if="perfil === true"></AdminPerfil>
            	<Estadisticas v-if=" estadistica === true"></Estadisticas>
            	<ControlNotificaciones v-if="notificacion === true"></ControlNotificaciones>

            </div>

</div>

</template>
<script>

	import RegistroEncargado from '../components/RegistroEncargado.vue'
	import ControlUsuarios from '../components/ControlUsuarios.vue'
	import AdminPerfil from '../components/AdminPerfil.vue'
	import Estadisticas from '../components/Estadisticas.vue'
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
         Estadisticas,
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