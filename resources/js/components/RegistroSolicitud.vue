<template>
    <div class="container bg-light">
		<div class="card mt-4 rounded-sm">

  			<div class="card-header">
    			<h5 class="card-title mt-1 p-0 text-center">Registro de solicitud</h5>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary" role="alert">
                        <form @submit.prevent="busqueda()">
                            <div class="row">
                                <div class="col-5">
                                    <div class="alert alert-info text-dark" role="alert">
                                        Ingrese una C.I para buscar solicitud.
                                    </div>
                                </div>
                                <div class="col-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group input-group-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-lg">C.I.</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" v-model="buscar">
                                            <input type="submit" class="btn btn-outline-success" value="Buscar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p v-if="mensajebusqueda === true" class="text-center text-danger">Oh! Algo anda mal, verifique los datos.</p>
                        <p v-if="mensajenulo === true" class="text-center text-danger"> ¡Debe introducir una cédula!</p>
                        </div>
                    </div>
                </div>
  			</div>

		  	<div class="card-body">
		  		<form @submit.prevent="registrar">
		  			<div class="form-row">
		  				<div class="form-group col-md-6">
		  					<label for="nombre">nombre</label>
		  					<input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" v-model="name">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="apellido">apellido</label>
		  					<input type="text" class="form-control" id="apellido" placeholder="apellido" name="apellido" v-model="apellido">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="cedula">cedula</label>
		  					<input type="text" class="form-control" id="cedula" placeholder="cedula" name="cedula" v-model="cedula">

		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="email">email</label>
		  					<input type="email" class="form-control" id="email" placeholder="email" name="email" v-model="email">

		  				</div>
		  				<div>
		  					<h3 class="text-center text-danger" v-if="validacion === true"> debe introducir todos los datos requeridos</h3>
		  				</div>
		  				<div>
		  					<h5> datos para la solicitud </h5>
		  				</div>

		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">solicitud</label>
						<input class="form-control" type="text" placeholder="solicitud" v-model="solicitud">
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">respuesta</label>
						<input class="form-control" type="text" placeholder=" respuesta" v-model="respuesta">
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">tramite</label>
						 <select  id="tramite" v-model="tramite"name="tramite" class="form-control ">
                         	<option v-for="tramite of tramites" :key="tramite.id" :value="tramite.id">{{tramite.tramite }}</option>
                         </select>
		  			</div>

		  			<div class="form-group">
		  				<label for="inputAddress">estatus</label>
		  				<select class="form-control" placeholder="estutus" v-model="status">
		  					<option value="atendido"> atendido </option>
		  					<option value="pendiente"> pendiente </option>
		  				</select>

		  			</div>

		  			<div class="form-group">
		  				<label for="descripcion">Descripcion de solicitud.</label>
		  				<textarea class="form-control" id="descripcion" rows="3" name="descripcion" v-model="descripcion"></textarea>
		  			</div>
		  			<div class="text-center">
		  				<button type="submit" class="btn btn-primary" name="registrar-solicitud">Registrar</button>
		  			</div>

		  		</form>
		  	</div>
		</div>
    </div>
</template>

<script>
	import Swal from 'sweetalert2'
    export default {

    	 name:'RegistroSolicitud',

        mounted() {

        	this.listadotramites();

        },

        data(){
        	return{
        			idparacliente:'',
        			name:'',
        			apellido:'',
        			cedula:'',
        			email:'',
        			validarregistro:false,
        			mensajebusqueda: false,
        			mensajenulo:false,

        			status:'',
        			solicitud:'',
        			respuesta:'',
        			descripcion:'',
        			tramite:'',
        			user:'',
        			cliente:'',


        		tramites:[],
        		resultadobuscar:[],
        		buscar:'',
        		iddelinsert:[],
        		validacion: false,


        	}
        },
        methods:{

        	registrar(){

        		if (this.name.length === 0 || this.apellido.length === 0 || this.cedula.length === 0 || this.email.length === 0 ||
        			this.solicitud.length === 0 || this.status.length === 0 || this.respuesta.length === 0 || this.descripcion === 0 ||
        			this.tramite.length === 0 ) {

        			this.validacion = true

        		}else{

        		if (this.validarregistro === true) {

        			axios.get('cliente/'+this.idparacliente)
        			.then((response) => {

        			this.cliente = response.data;

        			if (this.cliente.length === 0) {

        				let clien = {

        					'user_id': this.idparacliente

        				}

        				axios.post('cliente',clien)
        				.then((response) => {

        					this.cliente = response.data



        					if (this.cliente.length === 0) {

        						console.log('se produjo un error al registrarlo como cliente')

        					}else{

        						this.registrarsolicitud();

        					}

        				});

        			}else{

        				this.registrarsolicitud();
        			}

        		});

        		}else{

        			let data = {

        			'name': this.name,
        			'apellido': this.apellido,
        			'ci': this.cedula,
        			'email': this.email,

        			}

        			axios.post('user',data)
        			.then((response) => {

        				this.iddelinsert = response.data;
        				this.validarregistro = true
        				this.iddelinsert.id = this.idparacliente;

        				axios.get('id/'+ this.iddelinsert.ci)
        				.then((response) => {

        					var valor = response.data
        					this.idparacliente = valor.id

        				});

        				this.registrar();

        			})

        		}
        	  }
        	},

        	registrarsolicitud(){

        		let solici = {

					'solicitud': this.solicitud,
					'respuesta': this.respuesta,
					'descripcion': this.descripcion,
					'status': this.status,
					'tramite': this.tramite,
					'cliente': this.cliente.id
				}
					axios.post('solicitud',solici).then(res =>{

                 			Swal.fire({

                				position: 'center',
                				 icon: 'success',
                				title: 'solicitud registrada con exito',
                				showConfirmButton: false,

                			})
									this.name = null
									this.apellido = null
									this.cedula = null
									this.email = null
									this.solicitud  = null
									this.respuesta = null
									this.descripcion = null
									this.status = null
									this.tramite = null
									this.cliente.id = null
									this.validarregistro = false
									this.mensajebusqueda = false
        							this.mensajenulo = false
        							this.buscar = null
        							this.validacion = false

					});

        	},

        	listadotramites(){

        		axios.get('tramite').then((response) => {

        			this.tramites = response.data;

        		});

        	},

        	busqueda(){

        		if ( this.buscar.length  === 0) {

        			this.mensajenulo = true
        			this.mensajebusqueda = false;
        			this.validacion = false

        		}else{

        			this.mensajenulo = false
        		axios.get('buscar/'+this.buscar).then((response) => {

        				var r = response.data;

        			if (r === 1) {

        				this.mensajebusqueda = true;

        			}else{

        			this.resultadobuscar = response.data;

        			this.name = this.resultadobuscar.name
        			this.apellido = this.resultadobuscar.apellido
        			this.cedula = this.resultadobuscar.ci
        			this.email = this.resultadobuscar.email
        			this.idparacliente = this.resultadobuscar.id

        			this.validarregistro = true;
        			this.mensajebusqueda = false;
        			this.mensajenulo = false;
        			this.buscar = null;
        			this.validacion = false
        		}

        	});

        }

        },

    },
     computed:{


     },

    }
</script>
