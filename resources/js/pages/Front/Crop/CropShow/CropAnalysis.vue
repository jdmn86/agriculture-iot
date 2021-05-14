<template>

<b-col>
    <b-row align-h="center"  style="margin: -2px; padding: 0px">

         <b-col align-h="start" style="padding: 0px">
             <b-nav tabs justified style="margin: 5px 3px 2px 3px;">
                <!-- <b-nav tabs justified style="margin: 5px 10px 2px 10px;"> -->
                
                <b-nav-item  :active="selectedTypeAnalysis === 'soil'" @click="onSelectedTypeAnalysis('soil')">
 
                        <b-row align-h="center">
                            <b-col >
                                <h5  class="font-weight-bold" style="color: #35782c">Soil</h5>    
                            </b-col>
                        </b-row>

                    
                </b-nav-item>
                 <b-nav-item  :active="selectedTypeAnalysis === 'water'" @click="onSelectedTypeAnalysis('water')">
 
                        <b-row align-h="center">
                            <b-col >
                                <h5  class="font-weight-bold" style="color: #35782c">Water</h5>    
                            </b-col>
                        </b-row>

                    
                </b-nav-item>

                 <b-nav-item  :active="selectedTypeAnalysis === 'plant'" @click="onSelectedTypeAnalysis('plant')">
 
                        <b-row align-h="center">
                            <b-col >
                                <h5  class="font-weight-bold" style="color: #35782c">Plant</h5>    
                            </b-col>
                        </b-row>

                        <!-- <b-row style="color: DimGray"align-h="around">   

                            <b-col cols="6" style="padding-top: 5px">
                                 <b-row align-h="around">
                                    <i  :class='currentWeather.icon'></i>
                                </b-row>
                              <b-row align-h="around">
                                    <p class="font-weight-bold" >
                                        {{currentWeather.weather_type}}
                                    </p>
                                </b-row>
                            </b-col>

                             
                        </b-row> -->
                    
                </b-nav-item>


               
              </b-nav>
            </b-col>            

    </b-row>


        <b-row  v-if="selectedTypeAnalysis" style=" background-color: #f8f9fa; margin: 0px; border: 2px solid #4aad37;border-radius: 4px;">
            <b-col  >

               
                 <b-row style="padding: 10px" align-h="start" align-v="center">
                    
                  
                 <!--  <LastSoilAnalysis v-if="selectedTypeAnalysis === 'soil'" :crop="crop" :analyseSoilsLast="analyseSoilsLast"/> -->
                   <SoilAnalysis v-if="selectedTypeAnalysis === 'soil'" :crop="crop" />


                  <LastWaterAnalysis v-if="selectedTypeAnalysis === 'water'" :crop="crop"/>
                  <LastPlantAnalysis v-if="selectedTypeAnalysis === 'plant'" :crop="crop"/>
                  
                     
                     
                </b-row> 

                

            </b-col>

           
      </b-row>

<!--         <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

          <b-col style=" color: black; padding: 0px"  > 

              <b-button v-can="'analyseSoil-create'" v-if="auth.mode"  block  style=" border-color: #4AAD37;background-color: #4AAD37; ">Add Soil Analyse</b-button>
                
          </b-col>
        </b-row>





       <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

          <b-col style=" color: black; padding: 0px"  > 

                <h1>chart this crop</h1>
                <h1>list all crops of this plant select one to compare</h1>
                <h1>chart of the select to compare</h1>
                
          </b-col>
        </b-row>
 -->


        
      <!--  <b-row   style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
           
           <ChartWeather :crop="crop"/>

                <b-col md="auto">
                  <b-calendar v-model="value" @context="onContext" locale="en-US"></b-calendar>
                </b-col>
                <b-col>
                  <p>Value: <b>'{{ value }}'</b></p>
                  <p class="mb-0">Context:</p>
                  <pre class="small">{{ context }}</pre>
                </b-col>

        </b-row>

         <b-row   style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
           
           <ChartWeather :crop="crop"/>

                <b-col md="auto">
                <b-form-datepicker id="example-datepicker" v-model="dateStart" class="mb-2"></b-form-datepicker>
                </b-col>
                <b-col>
                  <p>dateStart: <b>'{{ dateStart }}'</b></p>
                  <p class="mb-0">Context:</p>
                  <pre class="small">{{ dateStart }}</pre>
                </b-col>

        </b-row> -->




    </b-col>

</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import CurrentWeather from '@/models/CurrentWeather'
import DailyWeather from '@/models/DailyWeather'

import SoilType from '@/models/SoilType'
import AnalyseSoilGuideline from '@/models/AnalyseSoilGuideline'

import AnalysePlant from '@/models/AnalysePlant'
import AnalyseSoil from '@/models/AnalyseSoil'
import AnalyseWater from '@/models/AnalyseWater'


import LastSoilAnalysis from '@/components/Crop/CropAnalysis/LastSoilAnalysis'
import LastWaterAnalysis from '@/components/Crop/CropAnalysis/LastWaterAnalysis'
import LastPlantAnalysis from '@/components/Crop/CropAnalysis/LastPlantAnalysis'

import ModalToConfirm from "@/components/ModalToConfirm";

import SoilAnalysis from '@/components/Crop/CropAnalysis/SoilAnalysis'

import  $bus   from '@/app';

      export default {
        name: "CropAnalysis",
        components: {  
          LastSoilAnalysis,
          LastWaterAnalysis,
          LastPlantAnalysis,
          ModalToConfirm,
          SoilAnalysis
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {      
            // date: null,  
            selectedTypeAnalysis: "soil",
            // context: null,
            // dateStart: null,
                
          };
        },
       
        computed : {
            auth(){
                return Auth.query().first();
            },
            analyseSoilsLast(){

                  return AnalyseSoil.query().with('terrain').with('soilType').with('analysis_guideline').where('terrain_id',this.crop.terrain.id).last();    
                
            },
            // dailyWeather(){
            //     return DailyWeather.query().where('id_farm',this.crop.terrain.farm_id).orderBy('id', 'asc').limit(6).get();                
                
            // },
              

            
          },
        async created() {
            // this.date = new Date();

            this.fetch();
        },  
        methods: {
           finishCrop(){
                try {
            this.loading = true;
                Crop.api().patch('crop/'+this.crop.id+'/finish/',this.crop);
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

            async fetch(){
            this.loading = true

            try {
                
                await SoilType.api().get('soilType');    
                // await AnalyseSoilGuideline.api().get('analyseSoilGuideline');    
                await AnalyseSoil.api().get('analyseSoil');
                // await AnalyseWater.api().get('analyseWater');

                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                this.onSelectedTypeAnalysis("soil");
                this.loading = false
            }     

        },
         
        onSelectedTypeAnalysis(type){
            this.selectedTypeAnalysis = type;
        },
      
        },
        mounted () {
            console.log("Mounted CropAnalysis");
          }
      };
      </script>
      
<style scoped>

/*.nav-link {
    height: 17vh;  
}*/

.nav-link.active {
    background-color: #4aad37 !important;
    color: blue !important;
    border: 2px solid #4aad37;
}
.nav-link.active * {
    color: white !important;
}

</style>
      