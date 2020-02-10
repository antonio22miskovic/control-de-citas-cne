<template>
	<div class="container">
	<!-- 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>
 -->
		<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
 			 <div class="modal-dialog modal-xl">
    			<div class="modal-content">
    				<div class="modal-header">
                            <h5 class="modal-title " id="exampleModalCenterTitle"> estadisticas personales</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="container text-center">
        <table class="table table-sm table-dark m-3">
        <thead>
          <tr>
			<th scope="col" class="text-center">Solicitud</th>
			<th scope="col" class="text-center">enero</th>
			<th scope="col" class="text-center">febrero</th>
			<th scope="col" class="text-center">marzo</th>
			<th scope="col" class="text-center">abril</th>
			<th scope="col"class="text-center" >mayo</th>
			<th scope="col" class="text-center">junio</th>
			<th scope="col" class="text-center">julio</th>
			<th scope="col"class="text-center" >agosto</th>
			<th scope="col" class="text-center">septiembre</th>
			<th scope="col" class="text-center">octubre</th>
			<th scope="col" class="text-center">noviembre</th>
			<th scope="col"class="text-center" >diciembre</th>
			<th scope="col" class="text-center">Total</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <th scope="row">cantidad por mes:</th>
            <td class="text-center">{{ this.usertotal.userenero }}</td>
            <td class="text-center">{{ this.usertotal.userfebrero }}</td>
            <td class="text-center">{{ this.usertotal.usermarzo }}</td>
            <td class="text-center">{{ this.usertotal.userabril }}</td>
            <td class="text-center">{{ this.usertotal.usermayo }}</td>
            <td class="text-center">{{ this.usertotal.userjunio }}</td>
            <td class="text-center">{{ this.usertotal.userjulio }}</td>
            <td class="text-center">{{ this.usertotal.useragosto }}</td>
            <td class="text-center">{{ this.usertotal.userseptiembre }}</td>
            <td class="text-center">{{ this.usertotal.useroctubre }}</td>
            <td class="text-center">{{ this.usertotal.usernoviembre }}</td>
            <td class="text-center">{{ this.usertotal.userdiciembre }}</td>
            <td class="text-center">{{ this.usertotal.useryear }}</td>
          </tr>
          <tr>
            <th scope="row">atendidas:</th>
            <td class="text-center">{{ this.useratendidos.useratendidoenero }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidofebrero }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidomarzo }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidoabril }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidomayo }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidojunio }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidojulio }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidoagosto }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidoseptiembre }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidooctubre }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidonoviembre }}</td>
            <td class="text-center">{{ this.useratendidos.useratendidodiciembre }}</td>
            <td class="text-center"> {{ this.useratendidos.useratendidoyear }} </td>

          </tr>
        <tr>
            <th scope="row">pendientes:</th>
            <td class="text-center">{{ this.userpendientes.userpendienteenero }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientefebrero }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientemarzo }}</td>
            <td class="text-center">{{ this.userpendientes.userpendienteabril }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientemayo }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientejunio }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientejulio }}</td>
            <td class="text-center">{{ this.userpendientes.userpendienteagosto }}</td>
            <td class="text-center">{{ this.userpendientes.userpendienteseptiembre }}</td>
            <td class="text-center">{{ this.userpendientes.userpendienteoctubre }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientenoviembre }}</td>
            <td class="text-center">{{ this.userpendientes.userpendientediciembre }}</td>
            <td class="text-center"> {{ this.userpendientes.userpendienteyear }} </td>
          </tr>
        </tbody>
      </table>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Cerrar</button>
                        </div>
                 </div>
    		</div>
  		</div>
	</div>
		<h3 class="text-center m-2">estadisticas de solicitudes </h3>
		<table class="table table-sm table-dark m-3">
        <thead>
          <tr>
			<th scope="col" class="text-center">Solicitud</th>
			<th scope="col" class="text-center">enero</th>
			<th scope="col" class="text-center">febrero</th>
			<th scope="col" class="text-center">marzo</th>
			<th scope="col" class="text-center">abril</th>
			<th scope="col"class="text-center" >mayo</th>
			<th scope="col" class="text-center">junio</th>
			<th scope="col" class="text-center">julio</th>
			<th scope="col"class="text-center" >agosto</th>
			<th scope="col" class="text-center">septiembre</th>
			<th scope="col" class="text-center">octubre</th>
			<th scope="col" class="text-center">noviembre</th>
			<th scope="col"class="text-center" >diciembre</th>
			<th scope="col" class="text-center">Total</th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <th scope="row">cantidad por mes:</th>
            <td class="text-center">{{ this.total.enero }}</td>
            <td class="text-center">{{ this.total.febrero }}</td>
            <td class="text-center">{{ this.total.marzo }}</td>
            <td class="text-center">{{ this.total.abril }}</td>
            <td class="text-center">{{ this.total.mayo }}</td>
            <td class="text-center">{{ this.total.junio }}</td>
            <td class="text-center">{{ this.total.julio }}</td>
            <td class="text-center">{{ this.total.agosto }}</td>
            <td class="text-center">{{ this.total.septiembre }}</td>
            <td class="text-center">{{ this.total.octubre }}</td>
            <td class="text-center">{{ this.total.noviembre }}</td>
            <td class="text-center">{{ this.total.diciembre }}</td>
            <td class="text-center">{{ this.total.year }}</td>
          </tr>
          <tr>
            <th scope="row">atendidas:</th>
            <td class="text-center">{{ this.atendidos.atendidoenero }}</td>
            <td class="text-center">{{ this.atendidos.atendidofebrero }}</td>
            <td class="text-center">{{ this.atendidos.atendidomarzo }}</td>
            <td class="text-center">{{ this.atendidos.atendidoabril }}</td>
            <td class="text-center">{{ this.atendidos.atendidomayo }}</td>
            <td class="text-center">{{ this.atendidos.atendidojunio }}</td>
            <td class="text-center">{{ this.atendidos.atendidojulio }}</td>
            <td class="text-center">{{ this.atendidos.atendidoagosto }}</td>
            <td class="text-center">{{ this.atendidos.atendidoseptiembre }}</td>
            <td class="text-center">{{ this.atendidos.atendidooctubre }}</td>
            <td class="text-center">{{ this.atendidos.atendidonoviembre }}</td>
            <td class="text-center">{{ this.atendidos.atendidodiciembre }}</td>
            <td class="text-center"> {{ this.atendidos.atendidoyear }} </td>

          </tr>
        <tr>
            <th scope="row">pendientes:</th>
            <td class="text-center">{{ this.pendientes.pendienteenero }}</td>
            <td class="text-center">{{ this.pendientes.pendientefebrero }}</td>
            <td class="text-center">{{ this.pendientes.pendientemarzo }}</td>
            <td class="text-center">{{ this.pendientes.pendienteabril }}</td>
            <td class="text-center">{{ this.pendientes.pendientemayo }}</td>
            <td class="text-center">{{ this.pendientes.pendientejunio }}</td>
            <td class="text-center">{{ this.pendientes.pendientejulio }}</td>
            <td class="text-center">{{ this.pendientes.pendienteagosto }}</td>
            <td class="text-center">{{ this.pendientes.pendienteseptiembre }}</td>
            <td class="text-center">{{ this.pendientes.pendienteoctubre }}</td>
            <td class="text-center">{{ this.pendientes.pendientenoviembre }}</td>
            <td class="text-center">{{ this.pendientes.pendientediciembre }}</td>
            <td class="text-center"> {{ this.pendientes.pendienteyear }} </td>
          </tr>
        </tbody>
      </table>

