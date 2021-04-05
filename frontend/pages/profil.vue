<template>
	<form id="form" @submit="onSubmit($event)">
		{{ user.photo }}
		<input type="file" name="photo">
		<button>Kirim</button>		
	</form>
</template>

<script>
export default{
 	asyncData(ctx) {
    	if (!ctx.$auth.loggedIn) {
    		ctx.redirect('/');
    	}
	},

	computed: {
		user(){
			return this.$auth.user;
		}
	},

	methods: {
		onSubmit(evt){
			evt.preventDefault();		
			this.$axios.post('upload',new FormData(document.getElementById('form')))
			.then(res => {
				console.log(res);
			});
		}
	}
}
</script>