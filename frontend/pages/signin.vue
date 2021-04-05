<template>
	<form @submit="onSubmit">
		<input type="text" name="email" v-model="form.email">		
		<input type="text" name="password" v-model="form.password">
		<button type="submit">Kirim</button>
	</form>
</template>

<script>
export default{
	data(){
		return {
			form : {
				email : null,
				password : null
			}
		}
	},
	methods:{
		onSubmit(evt){		
			evt.preventDefault();
		
			this.$auth.login({
				data: this.form,
      		}).then(res => {
      			this.$router.push('/');
      		});	
		}
	}
}
</script>