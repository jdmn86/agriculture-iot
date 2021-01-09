<template>

    <b-row v-if="google && farm" align-h="around"   style="margin: 10px; background-color: #f8f9fa; ">

        <b-col sm="5"  style=" padding: 0px; " >

            <b-row  style="  margin: 0px">
                <b-col col-sm="1" >

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >{{farm.name}}</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                            <h4 style="margin: 5px" id="localizacao" class="">{{farm.localizacao}}</h4>
                         
                    </b-row> 
 
                    <b-row style="padding: 10px">
                      
                        <h4 style="margin: 5px" id="areaTotal" class="">{{farm.areaTotal}} m<sup>2</sup></h4>
                      
                    </b-row>

                    <b-row >

                        <!-- <slot name="edit"></slot> -->
                        <b-col align-h="center">
                            <b-button   @click="$router.push({name:'farmShow', params: { farmId: farm.id } })" variant="light" block style=" border-color: #1088c4;color: #1088c4; margin: 5px">Show Farm</b-button>
                             
                        <!--      <router-link :to="{ name: 'farmShow', params: { farmId: farm.id } }" tag="button">Show Farm</router-link> -->

                        </b-col>
                      
                    </b-row>

                    <b-row >
                
                        <!-- <slot name="edit"></slot> -->
                        <b-col align-h="center" v-if="auth.mode">
                            <b-button  v-can="'farm-edit'" @click="$router.push({name:'farmEdit', params: { farmId: farm.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Farm</b-button>
                        </b-col>
                      
                    </b-row>

                    <b-row >
                        <slot name="delete"></slot>
                       
                    </b-row>

                </b-col>

            </b-row>
        </b-col>

        <b-col sm="7" style="padding: 0px">
            <TerrainsOfFarm :google="google" :terrains="farm.terrains"  /> 
        </b-col>

    </b-row >
</template>


<script>

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'

      export default {
        name: "FarmDetails",
        components: {  
          TerrainsOfFarm  
        },
        props: {
            farm: { type: Object, default: null },
            google: { type: Object, default: null },

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
      
        },
        mounted () {
            console.log("Mounted FarmDetails");
          }
      };
      </script>
      
      <style>
      </style>
      