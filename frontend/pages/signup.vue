<template>	
	<form @submit="onSubmit">
		<input type="text" v-model="form.username">
		<input type="text" v-model="form.email">
		<input type="text" v-model="form.password">
		<button type="submit">
			<span v-if="!loadingForm">Kirim</span>
			<span v-else>Loading</span>
		</button>
	</form>	
</template>

<script>
export default{
	data(){
		return {
			form : {
				username : null,
				email : null,
				password : null
			},
			loadingForm : false
		}
	},

	methods:{
		onSubmit(evt){
			if(this.loadingForm){
			 return false;
			}

			evt.preventDefault();

			this.loadingForm = true;

			this.$axios.post('/signup',this.form)
			.then(res => {
				this.$toaster.success('Berhasil');		
				this.$router.push('/signin');
			})
			.catch(err => {
				this.loadingForm = false;
				this.$toaster.error('Terjadi Kesalahan');
			});	
		}
	}
}
</script>