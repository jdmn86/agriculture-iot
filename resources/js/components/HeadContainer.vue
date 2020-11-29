<template>
      <div >
            
             <b-row style="margin: 10px; ">

	                <slot name="title"></slot>

	        </b-row>

	        <b-row style="background-color: #327927;  padding-top: 5px; " class="text-white align-items-center">
	         
	       </b-row>

	       <b-row style="background-color: #f8f9fa;  padding-top: 7px; padding-left: 20px"  class=" align-items-center ">
	            
	       		<slot name="search"></slot>

	       </b-row>

	       <b-row v-if="FARMS" style="margin: 10px; padding-top: 25px; "><!--  class="align-items-center"> -->

            	<b-container fluid  style="; background-color: #f8f9fa; margin: 0px; ">

               </b-container>

	        </b-row>

	        <b-row v-else>

	          <b-container>

	          		<slot name="body"></slot>

	          </b-container>
	        </b-row>

      </div>
</template>

<script>
export default {
  name: "HeadContainer"
};
</script>

<style>  
</style>

