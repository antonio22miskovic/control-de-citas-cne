<template>
	<div class="container bg-light">
		<div class="row">
			<div class="col"></div>
			<div class="col-9">
					<div class="card mt-2">
						<div class="card-header p-4 bg-dark">
							<div class="row">
								<div class="col-8">
									<h4 class="text-white">Perfil de: {{ this.dataperfil.usuario  }}</h4>
								</div>
								<div class="col-4 rounded">
									Avatar
									<img src="" alt="">
								</div>
							</div>
						</div>
						<div class="card-body text-center">
							<div class="row">
								<div class="col-6">
									Nombre: {{ this.dataperfil.name }}
								</div>
								<div class="col-6 mb-4">
									Apellido: {{ this.dataperfil.apellido }}
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									Cedula: {{ this.dataperfil.ci }}
								</div>
								<div class="col-6 mb-4">
									correo: {{ this.dataperfil.email }}
								</div>
							</div>
						<!-- 	<div class="row">
								<div class="col-6">
									usuario
								</div>
								<div class="col-6">
									Fecha de creacion
								</div>
							</div> -->
					</div>
				</div>
			</div>
			<div class="col"></div>
		</div>
	</div>
</template>
<script>

	export default{

		name:'AdminPerfil',
		 mounted() {

        	this.perfil();

        },

		data(){
			return{
				dataperfil: []

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