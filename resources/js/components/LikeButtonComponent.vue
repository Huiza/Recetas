<template>
	<div >
		<span class="like-btn" @onclick="likeReceta" class="{'like-active': isActive }"></span>
		<p>{{ cantidadLikes }} Les gusta esta receta</p>
	</div>
</template>

<script type="text/javascript">
	export default {
		props:['recetaId','like','likes'],

		//Data es una función dinámica en el que lo valores pueden cambiar
		data: function(){
			return {
				isActive:this.like,
				totalLikes:this.likes
			}
		},
		methods:{
			likeReceta(){
				axios.post('/recetas/'+this.recetaId).then(respuesta=>{
					if(respuesta.data.attached.lenght>0){
						this.$data.totalLikes++;
					}
					else{
						this.$data.totalLikes--;
					}
					this.isActive=!isActive
				})
				.catch(error=>{
					if(error.response.status===401){
						window.location='/register';
					}
				});

			}
		},
		computed: {
			cantidadLikes:function(){
				return this.totalLikes;
			}
		}
	}
</script>