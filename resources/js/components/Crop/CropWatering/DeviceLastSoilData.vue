<template>

    <b-col sm="8" style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" > 

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >DeviceLastSoilData</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px">
                    
                      <!--  <b-form-datepicker id="example-datepicker" v-model="date" class="mb-2"></b-form-datepicker> -->
                    
                    </b-row>

                     <b-row style="padding: 10px">
                      
                       <div class="container" >
                            <div v-if="loaded "  class="Chart__content">
                              
                              <!-- <LineChart :chart-data="downloads" :chart-labels="labels"></LineChart> -->

                              <WateringChart  v-if="chartData " :chartData="chartData"  />
<!-- 
                                 <WateringChart  v-if="chartData && get_soilDataLast" :soilLast="get_soilDataLast"  :chartData="chartData" :plant="GET_CROP.plant"/> -->

                                </div>

                                <div v-else>
                                  <h1>Without data yet</h1>
                                </div>
                            <!-- <line-chart 
                               v-if="loaded"
                               :width="500"
                              :height="300"
                              :labels="labels"
                              :datasets="datasets"
                              :options="$options.options"/> -->
                          </div>
                      
                    </b-row>
 
         

                </b-col>

            </b-row>


            </b-col>
</template>


<script>

import WateringChart from "@/components/Crop/CropWatering/WateringChart";

import Auth from '@/models/Auth'
import AirData from '@/models/AirData'

import  $bus   from '@/app';

      export default {
        name: "DeviceLastSoilData",
        components: {  
           WateringChart,
        },
        props: {
             dataSoil: { type: Array, default: null } ,  
             dataCurrentWeather: { type: Array, default: null } ,  
            // google: { type: Object, default: null },

        },
        data() {
          return {        
              loaded: false,
               isData: false,
             chartData: {
              labels: [],            
              datasets: [            
                      {
                          type: 'line',
                          label: 'Soil Humidity 20',
                          data: [],
                          // backgroundColor: '#f87979',
                          borderColor: '#329932', 
                          backgroundColor: 'transparent',

                      },
                      {
                          type: 'line',
                          label: 'Soil Humidity 40',
                          data: [],
                          //pointBackgroundColor: '#935116',
                          borderColor:'#855321',
                          backgroundColor: 'transparent',
                      },
                      // {   //vem do airData
                      //     type: 'line',
                      //     label: 'EVPT',
                      //     data: this.dataHourAux,
                      //     //pointBorderColor:'#5B2C6F',
                      //     borderColor:'#5B2C6F',
                      //     yAxisID: 'evpt-value',                

                      // },
                      {
                          type: 'bar', //vem do weather
                          label: 'Precipitation',
                          data: [],
                          borderColor: '#0073e5' ,
                          backgroundColor: '#0073e5',
                          yAxisID: 'precipitation-value',  
                      },
                      
                  ],
          },
        }
      },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            

          },
        async created() {
            this.loaded = false;
           
             console.log("created DeviceLastSoilData");
        },
        methods: {
            dataToChart () {

                var vm=this;   
console.log("here");
              if(this.dataSoil.length){

                this.chartData.labels = this.dataSoil.map(list => {return list.date;});

console.log("here2");
                this.chartData.datasets[0].data = this.dataSoil.map(list => {return list.humidade20;});

                this.chartData.datasets[1].data = this.dataSoil.map(list => {return list.humidade40;});


                //precipitation
                 this.chartData.datasets[2].data = this.dataCurrentWeather.map(list => {return list.rain;});


                // this.chartData[2].data = this.data.map(list => {return list.humidade20;});

                              
    //               console.log("data"+this.data);

    //               this.data.forEach(function(a) { 

    // console.log("a : "+JSON.stringify(a));
    // console.log("labels : "+JSON.stringify(vm.labels));

    //                   vm.labels.push(a.date);
    //                   vm.chartData[0].data.push(a.humidity);
    //                   vm.chartData[1].data.push(a.temp);
    //                   vm.chartData[2].data.push(a.heat_index);
    //                   vm.chartData[3].data.push(a.dew_point);
    //                   // vm.chartData[4].data.push(a.dpo);
    //                   vm.chartData[5].data.push(a.precipitation);                  
    //               });

    //               this.isData = true;
    //               this.loaded = true;
              }

          
          //     })
          //     .catch (err => {
          //       console.error(err)
          //     });
 this.loaded = true;
          },
           
        },
        async mounted () {
            console.log("Mounted DeviceLastSoilData");
            this.dataToChart();
         
          }
      };
      </script>
      
      <style>
      </style>
      