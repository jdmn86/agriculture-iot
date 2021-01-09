<template>

   <b-col sm="5" style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" >

                  <!--   <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >{{composition.nitrogenTotal}}</h4>
            
                    </b-row>  -->

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">nitrogenTotal:</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{composition.nitrogenTotal}}</p>
                          </b-col>
                         
                    </b-row> 
 
                    <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">nitrateNitrogen:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{composition.nitrateNitrogen}}</p>
                    </b-col>
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                        <h5 class="card-text">amoniacalNitrogen:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{composition.amoniacalNitrogen}}</p>
                    </b-col>
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">otherNitrogen:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{composition.otherNitrogen}}</p>
                    </b-col>
                      
                    </b-row>

                      <b-row style="padding: 10px">
                      
                            <b-col sm="6">
                          <h5 class="card-text">P2O5 :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.P2O5}}</p>
                      </b-col>     
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">K2O :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.K2O}}</p>
                      </b-col>   
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">CaO :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.CaO}}</p>
                      </b-col>     
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">MgO :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.MgO}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">SO3 :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.SO3}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Ca :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Ca}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">B :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.B}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Cu :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Cu}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Fe :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Fe}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Mn :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Mn}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Mo :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Mo}}</p>
                      </b-col>    
                      
                    </b-row>

                        <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">Zn :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.Zn}}</p>
                      </b-col>    
                      
                    </b-row>

                        <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">OrganicMatter :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{composition.OrganicMatter}}</p>
                      </b-col>    
                      
                    </b-row>


                   <!--  <b-row >

                        <b-col align-h="center">
                            <b-button   @click="$router.push({name:'farmShow', params: { farmId: farm.id } })" variant="light" block style=" border-color: #1088c4;color: #1088c4; margin: 5px">Show Farm</b-button>

                        </b-col>
                      
                    </b-row> -->

                  <b-row >
                
                        <b-col align-h="center" v-if="auth.mode">
                            <b-button  v-can="'product-edit'" @click="$router.push({name:'productEdit', params: { productId: product.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Product</b-button>
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
// import MapLoaderOneTerrain from "@/components/GoogleMaps/MapLoaderOneTerrain.vue"

import Auth from '@/models/Auth'
      export default {
        name: "ProductComposition",
        components: {  
            // MapLoaderOneTerrain  
        },
        props: {
            composition: { type: Object, default: null },
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
      
        },
        mounted () {
            console.log("Mounted ProductComposition");
          }
      };
      </script>
      
      <style>
      </style>
      