<template>

<!--     <b-row v-if="device" align-h="around"   style="margin: 10px; background-color: #f8f9fa; "> -->

        <!-- <b-col sm="4"  style=" padding: 0px; " > -->

            <b-row  style="  margin: 0px; padding: 10px">

                <b-col  style="padding: 0px; background-color: #f8f9fa;">

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; margin: 0px" class="text-white ">
                        <h4 >{{device.ref}}</h4>
            
                    </b-row> 

                    <b-row v-if="device.deviceType" style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                         <b-col sm="6">
                            <h5 class="card-text">device type :</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{device.deviceType.name}}</p>
                          </b-col>
                      <!--   <h4 style="margin: 5px" id="localizacao" class="">{{device.localizacao}}</h4> -->
                         
                    </b-row> 
 
                    <b-row  style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                        <b-col sm="6">
                            <h5 class="card-text">localização :</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{device.lat}},{{device.lng}}</p>
                          </b-col>
                      
                   <!--      <h4 style="margin: 5px" id="deviceType" class="">{{device.deviceType.name}} </h4> -->
                      
                    </b-row>

             <!--         <b-row style="padding: 10px" align-h="center" align-v="center">
                      
                        <h4 style="margin: 5px" id="coordenadas" class="">{{device.lat}},{{device.lng}} </h4>
                      
                    </b-row> -->

                       <b-row style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                             <b-col sm="6">
                            <h5 class="card-text">uptime :</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{device.uptime}}</p>
                          </b-col>
                      <!--   <h4 style="margin: 5px" id="coordenadas" class="">{{device.uptime}} </h4> -->
                      
                    </b-row>

                      <b-row style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                             <b-col sm="6">
                            <h5 class="card-text">battery :</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{device.battery_status}} %</p>
                          </b-col>
                   <!--      <h4 style="margin: 5px" id="coordenadas" class="">{{device.battery_status}} </h4> -->
                      
                    </b-row>

                      <b-row style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                             <b-col sm="6">
                            <h5 class="card-text">Number of reades :</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{device.num_reads}}</p>
                          </b-col>
                <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
                      
                    </b-row>

                     <b-row style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                             <b-col sm="6">
                            <h5 class="card-text">Enabled :</h5>
                          </b-col>
                          <b-col sm="6">
                            <b-form-checkbox v-model="device.enabled" @change="enabledDevice"name="check-button" switch>
                                   
                                </b-form-checkbox>
                          </b-col>
                <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
                      
                    </b-row>

                   <!--    <b-row style="padding: 10px" align-h="center" align-v="center">
                      
                        <h4 style="margin: 5px" id="coordenadas" class="">{{device.enabled}} </h4>
                      
                    </b-row> -->

                    

                   <!--  <b-row >

                        <b-col align-h="center">
                            <b-button   @click="$router.push({name:'farmShow', params: { farmId: farm.id } })" variant="light" block style=" border-color: #1088c4;color: #1088c4; margin: 5px">Show Farm</b-button>                             
                        </b-col>
                      
                    </b-row> -->

                     <!--  <b-row style="padding: 10px; margin: 0px" align-h="center" align-v="center">
                
                        <b-col align-h="center" v-if="auth.mode">
                            <b-button  v-can="'device-edit'" @click="$router.push({name:'deviceEdit', params: { deviceId: device.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Device</b-button>
                        </b-col>
                      
                    </b-row> -->

                    <b-row style="padding: 10px; margin: 0px" >
                        <slot name="delete"></slot>
                       
                    </b-row>

                </b-col>

            </b-row>
        <!-- </b-col> -->

        <!-- <b-col sm="7" style="padding: 0px">
            <TerrainsOfFarm :google="google" :terrains="farm.terrains"  /> 
        </b-col> -->

    <!-- </b-row > -->
</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Device from '@/models/Device'

      export default {
        name: "DeviceDetails",
        components: {  
          // TerrainsOfFarm  
        },
        props: {
            device: { type: Object, default: null },
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
            enabledDevice(){
                 console.log("on confirm DeviceList");
                   try {
                    // this.loading = true;
                    // const { data } = await TerrainService.update(this.terrain.id,this.terrain);
                    
                    //  Terrain.update({where: data.id,data: {data}});
                    Device.api().patch('device/'+this.device.id+'/enabledBlock',this.device)

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
            console.log("Mounted DeviceDetails");
          }
      };
      </script>
      
      <style>
      </style>
      