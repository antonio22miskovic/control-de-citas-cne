<template>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading text-center"> CNE </div>
            <div class="list-group list-group-flush">
                <a  class="list-group-item list-group-item-action bg-dark">Solicitudes</a>
                <a  class="list-group-item list-group-item-action bg-light">Notificaciones</a>
                <a  class="list-group-item list-group-item-action bg-light">Estadisticas</a>
                <a  class="list-group-item list-group-item-action bg-light">Perfil</a>
                <a  class="list-group-item list-group-item-action bg-light">Usuarios</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-light">Status</a> -->
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" >Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" @click="logout" >cerrar sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">

            	<!-- MONTANDO LOS COMPONENTES -->
            	<RegistroSolicitud></RegistroSolicitud>
            	<ListadoSolicitud></ListadoSolicitud>
            	<Perfil></Perfil>
            	<Estadisticas></Estadisticas>

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

        },

        mounted () {

            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

        },

        methods: {

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