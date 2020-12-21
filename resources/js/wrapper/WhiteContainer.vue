<template>


    <!-- <b-row style="background-color: #f8f9fa; padding-top: 25px;  padding-left: 20px"  class=" align-items-center "> -->
      <!-- style=" margin: 0px; " -->
  <!-- <b-container fluid  align-h="center" style=" margin: 0px; background-color: red;"> -->

      <!-- <b-container fluid style="background-color: white; padding: 10px; margin: 10px"  align-h="center"> -->
<b-row style=" padding: 10px; margin: 10px"  align-h="center">
          <slot ></slot>
</b-row>
      <!-- </b-container> -->
<!-- </b-container> -->
      
</template>


<script>
    // import {mapGetters,mapMutations,mapActions} from 'vuex'
    export default {
      name: "WhiteContainer",
      props: {
        
        
      },
         data() {
        return { 

        };
      }, 
   
      computed : {
             // ...mapGetters('auth',['userSettings']),   
           
            },
  
      methods: {
        // ...mapMutations('auth',['setMode']),  
      
         
      },
      mounted(){
        console.log("mounted WhiteContainer");
      }
    };

    </script>
    
    <style>  
    </style>
    
    