<template>

	<div class="container p-3">
       <div class="col justify-content-center m-3">

		<div v-for="notifi of notifica" :key="notifi.id" class="alert alert-success" role="alert">
			<h4 class="alert-heading">{{ notifi.asunto }}!</h4>
			<p>{{ notifi.descripcion }}.</p>
			<hr>

		</div>
	</div>
	</div>

</template>
<script>
	export default{

		name:'Notificaciones',

		  mounted() {

        	this.notificacion();

        },


		data(){
			return{

				notifica:[],

			}
		},
		methods:{

			notificacion(){

				axios.get('notificacion')
				.then((response) => {

					this.notifica = response.data


				});
			}

		}


	}
</script>