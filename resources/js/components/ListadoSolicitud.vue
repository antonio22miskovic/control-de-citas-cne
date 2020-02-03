<template>

	     <div class="container">

        <div>
        <div class="modal fade" id="detallesmodalcenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                   <h5 class="modal-title " id="exampleModalCenterTitle">solicitud: {{this.detallesolicitud.solicitud}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                      </button>
                </div>

              <div class="modal-body">

                <div>

                  <p> fecha:{{ this.detallesolicitud.fecha }}</p>
                  <p> respuesta:{{ this.detallesolicitud.respuesta }}</p>
                  <p> tramite:{{ this.tramite.tramite }}</p>
                  <p> estatus:{{this.detallesolicitud.status }}</p>

                  <h5> datos del solicitante </h5>
                  <p> nombre:  {{ this.cliente.name }}</p>
                  <p> apellido:  {{ this.cliente.apellido}}</p>
                  <p> cedula: {{ this.cliente.ci }}</p>
                  <p> correo:{{ this.cliente.email}}</p>

                </div>

              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
        </div>
      </div>
    </div>


            <div class="row justify-content-center">

	     <table class="table">

          <thead class="thead-dark">

            <tr>

                <th  scope="col">solicitud</th>
                <th  scope="col">respuesta</th>
                <th scope="col" class="text-center">ver</th>

            </tr>

          </thead>

          <tbody>
          	<h4 v-if="solicitudes.length === 0" class="text-center"> no tiene solicitudes </h4>
            <tr v-for="solicitud of solicitudes" :key="solicitud.id">

              <td>t{{ solicitud.solicitud }}</td>
              <td>{{ solicitud.respuesta }}</td>


              <td class="text-center">

               <button class="btn btn-outline-primary text-center" data-toggle="modal" data-target="#detallesmodalcenter" @click.prevent="detalles(solicitud)">
                 <font-awesome-icon icon="eye"/>
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
</template>
<script>

	export default{

		name:'ListadoSolicitud',

		 mounted () {

		 	this.listado(1);

        },

		data(){

			return{

				solicitudes:[],
        detallesolicitud:'',
        user:'',
        cliente:'',
        tramite:'',

            paginate:{

                'tota': 0,
                'current_page': 0,
                'per_page': 0,
                'last_page': 0,
                'from': 0,
                'to' : 0,

            },

			}

		},

		methods:{

        Chagepage(page){

          this.paginate.current_page = page;
          this.listado(page);

        },

  			listado(page){

        		var url = 'solicitud?page='+page;
        		axios.get(url).then(res=>{

        			this.solicitudes = res.data.solicitud.data;
              this.paginate = res.data.paginate;


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

         }

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