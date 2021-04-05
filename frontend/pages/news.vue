<template>
	<div>
		<template v-if="$fetchState.pending">
			Loading
		</template>

  		<template v-else-if="$fetchState.error">
  			Sepertinya Terjadi Kesalahan
  		</template>

		<template v-else>
			<table>
				<tbody>
					<tr>
						<td>Title</td>
						<td>Content</td>
					</tr>
					<tr v-for="(item,index) in theData.data">
						<td>{{item.title}}</td>
						<td>{{item.content}}</td>
					</tr>
				</tbody>
			</table>	

			<pagination 
				:records="theData.total" 
				v-model="theData.current_page" 
				:per-page="parseInt(theData.per_page)" 
				v-if="theData.data.length != 0" />
		</template>
	</div>
</template>

<script>
export default{
	async fetch() {				
      this.theData = await this.$axios.get('/news?page='+this.page).then(res => res.data);
    },  

	data(){
		return {
			theData : {
				current_page : this.$route.query.page || 1
			}
		}
	},

	watch : {
		page(newValue){
			this.$router.push({
				path : this.$route.fullPath,
				query : {
					page : newValue
				}
			});		
			
			this.$fetch();
		}
	},

	computed:{
		page(){
			return this.theData.current_page;
		}
	}
}
</script>