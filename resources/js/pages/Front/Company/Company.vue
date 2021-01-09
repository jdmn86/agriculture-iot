<template>
	
		<div>
			<HeadContainer :title="title"/>

			<BodyContainer :loading.sync="loading">

				    <transition  v-if="!loading " name="slide-fade">
	                    <router-view ></router-view>
	                </transition>

			</BodyContainer>

		</div>

</template>

<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";

import Company from '@/models/Company'
import Auth from '@/models/Auth' 

import  $bus   from '@/app';

export default {
name: "Company",
components: {
	HeadContainer,
	BodyContainer,
},
data() {
	return {
		title: "Company",
		loading: false,
	}
},
computed: {
	// company(){
 //           return Company.query().where('id',this.auth.company_id).first();
           
 //    },
    auth(){
          return Auth.query().first();
    },
},
created() {
	this.fetch();
},
methods: {
	
	async fetch() {
		this.loading = true

		try {

			await Company.api().get('company/'+this.auth.company_id);

		} catch (e) {
			this.$bus.$emit('warningFixTop', e.message);
			this.error = e.message
				console.log(e)
		} finally {
			this.loading = false
		}

	}
},
mounted() {}
};
</script>

<style></style>
