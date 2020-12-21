<template>
    
		<b-container fluid style="background-color: white; padding: 0px; margin: 0px;">

			<b-row style="margin: 10px; ">
				<b-col >
					<h1 style="color: #327927; padding-top: 30px " class="font-weight-bolder">
					{{title}}
				</h1>
				</b-col>
				  <b-col cols="auto" class="header-component-content">
					<toggle-button v-if="auth" @change="updateMode" :value="auth.mode"  :height="25" :width="110" :font-size="13" :sync="true" :labels="{checked: 'Edit Mode', unchecked: 'View Mode'}" color="rgb(74, 173, 55)"/>
				</b-col>
				
			</b-row>    
	  
	 
			<b-row style="margin: 0px; background-color: #327927;  padding-top: 5px; " class="text-white align-items-center">
			</b-row>
 
			<!-- <b-row style="background-color: #f8f9fa;  padding-top: 7px; padding-left: 20px"  class=" align-items-center ">
					
					<slot name="search"></slot> 

			</b-row> -->
		
	</b-container>
 
</template>

<script>
// import {mapGetters,mapMutations,mapActions} from 'vuex'
import Auth from '@/models/Auth'

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
             // ...mapGetters('auth',['userSettings']),   
           	auth(){
          		return Auth.query().first();
    		},
        },
  
      methods: {
        // ...mapMutations('auth',['setMode']), 
        updateMode () {

        	if(this.auth.mode==false){
        		Auth.update({
			        where: this.auth.id,
			        data: {
			          mode: true
			        }
			      })		
        	}else{
        		Auth.update({
			        where: this.auth.id,
			        data: {
			          mode: false
			        }
			      })		
        	}
	      
	    } 
      
         
      },
      mounted(){
        console.log("mounted HeaderComponent");
      }
};
</script>

<style>  
</style>

