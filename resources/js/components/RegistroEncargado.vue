<template>
	<div class="container">
		<h3 class="text-center m-3"> registro de personal encargado</h3>
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
		  					<p v-if="mesanjeuser === true" class="text-center text-danger"> usuario no disponible</p>
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>cedula</label>
		  					<input type="text" class="form-control" placeholder="cedula" v-model="usuario.ci">
		  					<p v-if="mesanjeci === true" class="text-center text-danger"> cedula no disponible</p>
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label >email</label>
		  					<input type="email" class="form-control" placeholder="email" v-model="usuario.email">
		  					<p v-if="mesanjeemail === true" class="text-center text-danger"> email no disponible</p>
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
		  					<input type="password" class="form-control" placeholder="confirmar la contraseña" v-model="confpassword">
		  					<p v-if=" mensaje === true" class="text-center"> contraseñas no coinciden</p>

		  				</div>
		  				<div class=" container text-center">
		  						<button type="submit" class="btn btn-outline-primary"> <font-awesome-icon icon="user-plus"/> registrar </button>
		  				</div>

		  			</div>
		  		</form>
		 </div>


	</div>
</template>
<script>
	import Swal from 'sweetalert2'
	export default{

		name:'RegistroEncargado',

		 mounted() {



        },


		data(){
			return{

				usuario:{

					name:'',
					apellido:'',
					user:'',
					ci:'',
					email:'',
					avatar:'',
					password:'',

				},
				mensaje:false,
				confpassword:'',
				emailexiste: '',
				userexiste: '',
				ciexiste: '',
				mesanjeuser:false,
				mesanjeci:false,
				mesanjeemail:false,


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
					this.usuario.avatar = e.target.result;
				}
				reader.readAsDataURL(file);

			},
			agregar(){
				// let formData = new  FormData();
				// 	formData.append('name',this.usuario.name)
				// 	formData.append('apellido',this.usuario.apellido)
				// 	formData.append('user',this.usuario.user)
				// 	formData.append('ci',this.usuario.ci)
				// 	formData.append('avatar',this.usuario.avatar)
				// 	formData.append('name',this.usuario.email)
				// 	formData.append('password',this.usuario.password)
				if ( this.usuario.name.length === 0 || this.usuario.apellido.length === 0 || this.usuario.user.length === 0 || this.usuario.ci.length === 0 ||this.usuario.email.length === 0 || this.usuario.password.length === 0 || this.confpassword.length === 0 || this.usuario.avatar.length === 0 ) {

					alert(' debe introducir todos los datos requeridos')

				}else{

					 axios.get('/user/verificacion/'+ this.usuario.user).then( res =>{

					 		this.userexiste = res.data

					 })

					 if (this.userexiste.length === 0) {


					 	this.mesanjeuser = true

					 }else{

					 		this.mesanjeuser = false

					 		 axios.get('/ci/verificacion/'+ this.usuario.ci).then( res =>{

					 		this.ciexiste = res.data

							 })

					 		 if (this.ciexiste.length === 0) {

					 			this.mesanjeci = true

							 }else{

							 	this.mesanjeci = false

							  axios.get('/email/verificacion/'+ this.usuario.email).then( res =>{

					 		this.emailexiste = res.data

							 })

							  if (this.emailexiste.length === 0) {

					 			this.mesanjeemail = true

							 }else{

							 	this.mesanjeemail = false

							 	if (this.usuario.password === this.confpassword) {

									this.mensaje = false

								axios.post('admin/resgistro',this.usuario).then(res =>{

								Swal.fire({

                					position: 'center',
                					icon: 'success',
                					title: 'solicitud registrada con exito',
                					showConfirmButton: false,

                				})

							this.usuario.name = null
							this.usuario.apellido = null
							this.usuario.user = null
							this.usuario.ci = null
							this.usuario.email = null
							this.usuario.avatar = null
							this.usuario.password = null
							this.confpassword = null
							this.mensaje = false
						})
					}else{

						this.confpassword = null
						this.mensaje = true
					}


							 }

						 }

					 }

				}
			},


		},


		computed:{


    	},

	}
</script>