<template>

      <b-col  style="margin: 10px; background-color: #f8f9fa;">

            <b-row v-if="crop.plant" align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
               <h4 >PlaguesOfCrop</h4>
    
            </b-row> 

             <b-row  style="padding: 10px; " align-h="between" align-v="center">
                <b-col cols="auto">
                    <h5 class="card-text">crop alert :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop}}</p>
                  </b-col>

            </b-row>

        </b-col>

       
   <!-- </b-row> -->


</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import CropPlague from '@/models/CropPlague'

      export default {
        name: "PlaguesOfCrop",
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
            plagues(){
                return CropPlague.all();
            },

          },
         created() {
            console.log("on created Crop");
            this.fetch();
        
          },
        methods: {
          colher(){

          },
          addPlagueToCrop(){

          },
          enabledDevice(){
            
          },
          async fetch(){
            this.loading = true

            try {
                await CropPlague.api().get('cropPlague');    
               
                // await Crop.api().get('crop');
                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                this.loading = false
            }     

        },
      
        },
        mounted () {
            console.log("Mounted PlaguesOfCrop");
          }
      };
      </script>
      
      <style>
      </style>
      