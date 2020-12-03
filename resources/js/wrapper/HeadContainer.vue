<template>
    <div>
		

		<b-row style="margin: 10px; ">
			<b-col >
				<h1 style="color: #327927; padding-top: 30px " class="font-weight-bolder">{{title}}</h1>
			</b-col>
			  <b-col cols="auto" class="header-component-content">
				<toggle-button @change="setMode" :value="userSettings.mode"  :height="25" :width="110" :font-size="13" :sync="true" :labels="{checked: 'Edit Mode', unchecked: 'View Mode'}" color="rgb(74, 173, 55)"/>
			</b-col>
			<!-- <h1 v-can="role-list">Pode</h1>
			  <h1 v-if="$can('role-list')">You have permission to manage users</h1>
			  <h1 v-else>You dont have permission to manage users</h1> -->
		</b-row> 
  
		<!-- </b-row> -->

		<b-row style="background-color: #327927;  padding-top: 5px; " class="text-white align-items-center">
						
		</b-row>

		<b-row style="background-color: #f8f9fa;  padding-top: 7px; padding-left: 20px"  class=" align-items-center ">
				
				<slot name="search"></slot> 

		</b-row>
	</div>   
 
</template>

<script>
import {mapGetters,mapMutations,mapActions} from 'vuex'

export default { 
  name: "HeadContainer",
  props: {
        title: { type: String, default: "without text" },
        
      },
         data() {
        return { 

        };
      }, 
  
      computed : {
             ...mapGetters('auth',['userSettings']),   
           
            },
  
      methods: {
        ...mapMutations('auth',['setMode']),  
      
         
      },
      mounted(){
        console.log("mounted HeaderComponent");
      }
};
</script>

<style>  
</style>

