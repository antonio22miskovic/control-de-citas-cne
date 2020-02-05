<template>
	<div class="container">
		<div class="card mt-4">
			<div class="card-header">
				<h4 class="h4">Registro de perfil</h4>
			</div>
			<div class="card-body">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputEmail4">Nombres</label>
							<input type="email" class="form-control" id="inputEmail4" placeholder="Nombres..." name="nombre">
						</div>
						<div class="form-group col-md-6">
							<label for="inputPassword4">Apellidos</label>
							<input type="password" class="form-control" id="inputPassword4" placeholder="Apellidos..." name="apellido">
						</div>
					</div>
					<div class="form-group">
						<label for="inputAddress">Cedula de identidad</label>
						<input type="text" class="form-control" id="inputAddress" placeholder="Cedula de identidad" name="cedula">
					</div>
					<div class="form-group">
						<label for="inputAddress2">Correo</label>
						<input type="email" class="form-control" id="inputAddress2" placeholder="Correo electronico">
					</div>
					<button type="submit" class="btn btn-primary ">Guardar</button>
				</form>
			</div>
		</div>
	</div>
</template>
<script>

	export default{

		name:'Perfil',
	}

</script>