<template>

<b-col>
    <b-row align-h="center"  style="margin: -2px; padding: 0px">

         <b-col align-h="start" style="padding: 0px">
             <b-nav tabs justified style="margin: 5px 3px 2px 3px;">
                <!-- <b-nav tabs justified style="margin: 5px 10px 2px 10px;"> -->
                
                <b-nav-item  v-if="currentWeather" :active="selectedDay === currentWeather" @click="onSelectedDay(currentWeather)">
 
                        <b-row align-h="center">
                            <b-col >
                                <h5  class="font-weight-bold" style="color: #35782c">Today</h5>    
                            </b-col>
                        </b-row>

                        <b-row style="color: DimGray"align-h="around">   

                            <b-col cols="6" style="padding-top: 5px">
                                 <b-row align-h="around">
                                    <i  :class='currentWeather.icon'></i>
                                </b-row>
                                <!-- <small> -->
                              <b-row align-h="around">
                                    <p class="font-weight-bold" >
                                        {{currentWeather.weather_type}}
                                    </p>
                                </b-row>
                            </b-col>

                             <b-col cols="6" style="padding-top: 10px">
                                <b-row align-h="around">
                                    <!-- <small> -->
                                        <i style="color: red" class="fas fa-thermometer-half"></i>
                                    <!-- </small> -->
                                   
                                        <p class="font-weight-bold" >
                                            {{currentWeather.temp}}
                                        </p>
                                </b-row>

                               <!--  <b-row>
                                    <p><small>{{currentWeather.humidity}}%</small></p>
                                </b-row> -->
                                 <b-row align-h="around">
                                    <!-- <small> -->
                                        <i style="color: CornflowerBlue" class="fas fa-wind"></i>
                                    <!-- </small> -->

                                        <p class="font-weight-bold" >
                                           {{currentWeather.wind_speed}}
                                        </p>
                                </b-row>

                                <b-row style="color: DimGray" align-h="around" v-if="currentWeather.rain">
                                        <small>
                                            <i class="fas fa-cloud-rain"></i>
                                        </small>
                                    
                                        <p class="font-weight-bold" >{{currentWeather.rain}}</p>

                                </b-row>
                            </b-col>
                        </b-row>
                    
                </b-nav-item>


                <b-nav-item  v-if="dailyWeather" v-for="d in dailyWeather" :key="d.id" :active="selectedDay === d" @click="onSelectedDay(d)">
               
                     <b-row align-h="center">
                            <b-col >
                                <h5 style="color: #35782c" v-if="d.weekDay == 0" class="mb-0 font-weight-bold"> Sunday</h5> 
                                <h5  style="color: #35782c" v-if="d.weekDay == 1" class="mb-0 font-weight-bold"> Monday</h5> 
                                <h5 style="color: #35782c" v-if="d.weekDay == 2" class="mb-0 font-weight-bold"> Tuesday</h5> 
                                <h5 style="color: #35782c" v-if="d.weekDay == 3" class="mb-0 font-weight-bold"> Wednesday</h5> 
                                <h5  style="color: #35782c" v-if="d.weekDay == 4" class="mb-0 font-weight-bold"> Thursday</h5> 
                                <h5  style="color: #35782c" v-if="d.weekDay == 5" class="mb-0 font-weight-bold"> Friday</h5> 
                                <h5  style="color: #35782c" v-if="d.weekDay == 6" class="mb-0 font-weight-bold"> Saturday</h5>
                            </b-col>
                        </b-row>

                        <b-row style="color: DimGray"align-h="around">   

                            <b-col cols="6" style="padding-top: 5px">
                                 <b-row align-h="around">
                                    <i  :class='d.icon'></i>
                                </b-row>
                                <!-- <small> -->
                              <b-row align-h="around">
                                    <p class="font-weight-bold" >
                                        {{d.weather_type}}
                                    </p>
                                </b-row>
                            </b-col>

                             <b-col cols="6" style="padding-top: 10px">
                                <b-row align-h="around">
                                    <!-- <small> -->
                                        <i style="color: red" class="fas fa-thermometer-half"></i>
                                    <!-- </small> -->
                                   
                                        <p class="font-weight-bold" >
                                            {{d.temp_min}}/{{d.temp_max}}
                                        </p>
                                </b-row>

                               <!--  <b-row>
                                    <p><small>{{d.humidity}}%</small></p>
                                </b-row> -->
                                 <b-row align-h="around">
                                    <!-- <small> -->
                                        <i style="color: CornflowerBlue" class="fas fa-wind"></i>
                                    <!-- </small> -->

                                        <p class="font-weight-bold" >
                                           {{d.wind_speed}}
                                        </p>
                                </b-row>

                                <b-row style="color: DimGray" align-h="around" v-if="d.rain">
                                        <small>
                                            <i class="fas fa-cloud-rain"></i>
                                        </small>
                                    
                                        <p class="font-weight-bold" >{{d.rain}}</p>

                                </b-row>
                            </b-col>
                        </b-row>
                </b-nav-item>

              <!--   <b-nav-item   exact exact-active-class="active" ><h5  style="color: #4aad37">Quarta</h5></b-nav-item>

                <b-nav-item   exact exact-active-class="active" ><h5  style="color: #4aad37">Quinta</h5></b-nav-item>

                <b-nav-item   exact exact-active-class="active" ><h5  style="color: #4aad37">Sexta</h5></b-nav-item>

                <b-nav-item   exact exact-active-class="active" ><h5  style="color: #4aad37">Sabado</h5></b-nav-item>

                <b-nav-item   exact exact-active-class="active" ><h5  style="color: #4aad37">Domingo</h5></b-nav-item> -->
                
               <!--  <b-nav-item :to="{name: 'weather'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Weather</h5></b-nav-item>

                 <b-nav-item  :to="{name: 'watering'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Watering</h5></b-nav-item>
                
                <b-nav-item :to="{name: 'fertilization'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Fertilization</h5></b-nav-item>
               
               <b-nav-item :to="{name: 'analysis'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Analysis</h5></b-nav-item>
               
                <b-nav-item :to="{name: 'plantHealth'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Plant Health</h5></b-nav-item>

                 <b-nav-item :to="{name: 'schedule'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Schedule</h5></b-nav-item>
               -->
              
              </b-nav>
            </b-col>            

    </b-row>


        <b-row  v-if="selectedDay" style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
            <b-col  cols="6">

               <!--  <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                    <h4 v-if="selectedDay.weekDay == 0" class="mb-0"> Sunday</h4> 
                    <h4 v-if="selectedDay.weekDay == 1" class="mb-0"> Monday</h4> 
                    <h4 v-if="selectedDay.weekDay == 2" class="mb-0"> Tuesday</h4> 
                    <h4 v-if="selectedDay.weekDay == 3" class="mb-0"> Wednesday</h4> 
                    <h4 v-if="selectedDay.weekDay == 4" class="mb-0"> Thursday</h4> 
                    <h4 v-if="selectedDay.weekDay == 5" class="mb-0"> Friday</h4> 
                    <h4 v-if="selectedDay.weekDay == 6" class="mb-0"> Saturday</h4>   
        
                </b-row> -->

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

           
      </b-row>

       <b-row   style=" background-color: #f8f9fa; margin: 0px; border-top: 2px solid #4aad37;border-left: 2px solid #4aad37 ;border-radius: 4px;">
           
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

        </b-row>




    </b-col>

