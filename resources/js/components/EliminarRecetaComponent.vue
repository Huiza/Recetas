<template>
	<input  type="submit" class="btn btn-danger mr-1" value="Eliminar x" v-on:click="eliminarReceta">
</template>

<script type="text/javascript">
	export default {
		props: ['recetaId'],

		methods:{
			eliminarReceta(){
				this.$swal({
					title: 'Deseas eliminar esta receta?',
					text: "Una vez eliminada no se puede recuperar",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si',
					cancelButtonText: 'No'
				}).then((result) => {
					if (result.value) {

						const params ={
							id: this.recetaId
						}
					//Enviar la petición al servidor
					axios.post('recetas/${this.recetaId}',{params,_method:'delete'}).then(respuesta=>{
						this.$swal({
							title: 'Receta eliminada',
							text: 'La receta ha sido eliminada correctamente.',
							icon: 'success'
						});
						//Eliminar receta del DOMM
						this.$el.parentNode.parentNode.parentNode.removeChild(this.sel.parentNode,parentnode);
					}).catch(error=>{
						console.log(errror)
					})
  }
})
			}
		}
	}
</script>