<template>
	<div class="container">

		<div class="modal fade" id="registrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                     <h5 class="modal-title " id="exampleModalCenterTitle">agrega una nueva notificacion </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>
              	<div class="modal-body">
               		<div>

               			 <form class="form-horizontal" @submit.prevent="registrarnotificacion()">
                                <h5 class="text-center"> registra una nueva notificacion</h5>
                               <div class="form-group p-3">
                                    <label> asunto de la notificacion :</label>
                                    <input type="text" v-model="asunto" class="form-control rounded-pill" placeholder=" asunto ">
                                 </div>
                                 <div class="form-group p-3">
                                    <label> descripcion:</label>
                                    <input type="text" v-model="descripcion" class="form-control rounded-pill" placeholder="breve descripcion" >
                                </div>
                                <div class="container text-center">
                                    <button type="submit" class="btn btn-primary rounded-pill"> agregar </button>
                                </div>
                            </form>

                	</div>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">Close</button>

              	</div>
            </div>
        </div>
    </div>


		<h3 class=" text-center m-3"> control de notificaciones </h3>
    <div class="container text-center">
		<p>desea publicar una nueva notificacion: <a class="btn btn-outline-success rounded-pill" data-toggle="modal" data-target="#registrar"> <font-awesome-icon icon="plus" /> </a> </p>
    </div>
    <div class="container">
       <div class="col justify-content-center">
		<div v-for="notifi of notifica" :key="notifi.id" class="alert alert-success" role="alert">
			<h4 class="alert-heading">{{ notifi.asunto }}!</h4>
			<p>{{ notifi.descripcion }}.</p>
			<hr>
		<button class="btn btn-outline-danger text-center" @click.prevent="eliminar(notifi.id)">
               <font-awesome-icon icon="trash"/>
        </button>
		</div>
  </div>
</div>
	</div>
</template>
<script>

	import Swal from 'sweetalert2'


	export default{

		name:'ControlNotificaciones',

		 mounted() {

        	this.notificacion();

        },


		data(){
			return{

				notifica:[],
				asunto:'',
				descripcion:'',

			}
		},
		methods:{

			notificacion(){

				axios.get('notificacion')
				.then((response) => {

					this.notifica = response.data


				});
			},

			eliminar(id){

				Swal.fire({
     			title: 'estas seguro?',
      			text: "deseas eliminar la notificacion!",
      			icon: 'warning',
      			showCancelButton: true,
      			confirmButtonColor: '#3085d6',
      			cancelButtonColor: '#d33',
      			confirmButtonText: 'Yes, delete it!'
      			}).then((result) => {
          			if (result.value) {

            			axios.delete('notificacion/'+id)
            				.then(res=>{
              				this.notificacion()
      					 		})
            			Swal.fire(
            			'eliminado',
            			'se ah eliminado con exito.',
            			'success'
    					)}
				})



			},

			registrarnotificacion(){

				let datos = {

					'asunto': this.asunto,
					'descripcion': this.descripcion,

				}

				axios.post('notificacion',datos).then(res => {

					this.asunto = null
					this.descripcion = null
					this.notificacion();
                 			Swal.fire({

                				position: 'center',
                				 icon: 'success',
                				title: 'solicitud registrada con exito',
                				showConfirmButton: false,

                			})
				})

			},

		}

	}
</script>