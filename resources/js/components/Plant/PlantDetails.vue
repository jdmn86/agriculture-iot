<template>

    <b-col sm="8" style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" >

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >{{plant.name}}</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">Cientific name:</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{plant.name_cientifico}}</p>
                          </b-col>
                         
                    </b-row> 
 
                    <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">Tipo de planta:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{plant.plantType.name}}</p>
                    </b-col>
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                        <h5 class="card-text">ph min:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{plant.ph_min}}</p>
                    </b-col>
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">ph max:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{plant.ph_max}}</p>
                    </b-col>
                      
                    </b-row>

                      <b-row style="padding: 10px">
                      
                            <b-col sm="6">
                          <h5 class="card-text">Compasso Plantas :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{plant.compasso_plantas}}</p>
                      </b-col>     
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Compasso Linhas :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{plant.compasso_linhas}}</p>
                      </b-col>   
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Fotoperiodo :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{plant.fotoperiodo}}</p>
                      </b-col>     
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Water consumption :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{plant.water_consumption}}</p>
                      </b-col>    
                      
                    </b-row>


                   <!--  <b-row >

                        <b-col align-h="center">
                            <b-button   @click="$router.push({name:'farmShow', params: { farmId: farm.id } })" variant="light" block style=" border-color: #1088c4;color: #1088c4; margin: 5px">Show Farm</b-button>

                        </b-col>
                      
                    </b-row> -->

                  <b-row >
                
                        <b-col align-h="center" v-if="auth.mode">
                            <b-button  v-can="'variety-edit'" @click="$router.push({name:'varietyEdit', params: { plantId: plant.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Farm</b-button>
                        </b-col>
                      
                    </b-row>

                    <b-row >
                        <slot name="delete"></slot>
                       
                    </b-row> 

                </b-col>

            </b-row>




        


                <!-- <b-row style="margin: 10px"> 
                      <b-button v-can="'crop-create'" v-if=" !isFormAddCrop"   @click="createCrop(plant)"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Create crop </b-button>
               </b-row> -->

            </b-col>
</template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'

      export default {
        name: "PlantDetails",
        components: {  
          // TerrainsOfFarm  
        },
        props: {
            plant: { type: Object, default: null },
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
             console.log("created PlantDetails");
        },
        methods: {
      
        },
        mounted () {
            console.log("Mounted PlantDetails");
          }
      };
      </script>
      
      <style>
      </style>
      