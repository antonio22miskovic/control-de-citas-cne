<template>
	<div>

		<div>
            <div class="modal fade" id="detallesmodalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalCenterTitle">Solicitud:     {{this.detallesolicitud.solicitud}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body p-4 m-3">
                            <div>

                                <p> fecha:  {{ this.detallesolicitud.fecha }}</p>
                                <p> respuesta:  {{ this.detallesolicitud.respuesta }}</p>
                                <p> tramite:  {{ this.tramite.tramite }}</p>
                                <p> estatus:  {{this.detallesolicitud.status }}</p>
                                <p> descripcion:  {{this.detallesolicitud.descripcion }}</p>

                                <h5> datos del solicitante </h5>
                                <p> nombre:   {{ this.cliente.name }}</p>
                                <p> apellido:   {{ this.cliente.apellido}}</p>
                                <p> cedula:  {{ this.cliente.ci }}</p>
                                <p> correo:  {{ this.cliente.email}}</p>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		 <div>
            <div class="modal fade" id="actualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title " id="exampleModalCenterTitle"> actualizar datos del usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div>
                            	<form @submit.prevent="" enctype="multipart/form-data">
		  			<div class="form-row">
		  				<div class="form-group col-md-6">
		  					<label>nombre</label>
		  					<input type="text" class="form-control" placeholder="nombre" v-model="fillusuario.name">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>apellido</label>
		  					<input type="text" class="form-control" placeholder="apellido" v-model="fillusuario.apellido">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>usuario</label>
		  					<input type="text" class="form-control" placeholder="usuario" v-model="fillusuario.usuario">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>cedula</label>
		  					<input type="text" class="form-control" placeholder="cedula" v-model="fillusuario.ci">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label >email</label>
		  					<input type="email" class="form-control" placeholder="email" v-model="fillusuario.email">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label>avatar</label>
		  					<input type="file" @change="obtenerimagen"  class="form-control">
		  				</div>


		  				<div class="form-group col-md-6">
		  					<label >contaseña</label>
		  					<input type="password" class="form-control" placeholder="contraseña" v-model="fillusuario.password">
		  				</div>

		  				<div class="form-group col-md-6">
		  					<label >confirmar contaseña</label>
		  					<input type="password" class="form-control" placeholder="confirmar la contraseña" v-model="passwordconfirmar">
		  				</div>

		  				<div class="">
		  						<input type="submit" value="registrar" class="btn btn-primary">
		  				</div>

		  			</div>
		  		</form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 <div class=" container m-4" v-if="tabla === false" v-for ="encargado of encargados" :key="encargado.id">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated">usuario:{{ encargado.usuario }}</h3>

                            <p class="card-text">nombre: {{ encargado.name }}</p>
                            <p class="card-text">apellido: {{ encargado.apellido }}</p>
                            <p class="card-text">email: {{ encargado.email }}</p>


                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                            <img src="https://robohash.org/68.186.255.198.png" alt="" class="mx-auto rounded-circle img-fluid">
                            <br>

                        </div>

                        <button class="btn btn-outline-warning text-center  m-3" data-toggle="modal" data-target="#actualizar" @click.prevent="editar(encargado)">
                        <font-awesome-icon icon="marker"/>
                    </button>
                    <button class="btn btn-outline-primary text-center m-3" @click="buscar(encargado.id)">
                            <font-awesome-icon icon="eye"/>
                    </button>
                    <button class="btn btn-outline-danger  text-center  m-3" @click="eliminar(encargado.id)">
                            <font-awesome-icon icon="trash"/>
                    </button>

                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
                <!--/card-block-->
            </div>
        </div>
    </div>
</div>

		<!-- <div v-if="tabla === false" v-for ="encargado of encargados" :key="encargado.id" class="card" style="width: 18rem;">
 			 <img src="" class="card-img-top" alt="">
  			 <div class="card-body">
    			<h5 class="card-title">usuario:{{ encargado.usuario }}</h5>
    				<p class="card-text">nombre: {{ encargado.name }}</p>
    				<p class="card-text">apellido: {{ encargado.apellido }}</p>
    				<p class="card-text">email: {{ encargado.email }}</p>
    				<p class="card-text">contraseña asignada: </p>
    				<button class="btn btn-outline-warning text-center" data-toggle="modal" data-target="#actualizar" @click.prevent="editar(encargado)">
                        <font-awesome-icon icon="marker"/>
                    </button>
    				<button class="btn btn-outline-primary text-center" @click="buscar(encargado.id)">
                            <font-awesome-icon icon="eye"/>
                    </button>
                    <button class="btn btn-outline-danger  text-center" @click="eliminar(encargado.id)">
                            <font-awesome-icon icon="trash"/>
                    </button>
 	 		 </div>
		</div> -->

			<div class="container" v-if =" tabla === true ">

				<div class="container text-center">
					<button class="btn btn-outline-primary" @click="cambiar"> revisar otro usuario </button>
				</div>

				   <div class="row justify-content-center">

            <table class="table table-striped mt-4 p-4">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Solicitud</th>
                        <th scope="col">Respuesta</th>
                        <th scope="col" class="text-center">Ver Solicitud</th>
                         <th scope="col" class="text-center">Eliminar Solicitud</th>
                    </tr>
                </thead>

                <tbody>
                    <h4 v-if="solicitudes.length === 0" class="text-center">No tiene solicitudes.</h4>
                    <tr v-for="solicitud of solicitudes" :key="solicitud.id">

                        <td>t{{ solicitud.solicitud }}</td>
                        <td>{{ solicitud.respuesta }}</td>


                        <td class="text-center">
                            <button class="btn btn-outline-primary text-center" data-toggle="modal" data-target="#detallesmodalcenter" @click.prevent="detalles(solicitud)">
                                <font-awesome-icon icon="eye"/>
                            </button>
                        </td>

                        <td class="text-center">
                            <button class="btn btn-outline-danger text-center" @click.prevent="borrar(solicitud.id)">
                                <font-awesome-icon icon="trash"/>
                            </button>
                        </td>

                    </tr>
                </tbody>
            </table>

            <nav aria-label="Page navigation example" >
                <ul class="pagination ">
                    <li class="page-item" v-if="paginate.current_page > 1" >
                        <a class="page-link" href="#" aria-label="Previous" @click.prevent = "Chagepage( paginate.current_page - 1)">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <li class="page-item" v-for="page in nuPages" :class="[page == esActivo ? 'active' : '']">

                        <a class="page-link" href="#"@click.prevent = "Chagepage( page)" >{{ page }}</a>

                    </li>

                    <li class="page-item" v-if="paginate.current_page  < paginate.last_page">
                        <a class="page-link" href="#" aria-label="Previous" @click.prevent = "Chagepage( paginate.current_page + 1)">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>


			</div>


	</div>
</template>
<script>
import Swal from 'sweetalert2'
	export default{

		name:'ControlUsuarios',

		mounted(){

			this.traerencargados()

		},

		data(){
			return{

				encargados:[],

				fillusuario:{

					'name':'',
					'usuariousuario':'',
					'apellido':'',
					'ci':'',
					'email':'',
					'password':'',
					'avatar':'',

				},
				tabla:false,
				solicitudes:[],
				datobuscar:'',
				 paginate:{

                    'tota': 0,
                    'current_page': 0,
                    'per_page': 0,
                    'last_page': 0,
                    'from': 0,
                    'to' : 0,

                },
				passwordconfirmar:'',

				detallesolicitud:'',
                user:'',
                cliente:'',
                tramite:'',


			}
		},

		methods:{
			cambiar(){

				this.tabla = false

			},

			buscar(id){

				this.tabla = true
				this.datobuscar = id
				this.listado(1)

			},

			traerencargados(){

				axios.get('user').then(res =>{

					this.encargados = res.data

				})
			},

			obtenerimagen(e){

				let file = e.target.files[0];
				console.log(file)
				this.usuario.avatar = file;
				this.cargarimagen(file);

			},

			cargarimagen(file){

				let reader = new FileReader();

				reader.readAsDataURL();

			},

			editar(encargado){

				this.fillusuario.name = encargado.name
				this.fillusuario.apellido = encargado.apellido
				this.fillusuario.usuario = encargado.usuario
				this.fillusuario.email = encargado.email
				this.fillusuario.avatar = encargado.avatar
				this.fillusuario.ci = encargado.ci

			},

			  Chagepage(page){

                this.paginate.current_page = page;
                this.listado(page);

            },

            listado(page){

                var url = '/admin/' + this.datobuscar + '?page='+page;

                axios.get(url).then(res=>{

                    this.solicitudes = res.data.solicitud.data;
                    this.paginate = res.data.paginate;


                })

            },

            eliminar(id){

      			Swal.fire({
     			title: 'estas seguro?',
      			text: "deseas eliminar el usuario!",
      			icon: 'warning',
      			showCancelButton: true,
      			confirmButtonColor: '#3085d6',
      			cancelButtonColor: '#d33',
      			confirmButtonText: 'Yes, delete it!'
      			}).then((result) => {
          			if (result.value) {

            		axios.delete('user/'+id)
            			.then(res=>{
              		this.traerencargados()
      					 })
            Swal.fire(
            'eliminado',
            'se ah eliminado con exito.',
            'success'
    )}
		})

    },

   		detalles(solicitud){

                axios.get('solicitud/'+solicitud.id).
                then(res =>{
                    this.detallesolicitud = res.data.solicitud;
                    this.tramite = res.data.solicitud.tramite;
                    this.cliente = res.data.cliente;
                    this.user = res.data.solicitud.user;

                });

            },

    borrar(id){

    		Swal.fire({
     			title: 'estas seguro?',
      			text: "deseas eliminar la solicitud!",
      			icon: 'warning',
      			showCancelButton: true,
      			confirmButtonColor: '#3085d6',
      			cancelButtonColor: '#d33',
      			confirmButtonText: 'Yes, delete it!'
      			}).then((result) => {
          			if (result.value) {

            			axios.delete('solicitud/'+id)
            				.then(res=>{
              				this.listado(this.paginate.current_page)
      					 		})
            				Swal.fire(
            			'eliminado',
            			'se ah eliminado con exito.',
            			'success'
    					)}
				})


    },

		},

		  computed:{

            esActivo: function(){
                return this.paginate.current_page;
            },

            nuPages: function(){

                if (!this.paginate.to) {
                    return [];
                }

               var from = this.paginate.current_page - 5 //todo
                if (from < 1) {
                   from = 1;
                }

                 var to = from + (5 * 5);
                  if (to >= this.paginate.last_page) {
                      to = this.paginate.last_page;
                  }

                  var pageArray = [];

                   while(from <= to){

                      pageArray.push(from);
                        from++;
                  }

                     return pageArray;

            }

        },


	}
</script>