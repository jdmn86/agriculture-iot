<template>

    <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 10px; background-color: white;">
                      
        <b-col sm="7" style="padding: 0px; ">
              
            <!-- <slot name="mapa"></slot> -->
              <MapLoaderOneTerrain v-if="google && terrain" :terrain="terrain" :google="google"/>

        </b-col>

        <b-col sm="5" style="  padding: 0px">

            <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                  
                <h4>{{terrain.name}}</h4>
                
            </b-row> 
              
            <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                  
                <b-col v-if="terrain">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Area</h4>
                        </div>
                        <div>
                            <p>{{terrain.area}}</p>
                        </div>
                     </div>
                </b-col>
          
            </b-row> 

            <b-row v-if="terrain.crop" align-h="center" style="padding: 0px; margin: 5px"> 
                  
                <b-col v-if="terrain">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Cultivo</h4>
                        </div>
                        <div>
                            <p>{{terrain.crop.name}}</p>
                        </div>
                    </div>
                </b-col>
          
            </b-row> 

            <b-row v-can="'crop-list'"  align-h="center" style="padding: 0px; margin: 5px">
                <b-col align-h="center">

                    <!-- <slot name="crop"></slot> -->
                    <b-button    variant="light" block style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
              
                </b-col>
            </b-row>

            <b-row v-can="'terrain-edit'" v-if="auth.mode"  align-h="center" style="padding: 0px; margin: 5px">
                <b-col align-h="center">

                    <!-- <slot name="edit"></slot> -->
                     <b-button  @click="$router.push({name:'terrainEdit', params: { terrainId: terrain.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
              
                </b-col>
            </b-row>

            <b-row  v-can="'terrain-delete'" align-h="center" style="padding: 0px; margin: 5px">

                <slot name="delete"></slot>
               
            </b-row>                             

        </b-col>

    </b-row>

</template>


<script>
import MapLoaderOneTerrain from "@/components/GoogleMaps/MapLoaderOneTerrain.vue"

import Auth from '@/models/Auth'
      export default {
        name: "TerrainDetails",
        components: {  
            MapLoaderOneTerrain  
        },
        props: {
            terrain: { type: Object, default: null },
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
            console.log("Mounted TerrainDetails");
          }
      };
      </script>
      
      <style>
      </style>
      