<template>
    
      <b-container fluid  class="vld-parent"  align-h="center" style="  margin: 0px; padding: 0px; min-height: 80vh">

           <loading :active.sync="loading" 
                :can-cancel="false" 
                :on-cancel="onCancel"
                :color="color"
                :height="110"
                :width="110"
                :is-full-page="fullPage"
                :blur="'1'"></loading>



        <b-row style="margin: 0px; background-color: #f8f9fa;"  align-h="center" align-v="center">
          <!-- <GreyContainerRow> -->
            <slot name="topBody"></slot>
          <!-- </GreyContainerRow> -->
        </b-row>

        <b-row style="background-color: white; margin: 0px; padding: 5vh 5vw 5vw; "  align-h="center">
            <slot name="body"></slot>
        </b-row>

      </b-container> 


</template>


<script>
  import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

import GreyContainerRow from "@/wrapper/GreyContainerRow";

    export default {
      name: "BodyContainer",
      components: {
          Loading,
          GreyContainerRow,
        },
      props: {
        loading: { type: Boolean, default: false },
        
      },
         data() {
        return { 
              fullPage: false,
              color: "#4AAD37",
              

        };
      }, 
  
      computed : {
           
            },
  
      methods: {
        onCancel(){
          console.log("cancel loading");
        },


      },
      mounted(){
        console.log("mounted HeaderComponent");
        }
    };

    </script>
    
    <style>  
    </style>
    
    