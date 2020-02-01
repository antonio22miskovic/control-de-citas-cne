<template>



    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center"> CNE </div>
            <div class="list-group list-group-flush">

                <a @click="registrocomponent()" class="list-group-item list-group-item-action bg-light">Solicitudes</a>

                <a @click="listadocomponent()" class="list-group-item list-group-item-action bg-light">listado de solicitudes</a>

                <a @click="estadisticacomponent()" class="list-group-item list-group-item-action bg-light">Estadisticas</a>

                <a @click="perfilcomponent()"  class="list-group-item list-group-item-action bg-light">Perfil</a>

                <a @click="Notificacionescomponent()" class="list-group-item list-group-item-action bg-light">Notificaciones</a>

                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"><font-awesome-icon icon="server"/></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home"><font-awesome-icon icon="home"/></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" @click="logout" ><font-awesome-icon icon="sign-out-alt"/></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">

            	<!-- MONTANDO LOS COMPONENTES -->
            	<RegistroSolicitud v-if="registro === true"></RegistroSolicitud>
            	<ListadoSolicitud v-if="listado === true" ></ListadoSolicitud>
            	<Perfil v-if="perfil === true"></Perfil>
            	<Estadisticas v-if=" estadistica === true"></Estadisticas>
            	<Notificaciones v-if="notificacion === true"></Notificaciones>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

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

        	}

        },

        mounted () {

            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

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