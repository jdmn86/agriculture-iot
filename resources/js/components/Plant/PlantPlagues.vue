<template>

       <b-col sm="6" style=" padding: 10px" >
              
     <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" >

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >Plagues :</h4>
            
                    </b-row> 

                    <!-- <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                            <h4 style="margin: 5px" id="localizacao" class="">{{farm.localizacao}}</h4>
                         
                    </b-row>  -->
                            <b-list-group style=" height: 30vh; overflow-y: scroll; margin: 5px"> 
                                        <b-list-group-item button  style="padding: 10px 5px 10px 5px ;
    border: 1px solid #327927; color:black" v-if="plagues" v-for="p in plagues" :key="p.id" @click="$router.push({name: 'plagueShow',params: {plagueId: p.id} })">
                                <b-col>
                                    <b-row align-h="center" @click="goTodetailPlague(p.id)">

                                      <b-col sm="6">
                                          <b-row>
                                              <h4 >{{p.nome_comum}}</h4>    
                                          </b-row>
                                      </b-col>
                                      <b-col sm="6">
                                          <b-row>
                                              <h5 >{{p.nome_cientifico}}</h5>
                                          </b-row>
                                      </b-col>
                                      
                                    </b-row>
                                </b-col>
                            </b-list-group-item>
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

import GoogleMapsApiLoader from 'google-maps-api-loader'

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

  export default {
    name: "PlantPlagues",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: ['plagues'],
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

      console.log("Created PlantPlagues");
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
      console.log("Mounted PlantPlagues");


    
      }
  };
  </script>

  <style>
  </style>
