<template>

<b-col>
 <b-row align-h="around"  style="margin: 0px; padding: 0px">


      

      <!-- <b-col style="margin: 10px; background-color: #f8f9fa;"> -->

           <!--  <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
                <h4 >Plagues/Diseases</h4>
    
            </b-row> 

            <b-row  style="padding: 10px; " align-h="start" align-v="center">

              <b-col cols="6"> -->
                <VerticalPlagues  :plagues="plagues"/>
                  
               
              <!--  </b-col> -->

               <!-- <b-col > -->
                <transition  v-if="!loading "  name="slide-fade">
                    <router-view :crop="crop"></router-view>
                </transition>
              <!-- </b-col> -->

            <!-- </b-row>  -->

         <!--    <b-row  style="padding: 10px; " align-h="between" align-v="center">

           


              
            </b-row> -->


 
<!-- </b-col> -->

         

    </b-row>
</b-col>
</template>


<script>
import VerticalPlagues from "@/components/Crop/PlantHealth/VerticalPlagues";
import NoDataContainer from "@/components/NoDataContainer";
// import AddPlagueToCrop from "@/components/Crop/AddPlagueToCrop";


import Auth from '@/models/Auth'
import CropPlague from '@/models/CropPlague'
import CurrentWeather from '@/models/CurrentWeather'
import DailyWeather from '@/models/DailyWeather'

      export default {
        name: "CropPlantHealth",
        components: {  
          VerticalPlagues,
          NoDataContainer
          // AddPlagueToCrop
      
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                title: "Plagues",
                loading: false,   
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            plagues(){
                return CropPlague.query().where('crop_id',this.crop.id).get();
            }

          },
        created() {
          this.fetch();
        },
        methods: {
          addPlagueToCrop(){

          },
          colher(){

          },
            enabledDevice(){
                 console.log("on confirm CropPlantHealth");
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
            },

            async fetch(){
            this.loading = true

            try {
                await CropPlague.api().get('cropPlague'); 
                await DailyWeather.api().get('dailyWeather');    
                await CurrentWeather.api().get('currentWeather');   
              
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
            console.log("Mounted CropPlantHealth");
          }
      };
      </script>
      
      <style>
      </style>
      