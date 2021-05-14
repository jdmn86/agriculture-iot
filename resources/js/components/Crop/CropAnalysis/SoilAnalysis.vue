<template>

      <b-col  style="margin: 10px; background-color: #f8f9fa;">

           <!--  <b-row v-if="crop.plant" align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
               <h4 >LastSoilAnalysis</h4>
    
            </b-row>  -->

             <b-row  v-if="AnalyseSoilLast"  style="padding: 10px; " align-h="between" align-v="center">

               <LastSoilAnalysis :crop="crop" :AnalyseSoilLast="AnalyseSoilLast"/> 

            </b-row>


         <b-row style="padding: 10px; " align-h="between" align-v="center">

            <b-col style=" color: black; padding: 0px"  > 

                <b-button v-can="'analyseSoil-create'" v-if="auth.mode"  block  style=" border-color: #4AAD37;background-color: #4AAD37; " @click="addSoilAnalysis = !addSoilAnalysis" >Add Soil Analyse</b-button>

                <AddSoilAnalysis  :AnalyseSoilLast="AnalyseSoilLast" v-if="addSoilAnalysis"/>
                  
            </b-col>
          </b-row>


            <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

              <b-col style=" color: black; padding: 0px"  > 

                    <h1>chart this crop</h1>
                    <h1>list all crops of this plant select one to compare</h1>
                    <h1>chart of the select to compare</h1>
                    
              </b-col>
            </b-row>


        </b-col>

       
   <!-- </b-row> -->


</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import LastSoilAnalysis from '@/components/Crop/CropAnalysis/LastSoilAnalysis'
import AddSoilAnalysis from '@/components/Crop/CropAnalysis/AddSoilAnalysis'

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import AnalysePlant from '@/models/AnalysePlant'
import AnalyseSoil from '@/models/AnalyseSoil'
import AnalyseWater from '@/models/AnalyseWater'
import SoilType from '@/models/SoilType'
import AnalyseSoilGuideline from '@/models/AnalyseSoilGuideline'

      export default {
        name: "SoilAnalysis",
        components: {  
          LastSoilAnalysis,
          AddSoilAnalysis
        },
        props: {
            crop: { type: Object, default: null },
            // analyseSoilsLast: { type: Object, default: null },

        },
        data() {
          return {        
                addSoilAnalysis: false,
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
             AnalyseSoilLast(){

                  return AnalyseSoil.query().with('terrain').with('soilType').with('analysis_guideline').where('terrain_id',this.crop.terrain.id).last();    
                
            },
           
            

          },
        created() {
        },
        methods: {
     
        },
        mounted () {
            console.log("Mounted SoilAnalysis");
          }
      };
      </script>
      
      <style>
      </style>
      