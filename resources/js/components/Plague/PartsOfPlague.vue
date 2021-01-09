<template>
<b-col sm="4" style=" padding: 10px" >
              
     <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" >

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >Parts of Plague :</h4>
            
                    </b-row> 

                    <!-- <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                            <h4 style="margin: 5px" id="localizacao" class="">{{farm.localizacao}}</h4>
                         
                    </b-row>  -->
                            <b-list-group style=" height: 30vh; overflow-y: scroll; margin: 5px"> 
                                        <b-list-group-item button  style="padding: 10px 5px 10px 5px ;
    border: 1px solid #327927; color:black"  v-for="p in parts" :key="p.id">
                                          <!-- <b-col> -->
                                              <b-row align-h="center" style="margin: 0px">

                                                  <b-col sm="6">
                                                      <b-row>
                                                          <h5 >{{p.part}}</h5>
                                                      </b-row>
                                                      <!-- <b-row>
                                                          <h4 >{{v.name}}</h4>    
                                                      </b-row> -->
                                                  </b-col>
                                                  <!--  <b-col sm="3">
                                                     <b-button v-if="auth.mode && !isFormAddNewPlant"   @click="open_EditVariedade(v)"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Edit </b-button>
                                                  </b-col>
                                                  <b-col sm="3">
                                                    <b-button v-if="auth.mode && !isFormAddCrop"   @click="createCrop(v)"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Create crop </b-button>
                                                  </b-col> -->

                                              </b-row>
                                        <!-- </b-col> -->
                                      </b-list-group-item >
                                  </b-list-group>     
                   

                </b-col>

            </b-row>
        </b-col>


</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import FarmDetails from '@/components/Farm/FarmDetails';

// import {FarmService} from "@/services/FarmService";
// import {TerrainService} from "@/services/TerrainService"; 

// import GoogleMapsApiLoader from 'google-maps-api-loader'

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

  export default {
    name: "PartsOfPlague",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: ['parts'],
    // {
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            title: "partsOfPlague",
            loading: false,
             isFormAddNewPlant: false,
              isFormAddCrop: false,
            // farmSelected: null,
      };
    },
    watch: {

      
    
    },
    computed : {
          
           // farms(){
           //      return Farm.query().with('terrains').get();
           
           //  },
           //  farm(){
           //      return Farm.query().with('terrains').find(this.farmId) 
           
           //  },
           //  plant(){
           //      return Plant.query().with('plantStages').with('plantType').find(this.plantId) 
           
           //  },
           //  variedadesOfPlant(){
           //       return Plant.query().where('master_plant_id',this.plant.id).get(); 
           //  },
          // terrains: function () {
          //       console.log("computed terrains");
          //       if(this.farmSelected){
          //         return Terrain.query().where('farm_id', this.farmSelected.id).get()  
          //       }
                
                
          // },

            auth(){
                return Auth.query().first();
            },
         
      },
     async created() {
      // console.log("Created FarmShow");
      // const googleMapApi = await GoogleMapsApiLoader({
      //   apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      // });
      // this.google = googleMapApi;

      console.log("Created partsOfPlague");
       // this.fetchTerrains().then(() => {
            
                //  if(Farm.query().find(this.$route.params.farmId) ){
                //         console.log("with farm")
                //     this.farmSelected = Farm.query().with('terrains').find(this.$route.params.farmId);

                //    // this.terrainsToSend = Terrain.query().where('farm_id', this.terrain.farm_id).where('id', (value) => value != this.terrain.id).get();

                //    // this.farm = Farm.query().where('id', this.terrain.farm_id).first();    
                // }

            // });
               
    },
    methods: {
   
      
           
    },
    mounted () {
      console.log("Mounted partsOfPlague");


    
      }
  };
  </script>

  <style>
  </style>
