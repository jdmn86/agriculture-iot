<template>


    <!-- <b-row style="background-color: #f8f9fa; padding-top: 25px;  padding-left: 20px"  class=" align-items-center "> -->
  <!-- <b-container fluid  align-h="center" style=""> -->

      <b-row style="margin: 0px; background-color: #f8f9fa;"  align-h="center" align-v="center">

          <slot ></slot>

      </b-row>

<!-- </b-container> -->
      
</template>


<script>
    // import {mapGetters,mapMutations,mapActions} from 'vuex'
    export default {
      name: "GreyRow",
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
        console.log("mounted GreyContainerRow");
      }
    };

    </script>
    
    <style>  
    </style>
    
    