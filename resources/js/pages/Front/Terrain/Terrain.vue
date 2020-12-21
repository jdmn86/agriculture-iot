<template>
  <div>
    
    <HeadContainer :title="title"/>
                
    <BodyContainer :loading.sync="loading">

 <template slot="topBody" >
  
        <b-col cols="auto" style="margin: 5px; margin-left: 20px">
          <h5>Search by :</h5>
        </b-col> 
 
        <b-col v-if="farms "cols="auto" style="margin: 5px">
          <!-- <b-row align-v="center" align-h="start"> -->
           <!--  <b-col  cols="auto" class=" text-right">
              <h5>Farms :</h5>
            </b-col>
            <b-col cols="auto" class=" text-left" style="margin: 5px"> -->


                <!-- <select  class="form-control" size="sm" id="selectfarm"  @change="cropsFilter" v-model="farmSelected">
                  <option value>None</option>
                    <option v-for="item in farms" :value="item">{{item.name}}</option>
                </select> -->
 <b-form-group id="input-group-farm" label="Farm" label-for="input-farm" >
                 <b-form-select 
                        style="margin-left: 10px"
                        id="input-farm"
                        name="input-farm"
                        v-model="farmSelected"
                         @change="cropsFilter">
                        <option :value="null" :selected="!farmSelected  ">None</option>
                        <option v-for="farm in farms" :selected="farmSelected == farm "
                            :key="farm.id"
                            :value="farm">
                            {{ farm.name }} 
                        </option>
                    </b-form-select> 
 </b-form-group>


            <!-- </b-col>  -->
          <!-- </b-row> -->
        </b-col >
    
        <b-col v-if="plants" cols="auto" style="margin: 5px">
      <!--     <b-row align-v="center" align-h="start">
            <b-col cols="auto" class="text-right">
              <h5>Plants :</h5>
            </b-col>
            <b-col  cols="auto" class=" text-left"> -->

             <!--  <select class="form-control" size="sm" id="selectcultivo"  @change="cropsFilter" v-model="plantSelected">
                  <option value>None</option>
                  <option v-for="itemC in plants" :value="itemC">{{itemC.name}} </option>
              </select> -->
    <b-form-group id="input-group-plant" label="Plant" label-for="input-plant" >
                  <b-form-select inline
                        style="margin-left: 10px"
                        id="input-plant"
                        name="input-plant"
                        v-model="plantSelected"
                         @change="cropsFilter">
                        <option  :value="null" :selected="!plantSelected">None</option>
                        <option v-for="plant in plants" :selected="plantSelected == plant "
                            :key="plant.id"
                            :value="plant">
                            {{ plant.name }} 
                        </option>
                    </b-form-select> 
    </b-form-group>  


        <!--     </b-col>
          </b-row> -->
        </b-col >
      
        <b-col style="text-align: right; margin-right: 5px">
          <b-button v-can="'terrain-create'" v-if="auth.mode"   @click="$router.push({name: 'terrainCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Add new Terrain</b-button>

        </b-col>
      </template>



       <template slot="body" >

<b-col  v-if="terrenosSearch.length">

        <b-row  cols="1" cols-sm="1" cols-md="1" cols-lg="2" style="padding:10px;" align-h="around">


          <b-col  style=" border-radius: 4px; color: black; padding: 0px"  
                v-for="(t, index) in terrenosSearch"
                :style="t.style"
                :key="index">                    
               




<TerrainDetails :terrain="t" :google="google">

      <template slot="mapa">
          <MapLoaderOneTerrain v-if="google" :terrain="t" :google="google"/>
      </template>

          <!--   <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                      
              <b-col sm="7" style="padding: 0px; ">
                  
                  <MapLoaderOneTerrain v-if="google" :terrain="t" :google="google"/>

              </b-col>

                <b-col sm="5" style="  padding: 0px">

                  <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                      
                        <h4>{{t.name}}</h4>
                    
                  </b-row>
                  
                  <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                      
                    <b-col v-if="t">
                      <div class="d-flex justify-content-between">
                            <div>
                                <h4>Area</h4>
                            </div>
                            <div>
                                <p>{{t.area}}</p>
                            </div>
                        </div>
                    </b-col>
              
                  </b-row> 

                   <b-row v-if="t.crop" align-h="center" style="padding: 0px; margin: 5px"> 
                      
                    <b-col v-if="t">
                      <div class="d-flex justify-content-between">
                            <div>
                                <h4>Cultivo</h4>
                            </div>
                            <div>
                                <p>{{t.crop.name}}</p>
                            </div>
                        </div>
                    </b-col>
              
                  </b-row> 

                  <b-row   align-h="center" style="padding: 0px; margin: 5px">
                      <b-col align-h="center"> -->

                        <template slot="crop">
                          <b-button   @click="goTodetail(t)" variant="light" block style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                        </template>

