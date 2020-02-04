<template>
    <div class="container">
		<div class="card mt-4 rounded-sm">

  			<div class="card-header">
    			<h5 class="card-title mt-1 p-0">Registro de solicitud</h5>

    			<form @submit.prevent="busqueda()">
    				<input type="text" v-model="buscar">
    				<input type="submit">
    			</form>
    			<p v-if="mensajebusqueda === true"> no se encuentra registrado por favor ingrese sus datos</p>
    			<p v-if="mensajenulo === true"> debe introcir un numero de cedula </p>

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
		  											<h5> datos para la solicitud </h5>
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
		  				<label for="descripcion">Descripcion de solicitud.</label>
		  				<textarea class="form-control" id="descripcion" rows="3" name="descripcion" v-model="descripcion"></textarea>
		  			</div>
		  			<button type="submit" class="btn btn-primary" name="registrar-solicitud">Registrar</button>
		  		</form>
		  	</div>
		</div>
    </div>
</template>

<script>

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


        	}
        },
        methods:{

        	registrar(){

        		if (this.validarregistro === true) {

        			axios.get('cliente/'+this.idparacliente)
        			.then((response) => {

        			var e = response.data;

        			if (e === 1) {

        				let clien = {

        					'user_id': this.idparacliente

        				}

        				axios.post('cliente',clien)
        				.then((response) => {

        					this.cliente = response.data

        					console.log(this.cliente)

        					if (this.cliente.length === 0) {

        						console.log('se produjo un error al registrarlo como cliente')

        					}else{

        						this.registrarsolicitud();

        					}

        				});

        			}else{
        					console.log('2')
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
        			.catch((error) => {
      				  if (error.response) {
             				 // The request was made and the server responded with a status code
              				// that falls out of the range of 2xx
             		 		 console.log(error.response.data);
             				 console.log(error.response.status);
             				 console.log(error.response.headers);

           			 } else if (error.request) {
              				// The request was made but no response was received
              				// `error.request` is an instance of XMLHttpRequest in the browser and an instance of
              				// http.ClientRequest in node.js
              				console.log(error.request);
           			 } else {
              				// Something happened in setting up the request that triggered an Error
             		 		console.log('Error', error.message);
            		 }
  				 })
        		}

        	},

        	registrarsolicitud(){

        		console.log('llege a la solicitud')

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

        		}

        	});

        }

        },

    }

    }
</script>
