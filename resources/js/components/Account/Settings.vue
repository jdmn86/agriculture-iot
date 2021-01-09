<template>
   
  <b-col cols="5" style="background-color: #f8f9fa; color: black; padding: 0px" > 

        <b-row  style="  margin: 0px">
            <b-col col-sm="1" >

                <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                    <h4 >Settings</h4>
    
                </b-row> 

                <b-row style="padding: 10px" align-h="start" align-v="center">
                     <b-form-group class="mr-sm-2" id="input-group-language" label="Language:" label-for="input-language" > 
                         <b-form-select 
                            style="margin-left: 10px"
                            id="input-language"
                            name="input-language"
                            v-model="$i18n.locale"
                            :options="langs">
                            
                        </b-form-select> 
                    </b-form-group>
                </b-row> 

                <b-row style="padding: 10px" align-h="start" align-v="center">
                    <b-col>
                        <h4 style="margin: 5px" id="localizacao" class="">Metric system</h4>
                    </b-col>
                    <b-col>
                        <toggle-button v-if="auth" @change="updateMetric" :value="auth.mode"  :height="25" :width="110" :font-size="13" :sync="true" :labels="{checked: 'Edit Mode', unchecked: 'View Mode'}" color="rgb(74, 173, 55)"/>
                    </b-col>
                </b-row> 


            </b-col>

        </b-row>

        </b-col>
</template>
                
<script>

import GreyRow from "@/wrapper/GreyRow"

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

  export default {
    name: "Settings",
    components: {
    
    },
    props: {
          // plantId: { type: String, default: null },
          // farmId: { type: String, default: null },

    },
    data() {
      return {
            title: "Terrain",
            loading: false,
      
            langs: ['pt', 'en'], 
      };
    },
    watch: {
       // plantSelected: function (newPlant,oldPlant) {

       //      console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

       //      if(newPlant != oldPlant && newPlant.id != this.plantId){
       //          this.$router.push({query: {...this.$route.query, plantId: newPlant.id}});

       //      }
            
       //  },
       //  farmSelected: function (newFarm,oldFarm) {

       //      console.log("value in farmSelected watch :"+JSON.stringify(newFarm));

       //      if(newFarm != oldFarm && newFarm.id != this.farmId){
       //          this.$router.push({query: {...this.$route.query, farmId: newFarm.id}});

       //      }
            
       //  },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
          
            // terrainsFiltered(){
            //     console.log("filtering terrain......")
            //      if(this.farmId || this.plantId){
            //         return Terrain.query().with("farm").whereHas('farm', (query) =>{
            //              // query.with('crops').whereHas('crops', (queryC) => {

            //              //   console.log("tem id_plant :"+this.plant);
            //               if(this.farmId){
            //                 query.where('id',parseInt(this.farmId));
            //             }
            //              // })
            //       }).with("crops").whereHas('crops', (query) =>{
            //              // query.with('crops').whereHas('crops', (queryC) => {

            //              //   console.log("tem id_plant :"+this.plant);
            //               if(this.plantId){
            //                 query.where('id_plant',parseInt(this.plantId));  
            //               }
                          
            //              // })
            //       }).get();    
            //     }else{
            //         return Terrain.query().with("crops").get();
            //     }
                
           
            // },
         
      },
    async created() {
      console.log("Created TerrainList");

    

    },
    methods: {
      
      // async onConfirmDelete(terrain){

      //     console.log("on confirm TerrainList");
      //     try {
      //           this.loading = true;
                 
      //           Terrain.api().delete('terrain/'+terrain.id);

      //           this.$bvModal.hide('ModalToDelete')
      //       } catch (e) {
      //           this.$bus.$emit('warningFixTop', e.message);
      //           this.error = e.message
      //           console.log(e)
      //       } finally {

      //           this.loading = false
               
      //       }

      // },     
   
    },
    mounted () {
      console.log("Mounted Settings");

    
      }
  };
  </script>

  <style>
  </style>
