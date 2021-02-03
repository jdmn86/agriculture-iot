<template>

    <b-col sm="8" style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" > 

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >Chart</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">Chart</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">Chart</p>
                          </b-col>
                         
                    </b-row> 
 
                    <b-row style="padding: 10px">
                      
                       <div class="container" >
                            <div v-if="loaded && isData"  class="Chart__content">
                              
                              <LineChart :chart-data="downloads" :chart-labels="labels"></LineChart>
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

                    <!--  <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                        <h5 class="card-text">cause</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{plague.cause}}</p>
                    </b-col>
                      
                    </b-row> -->

                    

                </b-col>

            </b-row>


            </b-col>
</template>


<script>

import LineChart from "@/components/LineChart";

import Auth from '@/models/Auth'
import AirData from '@/models/AirData'

import  $bus   from '@/app';

      export default {
        name: "ChartWeather",
        components: {  
           LineChart,
        },
        props: {
             crop: { type: Object, default: null } ,  
            // google: { type: Object, default: null },

        },
        data() {
          return {        
              loaded: false,
              isData: false,
              labels: [], 
            downloads: [ {
                label: 'Humidade', 
                borderColor: '#249EBF',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#249EBF',
                backgroundColor: 'transparent',
                data: []
              }, {
                label: 'Temperatura',
                borderColor: '#FF0000',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#FF0000',
                backgroundColor: 'transparent',
                data: []
              }, {
                label: 'heat Index',
                borderColor: '#ffa500',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#ffa500',
                backgroundColor: 'transparent',
                data: []
              }, {
                label: 'Dew Point',
                borderColor: '#6699cc',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#6699cc',
                backgroundColor: 'transparent',
                data: []
              }, {
                label: 'DPO',
                borderColor: '#fc0377',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#fc0377',
                backgroundColor: 'transparent',
                data: []
              }, {
                label: 'precipitation',
                borderColor: '#03f8fc',
                pointBackgroundColor: 'white',
                borderWidth: 1,
                pointBorderColor: '#03f8fc',
                backgroundColor: 'transparent',
                data: []
              }],
              // options: {
              //   responsive: true,
              //   maintainAspectRatio: false
              //}
            
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            airData(){
                return AirData.query().where('crop_id',this.crop.id).get();  
                // return DailyWeather.query().where('id_farm',this.crop.terrain.farm_id).where((d) => {
                //      return new Date(d.date) > this.date
                //     }).orderBy('id', 'desc').limit(6).get();  
                
            },

          },
        async created() {
            this.loaded = false;
            await this.fetch();
           
             console.log("created ChartWeather");
        },
        methods: {
            requestData () {
               // this.loaded = false;
          //const { userlist } = await fetch('/api/userlist')
          // axios.defaults.headers.common['Authorization'] =`Bearer ${ localStorage.getItem('token')}`;
               

                var vm=this;   
 // axios.get('https://sadalab.com/api/dataAir/deviceData/'+this.$props.device_id)
 //  .then((response)=>{
              
              // console.log("response.data"+JSON.stringify(response.data));
              // console.log(response.data.find(o => o.sensor_type_id === 1));
               
   // let allAir = JSON.stringify(response.data);
   //  allAir=JSON.parse(allAir);

              if(this.airData.length){
                              
                  console.log("airData"+this.airData);

                  this.airData.forEach(function(a) { 

    console.log("a : "+JSON.stringify(a));
    console.log("labels : "+JSON.stringify(vm.labels));

                      vm.labels.push(a.date);
                      vm.downloads[0].data.push(a.humidity);
                      vm.downloads[1].data.push(a.temp);
                      vm.downloads[2].data.push(a.heat_index);
                      vm.downloads[3].data.push(a.dew_point);
                      // vm.downloads[4].data.push(a.dpo);
                      vm.downloads[5].data.push(a.precipitation);                  
                  });

                  this.isData = true;
                  this.loaded = true;
              }

          
          //     })
          //     .catch (err => {
          //       console.error(err)
          //     });

          },
           async fetch(){
            this.loading = true

            try {

                await AirData.api().get('airData/crop/'+this.crop.id);

                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
              console.log("next is requestData");
                this.requestData();
                this.loading = false
            }     

        },
      
        },
        async mounted () {
            console.log("Mounted ChartWeather");
         
          }
      };
      </script>
      
      <style>
      </style>
      