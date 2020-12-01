<template>
    <div>
		

				<slot name="top"></slot>

		<!-- </b-row> -->

		<b-row style="background-color: #327927;  padding-top: 5px; " class="text-white align-items-center">
						
		</b-row>

		<b-row style="background-color: #f8f9fa;  padding-top: 7px; padding-left: 20px"  class=" align-items-center ">
				
				<slot name="search"></slot> 

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

