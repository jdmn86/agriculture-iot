<template>

 <b-col style=" background-color: #f8f9fa;margin: 10px" >

    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
        <h4>Company workers</h4>

    </b-row> 

    <b-row v-for="user in users" :key="user.id" style="padding: 5px" align-h="center" align-v="center">
  
            <h4  style="margin: 5px" id="name" >{{user.name}}</h4>
         
    </b-row> 
</b-col>

	<!-- <b-col style=" border-radius: 4px; color: black; padding: 0px">
		<b-row align-h="around" class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
			<h1>lista dos colegas</h1>
			
		</b-row>
		<b-row v-for="user in users" :key="user.id">
			<h1>{{user.name}}</h1>
		</b-row>
	</b-col>
						
 -->
</template> 

<script> 


export default {
	name: "EmployeeList",
	components: {

	},
	 props: {
        users: { type: Array, default: null },
    },
	data() {
		return {
			
		}
	},	
	computed: {

	    auth(){
	          return Auth.query().first();
	    },
	},
	created() {
	
	},
	methods: {
		
	},
	mounted() {

	}
};
</script>

<style></style>
