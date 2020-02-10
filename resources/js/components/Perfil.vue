<template>
		<div class="container m-4">
    <div class="row">
        <div class="col-30">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated">Perfil de: {{ this.dataperfil.usuario  }}</h3>


                            <p class="lead">Nombre: {{ this.dataperfil.name }}</p>
                            <p class="lead">Nombre: {{ this.dataperfil.apellido }}</p>
                            <p class="lead">Nombre: {{ this.dataperfil.ci }}</p>
                            <p class="lead">Nombre: {{ this.dataperfil.email}}</p>

                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img :src="this.ruta + this.dataperfil.avatar" alt="" class="mx-auto rounded-circle img-fluid">
                            <br>

                        </div>


                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
                <!--/card-block-->
            </div>
        </div>
    </div>
</div>

</template>
<script>

	export default{

		name:'Perfil',

        mounted() {

        	this.perfil();

        },

		data(){
			return{
				dataperfil: [],
                ruta:'/public/img/',
			}
		},

        methods:{

        	perfil(){

        		axios.get('perfil').then((response) => {

        			this.dataperfil = response.data;



        		});

        	}
        }
	}


</script>

