<template>
  <div>Logs</div>
</template>

<script>
import Io from 'socket.io-client';
import Echo from "laravel-echo";

export default {
	data(){
		return {
			echo : null,
			logInterval : null
		}
	},

	mounted(){
		this.echo = new Echo({
			broadcaster: 'socket.io',
			host: "http://localhost:6001",
			auth: {
				headers: {
					// 'X-CSRF-TOKEN' : window.laravel.csrf_token
				}
			},
			client : Io   		
		});

		this.echo.private('new-log')
    	.listen('.NewLog',(data) => {
	    	console.log(data);
	    });	    

	    this.sendLog();
	},

	methods : {
		sendLog(){
			this.logInterval = setInterval(() => {
				this.$axios.post('/logs');
			},20000);
		}
	},

	destroyed(){
		clearInterval(this.logInterval);
	}
}
</script>