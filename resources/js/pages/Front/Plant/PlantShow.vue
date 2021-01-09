<template>
  
    <b-container fluid style="padding: 0px; margin: 0px" >

<PlantSearch v-if="!plant.nome_variedade"  :withSearch="false"/>

   <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="start">

 <!-- <b-col style=" color: black; padding: 0px"  > -->
            <!-- <b-row  align-h="between" style="margin: 15px"> -->

   <transition  v-if="!loading " name="slide-fade">
            <router-view :plantReceive="plant" ></router-view>
        </transition>


                <PlantDetails :plant="plant" >

                    <template v-can="'variety-delete'" slot="delete" v-if="auth.mode">

                        <ModalToDelete  v-can="'variety-delete'"   >
                            <template slot="deleteButton">
                                 <button type="button"  class="btn btn-danger" @click="onConfirmDelete">Confirmar</button>
                            </template>
                        </ModalToDelete>

                    </template>

                </PlantDetails>

<!-- if variety -->
                <PlantStages :stages="plant.plantStages"/>



            <!-- </b-row> -->

            <!-- <b-row  align-h="between" style="margin: 15px"> -->


                <PlantVarieties v-if="!plant.nome_variedade"  :varieties="varietiesOfPlant"/>


<!-- if variety -->
                <PlantPlagues :plagues="plant.plagues"/>
 

            <!-- </b-row> -->



            <!-- <b-row  align-h="between" align-v="center" style="margin: 15px"> -->


                <PlantCrops :crops="plantCrops"/>


            <!-- </b-row> -->

<!-- </b-col> -->
</b-row>

</b-container>
</template>
                
<script>
// import ModalToDelete from "@/components/ModalToDelete";

import PlantDetails from "@/components/Plant/PlantDetails";
import PlantStages from "@/components/Plant/PlantStages";
import PlantVarieties from "@/components/Plant/PlantVarieties";
import PlantPlagues from "@/components/Plant/PlantPlagues";
import PlantCrops from "@/components/Plant/PlantCrops";

import PlantSearch from "@/components/Plant/PlantSearch";
import ModalToDelete from "@/components/ModalToDelete";

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import Crop from '@/models/Crop'
import PlantPlague from '@/models/PlantPlague'
import Plague from '@/models/Plague'
import PlagueType from '@/models/PlagueType'

import  $bus   from '@/app';

  export default {
    name: "PlantShow",
    components: {
        PlantDetails,
        PlantStages,
        PlantVarieties,
        PlantPlagues,
        PlantCrops,
        PlantSearch,
        ModalToDelete,
    },
    props: ['plantId'],
    // {
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            title: "Plant",
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
                return Plant.query().with('plantStages').with('plantType').with('plagues').find(this.plantId) 
           
            },
            varietiesOfPlant(){
                 return Plant.query().where('master_plant_id',this.plant.id).get(); 
            },
            plantCrops(){
                return Crop.query().where('id_plant',this.plant.id).get(); 
            },
            plantPlagues(){
                return PlantPlague.query().get(); 
            },
             plagues(){
                return Plague.query().with('plagueType').get(); 
            },
            plagueType(){
                return PlagueType.query().get(); 
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
     

      console.log("Created PlantShow");
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
   
        async onConfirmDelete(){

          console.log("on confirm Planthow");
          try {
            this.loading = true;
                Farm.api().delete('plant/'+this.plantId,{delete: this.plantId});
                  // const { data } = await FarmService.remove(this.farmSelected.id);
                  //  Farm.delete(this.farmSelected.id);
                 
                  this.$bvModal.hide('ModalToDelete')
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
      console.log("Mounted PlantShow");


    
      }
  };
  </script>

  <style>
  </style>
