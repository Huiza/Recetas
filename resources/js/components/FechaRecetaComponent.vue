<template>
	<span v-text="formatearFecha"></span>
</template>

<script type="text/javascript">
	export default {
		props: ['fecha'],
		mounted(){
			console.log('La fecha es:',this.fecha);
		},
		computed: {
			formatearFecha(){
				return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY')			}
		}
	}
</script>
