<template>
  <div>
    
    <HeadContainer :title="title">
                
        <!-- <slot name="search"/> -->

    
    
      <template slot="search" >
  
        <b-col cols="auto" style="margin: 5px; margin-left: 20px">
          <h5>Search by :</h5>
        </b-col> 

        <b-col v-if="farms "cols="auto" style="margin: 5px">
          <b-row align-v="center" align-h="start">
            <b-col  cols="auto" class=" text-right">
              <h5>Farms :</h5>
            </b-col>
            <b-col cols="auto" class=" text-left" style="margin: 5px">
                <select  class="form-control" size="sm" id="selectfarm"  @change="cropsFilter" v-model="farm">
                  <option value>None</option>
                    <option v-for="item in farms" :value="item">{{item.name}}</option>
                </select>
            </b-col> 
          </b-row>
        </b-col >
    
        <b-col v-if="plants" cols="auto" style="margin: 5px">
          <b-row align-v="center" align-h="start">
            <b-col cols="auto" class="text-right">
              <h5>Plants :</h5>
            </b-col>
            <b-col  cols="auto" class=" text-left">
              <select class="form-control" size="sm" id="selectcultivo"  @change="cropsFilter" v-model="plant">
                  <option value>None</option>
                  <option v-for="itemC in plants" :value="itemC">{{itemC.name}} </option>
              </select>
              
            </b-col>
          </b-row>
        </b-col >
      
        <b-col style="text-align: right; margin-right: 5px">
          <b-button v-can="'terrain-create'" v-if="userSettings.mode"   @click="$router.push({name: 'terrainCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Add new Terrain</b-button>

        </b-col>
      </template>
      
    </HeadContainer>

    <BodyContainer  :title="title">

      <template slot="body">

        <b-row  cols="1" cols-sm="2" style="padding:10px;" align-h="around">

          <b-col v_if="terrenosSearch"  style=" border-radius: 4px; color: black; padding: 0px"  
                v-for="(t, index) in terrenosSearch"
                :style="t.style"
                :key="index">                    
                
            <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                      
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
                                <!-- <p>{{t.soil_data.textura}}</p> -->
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
                      <!-- <b-col > -->
                        <b-button   @click="goTodetail(t)" variant="light" class=" col"  style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                      <!-- </b-col> -->
                  </b-row>

                  <b-row v-can="'terrain-edit'" v-if="userSettings.mode" align-h="center" style="padding: 0px; margin: 5px">
                      <!-- <b-col > -->
                        <b-button    @click="editTerrainBtn(t)" variant="light" class=" col"  style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                      <!-- </b-col> -->
                  </b-row>

                  <b-row  v-can="'terrain-delete'" v-if="userSettings.mode" align-h="center" style="padding: 0px; margin: 5px">
                      <!-- <b-col  > -->
                        <b-button v-b-modal.my-modal-delete-terrain @click="confirmDelete(t)" variant="light"  block style=" border-color: #ff0000;color: #ff0000; margin: 5px">Delete</b-button>
                      <!-- </b-col> -->
                  </b-row>                             

                </b-col>

              </b-row>
          
          </b-col>

        
        <!-- <UiModal v-if="confirmModal" :terrainToDelete="toDelete" @update="closeModal"/> -->
      
        </b-row>                   

        <!-- <b-row v-if="!terrenosSearch" > -->
          <NoDataContainer v-if="!terrenosSearch || terrenosSearch.length==0" :title="title" > 
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
  import HeadContainer from "../../../wrapper/HeadContainer";
  import MainContainerUser from "../../../wrapper/MainContainerUser";
  import BodyContainer from "../../../wrapper/BodyContainer";
  import NoDataContainer from "../../../components/NoDataContainer";

import GoogleMapsApiLoader from 'google-maps-api-loader'
import MapLoaderOneTerrain from "../../../components/GoogleMaps/MapLoaderOneTerrain.vue"
  // import UiModal from "../../../components/UiModal";

  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  import {mapGetters,mapActions} from 'vuex'

import {TerrainService} from "../../../services/TerrainService"; 
import {PlantService} from "../../../services/PlantService"; 
  
  export default {
    name: "TerrainList",
    components: {
      MainContainerUser,
      HeadContainer,
      BodyContainer,
      NoDataContainer,
      MapLoaderOneTerrain
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
      return {        
            title: "Terrains",
            loading: false, 
            //   farms: null,
            terrain: null,
            create: false,
            terrenosSearch: null,
            confirmModal: false,
      };
    },
    watch: { 
      terrains: function(value) { // watch it
          console.log("watch store");
          // this.terrain = this.terrains[0];
          this.terrenosSearch = this.terrains; 
      }
    },
    computed : {
      ...mapGetters('terrain',['terrains']), 
      ...mapGetters('farm',['farms','farmSelected']),   
      ...mapGetters('auth',['userSettings']),   
      ...mapGetters('plant',['plants','plantSelected']),   
      farm: {
          get () {
            return this.farmSelected;
          },
          set (value) {
                if(value){
                  this.setFarmSelected(value);
                  // if(this.$route.params){
                  //       if(this.$route.params && this.$route.params.farmId != value.id ){
                  //             this.$router.push({name:'farmShow', params: { farmId: value.id } });
                  //       }
                  // }
                  
                }
          }
        },
         plant: {
          get () {
            return this.plantSelected;
          },
          set (value) {
                if(value){
                  this.setPlantSelected(value);
                  // if(this.$route.params){
                  //       if(this.$route.params && this.$route.params.farmId != value.id ){
                  //             this.$router.push({name:'farmShow', params: { farmId: value.id } });
                  //       }
                  // }
                  
                }
          }
        }
      },
    created() {
      // this.fetchData()
      
    },
    methods: {
      ...mapActions('terrain',['setTerrains','terrainsByFarm']),
      ...mapActions('farm',['setFarmSelected']),
      ...mapActions('plant',['setPlants','setPlantSelected']),
      
        cropsFilter() {
            console.log("cropsFilter function");
            //let result = oData;
            this.terrenosSearch = this.terrains;

            console.log("terrains :"+ JSON.stringify(this.terrenosSearch));
            if (this.farm) { // it can be null (optional)
              this.terrenosSearch = this.terrenosSearch.filter(t => t.farm_id === this.farm.id);
            }
            console.log("if (this.farm) :"+ JSON.stringify(this.terrenosSearch));
            if (this.plant) { // it can be null (optional)
              this.terrenosSearch = this.terrenosSearch.filter(t => t.cultivo.id_plant === this.plant.id);
            }
            console.log("if (this.plant) :"+ JSON.stringify(this.terrenosSearch));
            
            // return result;
          },
      // async fetchData () {

      //       this.loading = true
      //       try {
      //             const { data } = await TerrainService.getList();//this.fetchParams)
      //             this.setTerrains(data);
                  
      //             // this.pagination.total = data.total
      //       } catch (e) {
      //             // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
      //             this.error = e.message
      //             console.log(e)
      //       } finally {
      //             this.loading = false
      //       }

      // }
    },
    async mounted () {
      console.log("Mounted Terrain.vue");

        const googleMapApi = await GoogleMapsApiLoader({
            apiKey:  "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
          });
          this.google = googleMapApi;

          this.terrenosSearch = this.terrains; 
          console.log("------ terrains ------- : "+this.terrains);
      }
  };
  </script>
  
  <style>
  </style>
  