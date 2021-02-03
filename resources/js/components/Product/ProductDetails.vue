<template>

   <b-col sm="7" style=" padding: 10px" >
              
        <b-row  style=" background-color: #f8f9fa; margin: 0px">
                <b-col col-sm="1" >

                    <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >{{product.name}}</h4>
            
                    </b-row> 

                    <b-row style="padding: 10px" align-h="start" align-v="center">
                  
                         <b-col sm="6">
                            <h5 class="card-text">Brand:</h5>
                          </b-col>
                          <b-col sm="6">
                            <p class="card-text">{{product.brand}}</p>
                          </b-col>
                         
                    </b-row> 
 
                    <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">is_biologic:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{product.is_biologic}}</p>
                    </b-col>
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                        <h5 class="card-text">is_liquid:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{product.is_liquid}}</p>
                    </b-col>
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                          <b-col sm="6">
                        <h5 class="card-text">quantityL:</h5>
                      </b-col>
                      <b-col sm="6">
                        <p class="card-text">{{product.quantityL}}</p>
                    </b-col>
                      
                    </b-row>

                      <b-row style="padding: 10px">
                      
                            <b-col sm="6">
                          <h5 class="card-text">quantityKg :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.quantityKg}}</p>
                      </b-col>     
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">granulometry :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.granulometry}}</p>
                      </b-col>   
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">typeProduct_id :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.typeProduct_id}}</p>
                      </b-col>     
                      
                    </b-row>

                       <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">solubility :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.solubility}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">activeIngredients :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.activeIngredients}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">ph :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.ph}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">description :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.description}}</p>
                      </b-col>    
                      
                    </b-row>

                    <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">aplicationRates :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.aplicationRates}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">directionsForUse :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.directionsForUse}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">storage :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.storage}}</p>
                      </b-col>    
                      
                    </b-row>

                     <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">compatibility :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.compatibility}}</p>
                      </b-col>    
                      
                    </b-row>

                        <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">warnings :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.warnings}}</p>
                      </b-col>    
                      
                    </b-row>

                        <b-row style="padding: 10px">
                      
                           <b-col sm="6">
                          <h5 class="card-text">image :</h5>
                        </b-col>
                        <b-col sm="6">
                          <p class="card-text">{{product.image}}</p>
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
        name: "ProductDetails",
        components: {  
            // MapLoaderOneTerrain  
        },
        props: {
            product: { type: Object, default: null },
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
            console.log("Mounted ProductDetails");
          }
      };
      </script>
      
      <style>
      </style>
      