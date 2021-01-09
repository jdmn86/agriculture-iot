<template>
	<b-container fluid v-if="company" style="  margin: 0px; padding: 0px">
<!-- background-color: #f8f9fa; -->
		<b-row  style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

			<CompanyDetails :company="company"/>

			<EmployeeList  :users="company.users"/>

		</b-row>

		<b-row  style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">
		
			 <b-col style=" background-color: #f8f9fa;margin: 10px" >

			    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
			        <h4>Chat</h4>
 
			    </b-row> 

			    <!-- <b-row v-for="user in users" :key="user.id" style="padding: 5px" align-h="center" align-v="center">
			  
			            <h4  style="margin: 5px" id="name" >{{user.name}}</h4>
			         
			    </b-row>  -->
			</b-col>

		</b-row>

	</b-container>

</template>

<script>
import CompanyDetails from "@/components/Company/CompanyDetails";
import EmployeeList from "@/components/Employee/EmployeeList";

import Company from '@/models/Company'
import Auth from '@/models/Auth'

export default {
name: "CompanyShow",
components: {
	CompanyDetails,
	EmployeeList
},
props: {
          companyId: { type: String, default: null },

    },
data() {
	return {
		title: "Company"
	}
},
computed: {
	
	company(){
           return Company.query().where('id',this.auth.company_id).with('users').first();
           
    },
    auth(){
          return Auth.query().first();
    },
},
created() {
	// this.fetch()
},
methods: {
	// ...mapActions('company', ['setCompanySelected']),
	
	// async fetchData() {
	// 	this.loading = true

	// 	try {
	// 		// console.log("company_id :"+JSON.stringify(this.auth.company_id))
	// 		// const {data} = await CompanyService.getById(this.auth.company_id); //this.fetchParams)

	// 		// console.log("data :"+JSON.stringify(data));
	// 		// Company.insert({data: data});

	// 		Company.api().get('company/'+this.auth.company_id);

	// 		// this.setCompanySelected(data);

	// 		// console.log("company :" + JSON.stringify(this.companySelected))
	// 		// this.pagination.total = data.total
	// 	} catch (e) {
	// 		// this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
	// 		this.error = e.message
	// 			console.log(e)
	// 	} finally {
	// 		this.loading = false
	// 	}

	// }
},
mounted() {}
};
</script>

<style></style>
