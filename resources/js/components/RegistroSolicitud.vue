<template>
    <div class="container">
		<div class="card mt-4 rounded-sm">

  			<div class="card-header">
    			<h5 class="card-title mt-1 p-0">Registro de solicitud</h5>

    			<form @submit.prevent="busqueda()">
    				<input type="text" v-model="buscar">
    				<input type="submit">
    			</form>

  			</div>

		  	<div class="card-body">
		  		<form @submit.prevent="registrar">
		  			<div class="form-row">
		  				<div class="form-group col-md-6">
		  					<label for="nombre">nombre</label>
		  					<input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" v-model="usuario.nombre">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="apellido">apellido</label>
		  					<input type="text" class="form-control" id="apellido" placeholder="apellido" name="apellido" v-model="usuario.apellido">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="cedula">cedula</label>
		  					<input type="text" class="form-control" id="cedula" placeholder="cedula" name="cedula" v-model="usuario.cedula">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="email">email</label>
		  					<input type="email" class="form-control" id="email" placeholder="email" name="email" v-model="usuario.email">
		  				</div>
		  											<h5> datos para la solicitud </h5>
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">solicitud</label>
						<input class="form-control" type="text" placeholder="solicitud" v-model="solicitud.solicitud">
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">respuesta</label>
						<input class="form-control" type="text" placeholder=" respuesta" v-model="solicitud.respuesta">
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">tramite</label>
						 <select  id="tramite" v-model="solicitud.tramite"name="tramite" class="form-control ">
                         	<option v-for="tramite of tramites" :key="tramite.id" :value="tramite.id">{{tramite.tramite }}</option>
                         </select>
		  			</div>

		  			<div class="form-group">
		  				<label for="descripcion">Descripcion de solicitud.</label>
		  				<textarea class="form-control" id="descripcion" rows="3" name="descripcion" v-model="solicitud.descripcion"></textarea>
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

        		usuario:[{

        			'name':'',
        			'apellido':'',
        			'cedula':'',
        			'email':'',

        		}],

        		solicitud:[{

        			'solicitud':'',
        			'respuesta':'',
        			'descripcion':'',
        			'tramite':'',
        			'user':'',
        			'cliente':'',

        		}],

        		tramites:[],
        		resultadobuscar:[],
        		buscar:'',


        	}
        },
        methods:{

        	registrar(){

        		console.log(this.usuario)
        		console.log(this.solicitud)
        	},

        	listadotramites(){

        		axios.get('tramite').then((response) => {

        			this.tramites = response.data;

        		});

        	},

        	busqueda(){

        		axios.get('buscar/'+this.buscar).then((response) => {

        			this.resultadobuscar = response.data;
        			console.log(this.resultadobuscar)
        			this.usuario.name = this.resultadobuscar.name
        			this.usuario.apellido = this.resultadobuscar.apellido
        			this.usuario.cedula = this.resultadobuscar.cedula
        			this.usuario.email = this.resultadobuscar.email
        	});

        },

    }

    }
</script>
