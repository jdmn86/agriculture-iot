<template>

      <b-col  v-if="AnalyseSoilLast" style="margin: 10px; background-color: #f8f9fa;">

             <b-row  style="padding: 10px; " align-h="between" align-v="center">

                <b-col>

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                
                       <b-col sm="6">
                          <p class="card-text">{{AnalyseSoilLast.terrain.name}}</p>
                        </b-col>
                        <b-col sm="6">                          
                          <p class="card-text">{{AnalyseSoilLast.date}}</p>
                        </b-col>
                         
                    </b-row> 

                       <b-row style="padding: 10px" align-h="start" align-v="center">
                
                          <b-col sm="6">
                            <h5 class="card-text">soilDepth:</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{AnalyseSoilLast.soilDepth}}</p>
                          </b-col>
                         
                    </b-row> 


                </b-col>

              </b-row>

              
              <b-row  style="padding: 10px; " align-h="between" align-v="center">

                 <b-col cols="8">

                  <b-row>

                      <b-col cols="7"> 

                            <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">matOrgPer:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.matOrgPer}}</p>
                          </b-col>
                         
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">nitrogen:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.nitrogen}}</p>
                          </b-col>                          
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">phosphorus:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.phosphorus}}</p>
                          </b-col>
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">potassium:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.potassium}}</p>
                          </b-col>
                        
                         
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Magnesium:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Magnesium}}</p>
                          </b-col>
                      
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Calcium:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Calcium}}</p>
                          </b-col>
                        
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Sodium:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Sodium}}</p>
                          </b-col>
                      
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">phSoil:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.phSoil}}</p>
                          </b-col>
                         
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">phBufferIndex:</h5>
                          </b-col>
                        
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">hydrogen:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.hydrogen}}</p>
                          </b-col>
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Sulfur:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Sulfur}}</p>
                          </b-col>
                           
                    </b-row> 

                   <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">zinc:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.zinc}}</p>
                          </b-col>
                          
                    </b-row> 

                      <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Manganese:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Manganese}}</p>
                          </b-col>
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Cooper:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Cooper}}</p>
                          </b-col>
                         
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Iron:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Iron}}</p>
                          </b-col>
                        
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Boron:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Boron}}</p>
                          </b-col>
                         
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Aluminium:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Aluminium}}</p>
                          </b-col>
                         
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">excessLime:</h5>
                          </b-col>
                          
                    </b-row> 

                      <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Sulfate:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Sulfate}}</p>
                          </b-col>
                          
                    </b-row> 


                   <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Chloride:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Chloride}}</p>
                          </b-col>
                         
                    </b-row>

                      </b-col>

                      <b-col cols="5">  <!-- chart bar -->

                          <!-- <NutrientChartSoil v-if="datacollection" :chart-data="datacollection"/> -->

                           <!-- <canvas id="planet-chart"></canvas> -->

                      </b-col>

                  </b-row>

                </b-col>

                <b-col cols="4">

                  <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">perCationSatK:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.perCationSatK}}</p>
                          </b-col>
                          
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">perCationSatMg:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.perCationSatMg}}</p>
                          </b-col>
                          
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">perCationSatH:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.perCationSatH}}</p>
                          </b-col>
                          
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">perCationSatCa:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.perCationSatCa}}</p>
                          </b-col>
                      
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">perCationSatNa:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.perCationSatNa}}</p>
                          </b-col>
                           
                    </b-row> 

                     <b-row style="padding: 10px" align-h="start" align-v="center">
              
                       <b-col sm="6">
                          <h5 class="card-text">CEC:</h5>
                        </b-col>
                      
                      </b-row> 

                      <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="4">
                            <h5 class="card-text">Ece:</h5>
                          </b-col>
                          <b-col sm="4">
                            <p class="card-text">{{AnalyseSoilLast.Ece}}</p>
                          </b-col>
                          
                    </b-row>

                </b-col>

              </b-row>


            <!-- </b-col> -->


                    

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">Obs:</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{AnalyseSoilLast.Obs}}</p>
                          </b-col>
                         
                    </b-row> 

                     <b-row v-if="AnalyseSoilLast.soilType" style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col >
                            <h5>Soil type</h5>
                            <h5>{{AnalyseSoilLast.soilType}}</h5>
                          </b-col>
                         
                    </b-row> 

                      <b-row v-if="AnalyseSoilLast.analysis_guideline" style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col >
                            <h5>analysisGuideline</h5>
                            <h5>{{AnalyseSoilLast.analysis_guideline}}</h5>
                          </b-col>
                         
                    </b-row> 




                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                       <canvas id="planet-chart"></canvas>
                         
                    </b-row> 
<!--      
                  </b-col> -->

            </b-row>

        </b-col>

       
   <!-- </b-row> -->


</template>


<script>

import Chart from 'chart.js';

import planetChartData from "@/components/Crop/CropAnalysis/NutrientChartSoil.js";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

      export default {
        name: "LastSoilAnalysis",
        components: {  
          // NutrientChartSoil  
        },
        props: {
            crop: { type: Object, default: null },
            AnalyseSoilLast: { type: Object, default: null },

        },
        data() {
          return {        
                // datacollection: null,
                // labels: ['V.L.', 'L','M','H','V.H.'],
                 planetChartData: planetChartData,
             
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
          createChart(chartId, chartData) {
              const ctx = document.getElementById(chartId);
              const myChart = new Chart(ctx, {
                type: chartData.type,
                data: chartData.data,
                options: chartData.options,
              });
            }
      //         fillData () {
      //   this.datacollection = {
      //         labels: this.labels,
      //          data: [            
      //                 {
      //                     type: 'bar',
      //                     // label: 'Mat Org',
      //                     data: [this.AnalyseSoilLast.matOrgPer, this.AnalyseSoilLast.nitrogen],//this.soilDatas.map(list => {return list.humidade20;}),
      //                     // backgroundColor: '#f87979',
      //                     // borderColor: '#329932', 
      //                     // backgroundColor: 'transparent',

      //                 },
      //                 // {
      //                 //     type: 'bar',
      //                 //     label: 'Nitrogen',
      //                 //     data: this.AnalyseSoilLast.nitrogen,//this.soilDatas.map(list => {return list.humidade40;}),
      //                 //     //pointBackgroundColor: '#935116',
      //                 //     // borderColor:'#855321',
      //                 //     // backgroundColor: 'transparent',
      //                 // },
                
                      
      //             ],
      //   }
      // },

         
        },
        mounted () {
            console.log("Mounted LastSoilAnalysis");

 this.createChart('planet-chart', this.planetChartData);
            // this.fillData();
          }
      };
      </script>
      
      <style>
      </style>
      