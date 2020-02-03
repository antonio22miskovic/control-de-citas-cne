<template>
    <div class="container">
		<div class="card mt-4 rounded-sm">
  			<div class="card-header">
    			<h5 class="card-title mt-1 p-0">Registro de solicitud</h5>	
  			</div>
		  	<div class="card-body">
		  		<form>
		  			<div class="form-row">
		  				<div class="form-group col-md-6">
		  					<label for="inputEmail4">Solicitud</label>
		  					<input type="text" class="form-control" id="inputEmail4" placeholder="Solicitud" name="solicitud">
		  				</div>
		  				<div class="form-group col-md-6">
		  					<label for="inputPassword4">Fecha</label>
		  					<input type="date" class="form-control" id="inputPassword4" name="fecha">
		  				</div>
		  			</div>
		  			<div class="form-group">
		  				<label for="inputAddress">Respuesta</label>
						<input class="form-control" type="text" placeholder="Aqui va la respuesta a la solicitud SI o NO" readonly>
		  			</div>
		  			<div class="form-group">
		  				<label for="descripcionTextarea">Descripcion de solicitud.</label>
		  				<textarea class="form-control" id="descripcionTextarea" rows="3" name="descripcion"></textarea>
		  			</div>
		  			<button type="submit" class="btn btn-primary" name="registrar-solicitud">Registrar</button>
		  		</form>
		  	</div>
		</div>
    </div>
</template>

<script>

    export default {

        mounted() {

        },

        name:'RegistroSolicitud',

    }
</script>
