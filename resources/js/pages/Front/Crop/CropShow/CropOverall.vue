<template>

<b-col>

   <b-row align-h="around"  style="margin: 0px; padding: 0px">


      <CropDetails :crop="crop"/>


      <CropAlerts :crop="crop"/>


      <TerrainHistory :crop="crop"/>


      <TasksToDo :crop="crop"/>


      <PlaguesOfCrop :crop="crop"/>


      <LastAirData :crop="crop"/>


      <LastSoilData :crop="crop"/>


      <LastWeatherData :crop="crop"/>


    
    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col style=" color: black; padding: 0px"  >    

           <!--  <TimeLineChart :crop="crop"/> -->
    
        <!-- <TerrainsOfFarm :google="google"  :terrains="farm.terrains"  />  -->
        </b-col>

         

    </b-row>





  </b-row>
</b-col>
</template>


<script>
import CropDetails from "@/components/Crop/OverAll/CropDetails";
import CropAlerts from "@/components/Crop/OverAll/CropAlerts";
import TerrainHistory from "@/components/Crop/OverAll/TerrainHistory";
import TasksToDo from "@/components/Crop/OverAll/TasksToDo";
import PlaguesOfCrop from "@/components/Crop/OverAll/PlaguesOfCrop";
import LastAirData from "@/components/Crop/OverAll/LastAirData";
import LastSoilData from "@/components/Crop/OverAll/LastSoilData";
import LastWeatherData from "@/components/Crop/OverAll/LastWeatherData";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

      export default {
        name: "CropOverall",
        components: {  
          CropDetails,
          CropAlerts,
          TerrainHistory,
          TasksToDo,
          PlaguesOfCrop,
          LastAirData,
          LastSoilData,
          LastWeatherData
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
          addPlagueToCrop(){

          },
          colher(){

          },
            enabledDevice(){
                 console.log("on confirm CropOverall");
                   try {
                    // this.loading = true;
                    // const { data } = await TerrainService.update(this.terrain.id,this.terrain);
                    
                    //  Terrain.update({where: data.id,data: {data}});
                    Crop.api().patch('crop/'+this.crop.id+'/enabledBlock',this.crop)

                    // console.log("terrain :"+ JSON.stringify(data))
                    // this.$router.push({path: '/front/terrain'});
                    
                } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
                } finally {
                    // this.loading = false
                    // this.$router.push({path: '/front/terrain/'+this.terrain.id});
                }
            }
      
        },
        mounted () {
            console.log("Mounted CropOverall");
          }
      };
      </script>
      
      <style>
      </style>
      