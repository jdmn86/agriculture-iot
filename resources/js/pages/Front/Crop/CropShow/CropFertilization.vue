<template>

<b-col>
 <b-row align-h="around"  style="margin: 0px; padding: 0px">


      
         <!--  <TotalNutrientsNeeds v-if="crop && plantUptakes.length>0" :crop="crop" :plantUptakes="plantUptakes"/>
            
       
         <BalanceNutrients v-if="crop && plantUptakes.length>0" :crop="crop" :plantUptakes="plantUptakes"/>



          <b-col>
            
           <h3>calculate need of fertilizer by nutrients</h3>
                        
          </b-col> -->


 
          <b-col>
               <b-row style="margin: 10px">
                <h3>adicionar fertilizante</h3>

            <!--    <b-button  block @click="change_AddFertilizer"  style=" border-color: #4AAD37;background-color: #4AAD37">Add Fertilizer</b-button> -->
              
              <b-button v-can="'fertilizer-create'" v-if="auth.mode"  block  style=" border-color: #4AAD37;background-color: #4AAD37; " @click="addFertilizer = !addFertilizer" >Add Fertilizer</b-button>

              <AddFertilizer v-if="addFertilizer"/>
              

            </b-row>
        </b-col>



        <b-col>
            <!-- select terreno ou cultivo -->
           <h3>mostra todas as fertilizações </h3>
            <!-- <VerticalHistoryThisCrop/> -->
            <!-- on select show info -->

        </b-col>

        


    </b-row>
</b-col>
</template>


<script>
import TotalNutrientsNeeds from "@/components/Crop/CropFertilizer/TotalNutrientsNeeds";
import BalanceNutrients from "@/components/Crop/CropFertilizer/BalanceNutrients";

import NoDataContainer from "@/components/NoDataContainer";
// import AddPlagueToCrop from "@/components/Crop/AddPlagueToCrop";
import AddFertilizer from "@/components/Crop/CropFertilizer/AddFertilizer";

import Auth from '@/models/Auth'
import CurrentWeather from '@/models/CurrentWeather'
import DailyWeather from '@/models/DailyWeather'

import Plant from '@/models/Plant'
import PlantStage from '@/models/PlantStage'
import PlantUptake from '@/models/PlantUptake'

      export default {
        name: "CropFertilization",
        components: {  
          TotalNutrientsNeeds,
          NoDataContainer,
          BalanceNutrients,
          AddFertilizer
      
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                title: "Plagues",
                loading: false,   
                addFertilizer: false,
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            plantUptakes(){
                return PlantUptake.query().with('plantStage').where('plant_id',this.crop.id_plant).get();
            }

          },
        created() {
          this.fetch();
        },
        methods: {
          
            async fetch(){
            this.loading = true

            try {
                // await CropPlague.api().get('cropPlague'); 
                await Plant.api().get('plant'); 
                await PlantUptake.api().get('plantUptake'); 
                await PlantStage.api().get('plantStage');    
                // await CurrentWeather.api().get('currentWeather');   
              
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
            console.log("Mounted CropFertilization");
          }
      };
      </script>
      
      <style>
      </style>
      