</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import CurrentWeather from '@/models/CurrentWeather'
import DailyWeather from '@/models/DailyWeather'


import ChartWeather from '@/components/Crop/Weather/ChartWeather'

import  $bus   from '@/app';

      export default {
        name: "CropWeather",
        components: {  
          ChartWeather,
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
            dateStart: null,
                
          };
        },
       
        computed : {
            auth(){
                return Auth.query().first();
            },
            currentWeather(){

                    return CurrentWeather.query().where('id_farm',this.crop.terrain.farm_id).last();    
                
            },
            dailyWeather(){
                return DailyWeather.query().where('id_farm',this.crop.terrain.farm_id).orderBy('id', 'asc').limit(6).get();  
                // return DailyWeather.query().where('id_farm',this.crop.terrain.farm_id).where((d) => {
                //      return new Date(d.date) > this.date
                //     }).orderBy('id', 'desc').limit(6).get();  
                
            },
              

            
          },
        async created() {
            this.date = new Date();

            this.fetch();
        },  
        methods: {
            async fetch(){
            this.loading = true

            try {
                
                await DailyWeather.api().get('dailyWeather');    
                await CurrentWeather.api().get('currentWeather');

                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                this.onSelectedDay(this.currentWeather);
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
            console.log("Mounted CropWeather");
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
      