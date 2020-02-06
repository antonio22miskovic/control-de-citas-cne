<template>
	<div class="container bg-light">
		<div class="row">
			<div class="col"></div>
			<div class="col-9">
					<div class="card mt-2">
						<div class="card-header p-4 bg-dark">
							<div class="row">
								<div class="col-8">
									<h4 class="text-white">Perfil de {Usuario}</h4>
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
									Nombre
								</div>
								<div class="col-6 mb-4">
									Apellido
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									Cedula
								</div>
								<div class="col-6 mb-4">
									correo
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									usuario
								</div>
								<div class="col-6">
									Fecha de creacion
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="col"></div>
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
				dataperfil: []

			}
		},

        methods:{

        	perfil(){

        		axios.get('perfil').then((response) => {

        			this.dataperfil = response.data;

        			console.log(this.dataperfil);

        		});

        	}
        }
	}


</script>

