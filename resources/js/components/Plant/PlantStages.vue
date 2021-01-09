<template>

   <b-col sm="4" style=" padding: 10px" >
              
     <b-row  style=" background-color: #f8f9fa; margin: 0px">
        <b-col >

            <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                <h4 >Fases :</h4>
    
            </b-row> 

            <b-row v-for="s in stages" :key="s.id" style="padding: 10px" align-h="start" align-v="center">
          
                 <b-col sm="6">
                    <h5 class="card-text">{{s.GrowthStageName}}</h5>
                  </b-col>
                  <b-col sm="6">
                     <p class="card-text">{{s.daysOfFase }} days</p>
                  </b-col>
                 
            </b-row> 
        </b-col>
    </b-row>
</b-col>

          <!--  <b-col sm="5" style="background-color: white; ">
                <b-row style="margin: 10px">  

                      <b-col sm="3">
                          <h5 class="card-text">Fases :</h5>
                        </b-col>
                        <b-col sm="9">
                          <b-row v-for="s in stages" :key="s.id" style="margin: 10px">
                            
                            <b-col sm="6">
                              <h5 class="card-text">{{s.GrowthStageName}}</h5>
                            </b-col>
                            <b-col sm="6">
                              <h6 class="card-text">{{s.daysOfFase }}days</h6>
                            </b-col>

                          </b-row>
                          
                      </b-col>   
                       
                </b-row> 


            </b-col> -->
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
    name: "PlantStages",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: ['stages'],
    // {
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            title: "Farms",
            loading: false,
             isFormAddNewPlant: false,
              isFormAddCrop: false,
            // farmSelected: null,
      };
    },
    watch: {

      
    
    },
    computed : {
          
           farms(){
                return Farm.query().with('terrains').get();
           
            },
            farm(){
                return Farm.query().with('terrains').find(this.farmId) 
           
            },
            plant(){
                return Plant.query().with('plantStages').with('plantType').find(this.plantId) 
           
            },
            variedadesOfPlant(){
                 return Plant.query().where('master_plant_id',this.plant.id).get(); 
            },
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

      console.log("Created PlantStages");
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
   
       daysOfFase: function(f) {
            return f.stopDayCropFase-f.startDayCropFase;
          },
          createCrop(c){ 
              this.plantToCrop = c;
              this.isFormAddCrop = true;
          },
          open_AddNewPlant (){
                this.isFormAddNewPlant = true;
                
            },
            open_EditVariedade(item){
              this.edit=true;
              this.plantToSend=item;
              this.isFormAddNewPlant = true;
                
            },
            closeAddCrop(){
                this.isFormAddCrop = false;
                
            },
            closeAddEdit(){
              this.isFormAddNewPlant = false;
              this.plantToSend = this.getPlantById(this.$props.plantId);
            },
            goTodetailPlague(prodId) {
              this.$router.push({name:'PlagueDetails',params:{Pid:prodId}})
            },
            goTodetailCultivo(terrainId) {
              this.$router.push({name:'ShowTerrain',params:{Tid:terrainId}})
            },
           
    },
    mounted () {
      console.log("Mounted PlantStages");


    
      }
  };
  </script>

  <style>
  </style>
