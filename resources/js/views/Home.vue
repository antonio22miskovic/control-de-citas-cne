<template>

<div>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
             <div class="container">
                <a class="navbar-brand" href="/home" data-toggle="tooltip" title="Home">  <font-awesome-icon icon="home" /> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item" data-toggle="tooltip" title="Estadisticas">
                            <a @click="estadisticacomponent()"class="nav-link  m-2"><font-awesome-icon icon="chart-line"/></a>
                        </li>

                        <li class="nav-item" data-toggle="tooltip" title="Listado">
                            <a @click="listadocomponent()"class="nav-link  m-2"><font-awesome-icon icon="list"/></a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" title="Registro de Solicitud">
                            <a @click="registrocomponent()"class="nav-link m-2 "><font-awesome-icon icon="user-plus"/></a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" title="Perfil">
                            <a @click="perfilcomponent()" class="nav-link  m-2"> <font-awesome-icon icon="user-circle"/></a>
                        </li>
                        <li class="nav-item" data-toggle="tooltip" title="Notificaciones">
                             <a @click="Notificacionescomponent()"class="nav-link  m-2" data-toggle="modal"><font-awesome-icon icon="bell"/> <span class="tag tag-pill text-danger">{{ this.contador }}</span></a></a>

                         </li>
                        <li class="nav-item" data-toggle="tooltip" title="Cerrar Seción">
                              <a class="nav-link  m-2" v-on:click="logout"><font-awesome-icon icon="sign-out-alt"/></a>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

            <div class="container">

            	<!-- MONTANDO LOS COMPONENTES -->
            	<RegistroSolicitud v-if="registro === true"></RegistroSolicitud>
            	<ListadoSolicitud v-if="listado === true" ></ListadoSolicitud>
            	<Perfil v-if="perfil === true"></Perfil>
            	<Estadisticas v-if=" estadistica === true"></Estadisticas>
            	<Notificaciones v-if="notificacion === true"></Notificaciones>

            </div>

    </div>

</template>

<script>

	// importando los componentes
	import RegistroSolicitud from '../components/RegistroSolicitud.vue'
	import ListadoSolicitud from '../components/ListadoSolicitud.vue'
	import Perfil from '../components/Perfil.vue'
	import Estadisticas from '../components/Estadisticas.vue'
	import Notificaciones from '../components/Notificaciones.vue'

	//IPORTAMOS LAS ALERTAS POR SI LAS NECESITAMOS
	import Swal from 'sweetalert2'

    export default{

        name:'Home',

        components:{
        	// incluyendo componentes
        RegistroSolicitud,
        ListadoSolicitud,
        Perfil,
        Estadisticas,
        Notificaciones,


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
            this.contado()
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });



        },

        methods: {

            contado(){

                axios.get('contador').then(response =>{
                    this.contador = response.data

                })

            },

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