<!-- 
                      </b-col>
                  </b-row>

                  <b-row v-can="'terrain-edit'" v-if="auth.mode" align-h="center" style="padding: 0px; margin: 5px">
                      <b-col align-h="center"> -->

                        <template slot="edit" v-if="auth.mode" >
                            <b-button  @click="$router.push({name:'terrainEdit', params: { terrainId: t.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                        </template>

                     <!--  </b-col>
                  </b-row>

                  <b-row  v-can="'terrain-delete'" v-if="auth.mode" align-h="center" style="padding: 0px; margin: 5px"> -->
                    
                      <template slot="delete" v-if="auth.mode" >
                        <ModalToDelete  v-can="'terrain-delete'" :name="t.name"  >
                          <template slot="deleteButton">
                              <button type="button"  class="btn btn-danger" @click="onConfirmDelete(t)">Confirmar  </button>
                          </template>
                      </ModalToDelete>
                    </template>

                  <!-- </b-row>                             

                </b-col>

              </b-row> -->
</TerrainDetails>





          
          </b-col>
        
        </b-row>   

</b-col>

          <NoDataContainer v-else :title="title" > 
                <slot >
                    <b-button v-can="'terrain-create'" @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
              </slot> 
          </NoDataContainer>
        <!-- </b-row> -->
                        
                          
      </template> 
                 
       

    </BodyContainer>
            
  </div>

  </template>
  
  <script>
  import HeadContainer from "@/wrapper/HeadContainer";
  import BodyContainer from "@/wrapper/BodyContainer";
  import NoDataContainer from "@/components/NoDataContainer";
  import ModalToDelete from "@/components/ModalToDelete";
  import TerrainDetails from "@/components/Terrains/TerrainDetails";

import GoogleMapsApiLoader from 'google-maps-api-loader'
import MapLoaderOneTerrain from "@/components/GoogleMaps/MapLoaderOneTerrain.vue"

import {TerrainService} from "@/services/TerrainService"; 
import {PlantService} from "@/services/PlantService"; 
import {FarmService} from "@/services/FarmService"; 
  
  import Terrain from '@/models/Terrain'
  import Plant from '@/models/Plant'
import Farm from '@/models/Farm'
import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: "Terrain",
    components: {
      HeadContainer,
      BodyContainer,
      NoDataContainer,
      MapLoaderOneTerrain,
      ModalToDelete,
      TerrainDetails
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
      return {        
            title: "Terrains",
            loading: false,             

            terrenosSearch: [],
            farmSelected: null,
            plantSelected: null,
      };
    },
    // watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("watch store");
    //       this.terrenosSearch = this.terrains; 
    //   }
    // },
    computed : {
          farms(){
                return Farm.all() ;
           
            },
            terrains(){
              //tem de fazer refreash quando vem do edit terrain
              console.log("computed get terrains");
                return Terrain.all() ;
           
            },
            plants(){
                return Plant.all() ;
           
            },
            auth(){
                return Auth.query().first();
            },

      },
    async created() {

         const googleMapApi = await GoogleMapsApiLoader({
            apiKey:  "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
          });

        this.google = googleMapApi;

      this.fetchFarms().then(() => {
            this.fetchTerrains().then(() => {
                      this.fetchPlants().then(() => {
                            console.log("all fetch")
                            
                            this.cropsFilter();

                  });
            });
      });
      
    },
    methods: {
      
        cropsFilter() {
            console.log("cropsFilter function");
            //let result = oData;
            this.terrenosSearch = this.terrains;

            console.log("terrains :"+ JSON.stringify(this.terrenosSearch));
            if (this.farmSelected) { 
              this.terrenosSearch = this.terrenosSearch.filter(t => t.farm_id === this.farmSelected.id);
            }
            console.log("if (this.farm) :"+ JSON.stringify(this.terrenosSearch));
            if (this.plantSelected) { 
              this.terrenosSearch = this.terrenosSearch.filter(t => t.cultivo.id_plant === this.plantSelected.id);
            }
            console.log("if (this.plant) :"+ JSON.stringify(this.terrenosSearch));
            
            // return result;
          },

      async onConfirmDelete(terrainToDelete){

          console.log("on confirm Terrain");
          try {
            this.loading = true;
                  const { data } = await TerrainService.remove(terrainToDelete.id);
                   Terrain.delete(terrainToDelete.id);
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false

      
               
            }

      },     

      async fetchFarms () {

              this.loading = true
              try {
                    const { data } = await FarmService.getList();
                    Farm.insert({data: data});
              } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
              } finally {
                   this.loading = false
              }          


        },

        async fetchTerrains () {

               try {
                  const { data } = await TerrainService.getList();
                  Terrain.insert({data: data})
                  
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {
                  // this.loading = false
            }      


        },

        async fetchPlants () {

              try {
                const { data } = await PlantService.getList();
                Plant.insert({data: data})
                
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false
          }    


        },
    },
    async mounted () {
      console.log("Mounted Terrain.vue");

      //ir buscar do orm terrenos novos ou diferentes
        // this.terrains();

          // this.terrenosSearch = this.terrains; 
          // console.log("------ terrains ------- : "+this.terrains);
      }
  };
  </script>
  
  <style>
  </style>
  