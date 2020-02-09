<template>
	<div>
		<h3> registro de personal encargado</h3>
		<div class="card-body">
		  		<form @submit.prevent="agregar" enctype="multipart/form-data">
		  			<div class="form-row">
		  				<div class="form-group col-md-6">
		  					<label>nombre</label>
		  					<input type="text" class="form-control" placeholder="nombre" v-model="usuario.name">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>apellido</label>
		  					<input type="text" class="form-control" placeholder="apellido" v-model="usuario.apellido">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>usuario</label>
		  					<input type="text" class="form-control" placeholder="usuario" v-model="usuario.user">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>cedula</label>
		  					<input type="text" class="form-control" placeholder="cedula" v-model="usuario.ci">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label >email</label>
		  					<input type="email" class="form-control" placeholder="email" v-model="usuario.email">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>avatar</label>
		  					<input type="file" @change="obtenerimagen"  class="form-control">
		  				</div>


		  				<div class="form-group col-md-6">
		  					<label >contaseña</label>
		  					<input type="password" class="form-control" placeholder="contraseña" v-model="usuario.password">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label >confirmar contaseña</label>
		  					<input type="password" class="form-control" placeholder="confirmar la contraseña" v-model="usuario.confpassword">
		  				</div>

		  				<div class="">
		  						<input type="submit" value="registrar" class="btn btn-primary">
		  				</div>

		  			</div>
		  		</form>
		 </div>


	</div>
</template>
<script>
	export default{

		name:'RegistroEncargado',

		 mounted() {



        },


		data(){
			return{
				usuario:{
					imagenminiatura:'',
					name:'',
					apellido:'',
					user:'',
					ci:'',
					email:'',
					avatar:'',
					password:'',
					confpassword:'',

				},

			}
		},


		methods:{

			obtenerimagen(e){
				let file = e.target.files[0];
				console.log(file)
				this.usuario.avatar = file;
				this.cargarimagen(file);
			},

			cargarimagen(file){

				let reader = new FileReader();
				reader.onload = (e) =>{
					this.imagenminiatura = e.target.result;
				}
				reader.readAsDataURL(file);

			},
			agregar(){

				let formData = new  FormData();
					formData.append('name',this.usuario.name)
					formData.append('apellido',this.usuario.apellido)
					formData.append('user',this.usuario.user)
					formData.append('ci',this.usuario.ci)
					formData.append('avatar',this.usuario.avatar)
					formData.append('name',this.usuario.email)
					formData.append('password',this.usuario.password)

					axios.post('admin/resgistro',formData).then(res =>{

						console.log(res.data)

					})


			},


		},


		computed:{


    	},

	}
</script>