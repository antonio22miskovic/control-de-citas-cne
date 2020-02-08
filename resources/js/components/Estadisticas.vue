<template>
	<div>
		<table class="table table-sm table-dark">
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

		},

		methods:{

			Solicitudes(){

			axios.get('estadisticas').then((response) => {

						this.total = response.data.total
						this.atendidos = response.data.atendidos
						this.pendientes = response.data.pendientes

        		});
			},

			usuarios(id){

				axios.get('estadisticas/detalles/' + id ).then((response) => {

						this.usertotal = response.data.usertotal
						this.useratendidos = response.data.useratendidos
						this.userpendientes = response.data.userpendientes

        		});
			}
		}
	}

</script>