<h4 class="text-center m-2 ">estadisticas de usuarios </h4>
<div class="container ">
<div class="row-30 ">
    <div class=" container m-4" v-for ="encargado of usuarios" :key="encargado.id">
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

                       <button class="btn btn-outline-warning text-center" data-toggle="modal" data-target=".bd-example-modal-xl" @click.prevent="detalles(encargado.id)">
                        <font-awesome-icon icon="eye"/>
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
</div>
</div>
	</div>
</template>

<script>

	export default{

		name:'Estadisticas',
		data(){
			return{

				total:[],
				atendidos:[],
				pendientes:[],
				usuarios:[],
				usertotal:[],
				useratendidos:[],
				userpendientes:[],

			}
		},

		mounted(){

			this.Solicitudes()
			this.listadouser()
		},

		methods:{

			Solicitudes(){

			axios.get('estadisticas').then((response) => {

						this.total = response.data.total
						this.atendidos = response.data.atendidos
						this.pendientes = response.data.pendientes

        		});
			},

			detalles(id){

				axios.get('estadisticas/detalles/' + id ).then((response) => {

						this.usertotal = response.data.usertotal
						this.useratendidos = response.data.useratendidos
						this.userpendientes = response.data.userpendientes

        		});
			},

			listadouser(){

				axios.get('estadisticas/usuarios').then((response) => {

						this.usuarios = response.data
						console.log(this.usuarios)

        		});

			},
		},
	}

</script>

