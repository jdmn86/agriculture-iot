<template>
    
      <b-container fluid  class="vld-parent"  align-h="center" style=" padding: 0px; min-height: 80vh">

           <loading :active.sync="loading" 
                :can-cancel="false" 
                :on-cancel="onCancel"
                :color="color"
                :height="110"
                :width="110"
                :is-full-page="fullPage"
                :blur="'1'"></loading>

            <slot />

      </b-container>  

</template>


<script> 
  import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';


    export default {
      name: "BodyContainer",
      components: {
          Loading,
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
    
    