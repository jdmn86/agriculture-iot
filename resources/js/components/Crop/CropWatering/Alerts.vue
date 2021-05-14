<template>

      <b-col cols="3" style="margin: 10px; background-color: #f8f9fa;">

            <b-row v-if="crop.plant" align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
                <h4 >Alerts</h4>
    
            </b-row> 

           <b-row  style="padding: 10px; " align-h="between" align-v="center">
                <b-col cols="auto">
                    <h5 class="card-text">crop alert :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop}}</p>
                  </b-col>
              
           <!--      <h4 style="margin: 5px" id="deviceType" class="">{{device.deviceType.name}} </h4> -->
              
            </b-row>

         

        </b-col>

       
   <!-- </b-row> -->


</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

      export default {
        name: "CropAlerts",
        components: {  
          // TerrainsOfFarm  
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            

          },
        created() {
        },
        methods: {

      
        },
        mounted () {
            console.log("Mounted CropAlerts");
          }
      };
      </script>
      
      <style>
      </style>
      