<template>

    <!-- <b-col sm="8" style=" padding: 10px" > -->
    <b-col  style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" > 

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >DeviceLastSoilData</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px">
                    
                        <b-col>
                           <b-form-datepicker id="example-datepicker" @input="fillData" v-model="dateStart" class="mb-2"></b-form-datepicker>
                        </b-col>
                        <b-col>
                           <b-form-datepicker id="example-datepicker" @input="fillData" v-model="dateEnd" class="mb-2"></b-form-datepicker>
                        </b-col>
                    </b-row>

                     <b-row style="padding: 10px">
                      
                       <div class="container" >
                            <div v-if="loaded && isData"  class="Chart__content">
                              
                              

                             <!--  <WateringChart   :chart-data="chartData" :PMPcultural="PMPcultural" :capacidade_campo="capacidade_campo" /> -->

                              <WateringChart :chart-data="datacollection" :PMPcultural="PMPcultural" :capacidade_campo="capacidade_campo" ></WateringChart>

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

import SoilData from '@/models/SoilData'
import CurrentWeather from '@/models/CurrentWeather'

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
             // dataSoil: { type: Array, default: null } ,  
             // dataCurrentWeather: { type: Array, default: null },

             lastAnalyseSoil: { type: Object, default: null },
             plant: { type: Object, default: null },
             crop: { type: Object, default: null },
             device: { type: Object, default: null },

        },
        data() {
          return {        
              loaded: false,
               isData: false,
               dateStart: null,
               dateEnd: null,
               // soilDatas: null,
               dataCurrentWeather: null,

               datacollection: null,

// chartDataSend:null,
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
            
            currentWeatherDatas(){

              return CurrentWeather.query().with('farm').where('id_farm',this.crop.terrain.farm_id).where((d) => {
                     return new Date(d.date) >= new Date(this.dateStart) && new Date(d.date) <= new Date(this.dateEnd)
                    }).get();    
              
           },
            soilDatas(){

              return SoilData.query().with('device').with('crop').with('terrain').where('crop_id',this.crop.id).where('device_id',this.device.id).where((d) => {
                     return new Date(d.date) >= new Date(this.dateStart) && new Date(d.date) <= new Date(this.dateEnd)
                    }).get(); 
              
           },

          },
        async created() {
            this.loaded = false;
           
             console.log("created DeviceLastSoilData");
        },
        methods: {
        

            getDataToChart () {

              console.log("start getDataToChart ");
                var vm=this;   
                
                this.isData = false;


              if(this.soilDatas && this.currentWeatherDatas){
console.log("inside IF soilDatas ");
                this.chartData.labels = this.soilDatas.map(list => {return list.date;});


                this.chartData.datasets[0].data = this.soilDatas.map(list => {return list.humidade20;});

                this.chartData.datasets[1].data = this.soilDatas.map(list => {return list.humidade40;});


                //precipitation
                 this.chartData.datasets[2].data = this.currentWeatherDatas.map(list => {return list.rain;});

                 
                 this.isData = true;
                 console.log("here2");
              }
          
 this.loaded = true;
 console.log("end getDataToChart ");
          },

          waterLimits(){
              //linhas horizontais
            var DTA= this.lastAnalyseSoil.soilType.capacidade_campo - this.lastAnalyseSoil.soilType.capacidade_emurchecimento;
            console.log("DTA : " + DTA);

            var CAD = DTA * this.plant.fracao_esgotamento_agua_solo_conforto_hidrico;
            console.log("CAD : " + CAD);

            var diff = DTA - CAD;
            console.log("diff : " + diff);

                 this.PMPcultural = parseFloat(this.lastAnalyseSoil.soilType.capacidade_emurchecimento,10) + parseFloat(diff,10) * 100;
console.log("PMPcultural : " + this.PMPcultural);

                 this.capacidade_campo = this.lastAnalyseSoil.soilType.capacidade_campo * 100;
console.log("capacidade_campo : " + this.capacidade_campo );
          },

           fillData () {
        this.datacollection = {
          labels: this.soilDatas.map(list => {return list.date;}),
               datasets: [            
                      {
                          type: 'line',
                          label: 'Soil Humidity 20',
                          data: this.soilDatas.map(list => {return list.humidade20;}),
                          // backgroundColor: '#f87979',
                          borderColor: '#329932', 
                          backgroundColor: 'transparent',

                      },
                      {
                          type: 'line',
                          label: 'Soil Humidity 40',
                          data: this.soilDatas.map(list => {return list.humidade40;}),
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
                          data: this.currentWeatherDatas.map(list => {return list.rain;}),
                          borderColor: '#0073e5' ,
                          backgroundColor: '#0073e5',
                          yAxisID: 'precipitation-value',  
                      },
                      
                  ],
        }
      },


           
        },
        async mounted () {
            console.log("Mounted DeviceLastSoilData");
            this.waterLimits();            
            
            this.dateStart = this.crop.start_crop_date;
            this.dateEnd = new Date();

            this.getDataToChart();

            // setInterval(() => {
              this.fillData()
            // }, 2000)

          }
      };
      </script>
      
      <style>
      </style>
      