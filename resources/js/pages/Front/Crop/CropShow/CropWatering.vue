<template>

<b-col>
    <b-row align-h="center"  style="margin: 0px; padding: 0px">

      <b-col>
        <DevicesOfCrop v-if="google && devicesOfCrop && devicesOfCrop.length>0" :devices="devicesOfCrop" :google="google" @selectDevice="selectDevice"/>
      </b-col>
       <!-- <DeviceLastSoilData />         -->

    </b-row>

     <b-row align-h="center"  style="margin: 0px; padding: 0px">

      <b-col>
        <DeviceLastSoilData v-if="soilDatas && currentWeatherDatas" :dataSoil="soilDatas" :dataCurrentWeather="currentWeatherDatas" />
      </b-col>
       <!-- <DeviceLastSoilData />         -->

    </b-row>


        <!-- <b-row  v-if="selectedDay" style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
            <b-col  cols="6">

             

                 <b-row style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Day:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p v-if="selectedDay.weekDay == 0" class="mb-0"> Sunday</p> 
                        <p v-if="selectedDay.weekDay == 1" class="mb-0"> Monday</p> 
                        <p v-if="selectedDay.weekDay == 2" class="mb-0"> Tuesday</p>  
                        <p v-if="selectedDay.weekDay == 3" class="mb-0"> Wednesday</p> 
                        <p v-if="selectedDay.weekDay == 4" class="mb-0"> Thursday</p> 
                        <p v-if="selectedDay.weekDay == 5" class="mb-0"> Friday</p> 
                        <p v-if="selectedDay.weekDay == 6" class="mb-0"> Saturday</p>   
                      </b-col>
                     
                </b-row> 

                 <b-row style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Date:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.date}}</p>
                      </b-col>
                     
                </b-row> 

                <b-row v-if="selectedDay.clouds" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Clouds:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.clouds}}</p>
                      </b-col>
                     
                </b-row> 

                <b-row v-if="selectedDay.weather_type" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">weather_type:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.weather_type}}</p>
                      </b-col>
                     
                </b-row> 

                  <b-row v-if="selectedDay.temp" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Temperature:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.temp}}</p>
                      </b-col>
                     
                </b-row> 

                 <b-row v-if="selectedDay.temp_min" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Temp min:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.temp_min}}</p>
                      </b-col>
                     
                </b-row> 

                 <b-row v-if="selectedDay.temp_max" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">Temp max</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.temp_max}}</p>
                      </b-col>
                     
                </b-row> 

                <b-row v-if="selectedDay.feels_like" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">feels_like:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.feels_like}}</p>
                      </b-col>
                     
                </b-row> 

                  <b-row v-if="selectedDay.dew_point" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">dew_point:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.dew_point}}</p>
                      </b-col>
                     
                </b-row> 

                  <b-row v-if="selectedDay.humidity" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">humidity:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.humidity}}</p>
                      </b-col>
                     
                </b-row> 

                  <b-row v-if="selectedDay.pressure" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">pressure:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.pressure}}</p>
                      </b-col>
                     
                </b-row> 

                
            </b-col>

            <b-col  cols="6">

                   <b-row  v-if="selectedDay.wind_speed" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">wind_speed:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.wind_speed}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.wind_gust" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">wind_gust:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.wind_gust}}</p>
                      </b-col>
                     
                </b-row> 

                  <b-row  v-if="selectedDay.wind_deg" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">wind_deg:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.wind_deg}}</p>
                      </b-col>
                     
                </b-row> 

                 <b-row  v-if="selectedDay.uvi" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">uvi:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.uvi}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.visibility" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">visibility:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.visibility}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.wetleaf" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">wetleaf:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.wetleaf}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.rain" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">rain:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.rain}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.rain_hour" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">rain_hour:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.rain_hour}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.snow" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">snow:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.snow}}</p>
                      </b-col>
                     
                </b-row> 

                    <b-row  v-if="selectedDay.snow_hour" style="padding: 10px" align-h="start" align-v="center">
                      
                     <b-col sm="6">
                        <h5 class="card-text">snow_hour:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{selectedDay.snow_hour}}</p>
                      </b-col>
                     
                </b-row> 

            </b-col>

           
      </b-row> -->

       <!-- <b-row   style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
           
           <ChartWeather :crop="crop"/>

                <b-col md="auto">
                  <b-calendar v-model="value" @context="onContext" locale="en-US"></b-calendar>
                </b-col>
                <b-col>
                  <p>Value: <b>'{{ value }}'</b></p>
                  <p class="mb-0">Context:</p>
                  <pre class="small">{{ context }}</pre>
                </b-col>

        </b-row> -->



    </b-col>

</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import Terrain from '@/models/Terrain'
import Device from '@/models/Device'

import SoilData from '@/models/SoilData'
import AirData from '@/models/AirData'
import CurrentWeather from '@/models/CurrentWeather'

import DeviceLastSoilData from '@/components/Crop/CropWatering/DeviceLastSoilData'
import DevicesOfCrop from '@/components/GoogleMaps/DevicesOfCrop'

import GoogleMapsApiLoader from 'google-maps-api-loader'

import  $bus   from '@/app';

      export default {
        name: "CropWatering",
        components: {  
          DeviceLastSoilData,
          DevicesOfCrop
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {      
            date: null,  
            selectedDay: null,
            context: null,
            google: null,   
            device: null,
            soilDatas: null,
          };
        },
       
        computed : {
            auth(){
                return Auth.query().first();
            },
             currentWeatherDatas(){

                  return CurrentWeather.query().with('farm').where('id_farm',this.crop.terrain.farm_id).get();    
                
             },
            devicesOfCrop(){

                  return Device.query().where('device_type_id',2).whereHas('soilDatas', (query) => {
                        query.where('crop_id', this.crop.id)
                      }).get()
                
            },
            // dailyWeather(){
            //     return DailyWeather.query().where('id_farm',this.crop.terrain.farm_id).orderBy('id', 'asc').limit(6).get();   
                
            // },
              

            
          },
        async created() {
            this.date = new Date();

            const googleMapApi = await GoogleMapsApiLoader({
              apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
            });
            this.google = googleMapApi;

            await this.fetch();
        },  
        methods: {
          selectDevice(d){
            console.log("   test :"+JSON.stringify(d))
            this.device = d;
            this.getSoilDatas();
          },
          getSoilDatas(){
              this.soilDatas = SoilData.query().with('device').with('crop').with('terrain').where('crop_id',this.crop.id).where('device_id',this.device.id).get();   
          },
            async fetch(){
            this.loading = true

            try {
                
                await Terrain.api().get('terrain'); 
                await CurrentWeather.api().get('currentWeather'); 
                await Device.api().get('device'); 
                await SoilData.api().get('soilData'); 
                await Crop.api().get('crop'); 

                // await CurrentWeather.api().get('currentWeather');

                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                // this.onSelectedDay(this.currentWeather);
                this.loading = false
            }     

        },
         onContext(ctx) {
            this.context = ctx
          },
        onSelectedDay(d){
            this.selectedDay = d;
        },
      
        },
        mounted () {
            console.log("Mounted CropWatering");
          }
      };
      </script>
      
<style scoped>

.nav-link {
    height: 17vh; 
    /*width: 10vw*/
}

.nav-link.active {
     background-color: #4aad37 !important;
  color: blue !important;
  border: 2px solid #4aad37;
}
.nav-link.active * {
    color: white !important;
}

</style>
      