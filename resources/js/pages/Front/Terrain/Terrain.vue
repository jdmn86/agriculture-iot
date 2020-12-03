<template>
    <MainContainerUser>
          
            <HeadContainer :title="title">
              
                  <template slot="search" v-if="farms && plants">

                        
                      <b-col cols="auto" style="margin: 5px; margin-left: 20px">
                        <h5>Search by :</h5>
                    </b-col>

                <b-col cols="auto" style="margin: 5px">
                  <b-row align-v="center" align-h="start">
                    <b-col  cols="auto" class=" text-right">
                      <h5>Farms :</h5>
                    </b-col>
                    <b-col cols="auto" class=" text-left" style="margin: 5px">
                        <select v-if="farms" class="form-control" size="sm" id="selectfarm"  @change="cropsFilter" v-model="farm">
                          <option value>None</option>
                           <option v-for="item in farms" :value="item">{{item.name}}</option>
                        </select>
                    </b-col>
                  </b-row>
                </b-col >
            
                    <b-col cols="auto" style="margin: 5px">
                  <b-row align-v="center" align-h="start">
                    <b-col cols="auto" class="text-right">
                      <h5>Plants :</h5>
                    </b-col>
                    <b-col  cols="auto" class=" text-left">
                     <select v-if="plants" class="form-control" size="sm" id="selectcultivo"  @change="cropsFilter" v-model="plant">
                          <option value>None</option>
                          <option v-for="itemC in plants" :value="itemC">{{itemC.name}} </option>
                      </select>
                     
                    </b-col>
                  </b-row>
                </b-col >
              
              <b-col style="text-align: right; margin-right: 5px">
                <b-button v-if="EDITMODE"   @click="$router.push({name: 'terrainCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin-bottom: 10px">Add new Terrain</b-button>

              </b-col>

                  </template>
            </HeadContainer>
  
            <BodyContainer  :title="title">

                  

                  <template slot="body">

                    <b-row   style="padding:10px;" >

                        <b-col v_if="terrenosSearch" sm="4"  style=" border-radius: 4px; color: black; padding: 0px"  
                            v-for="(t, index) in terrenosSearch"
                            :style="t.style"
                            :key="index">                    
                            <!-- v-on:click="select($event, t,index)" > -->
         
                            
                            <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                                 
                                  <b-col sm="7" style="padding: 0px; ">
                              
                                      <map-loader-list-component v-if="google" :terrain="t" :google="google"/>
                                  </b-col>
        
                                  <b-col sm="4" style="  padding: 0px">
        
                                    <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                                        
                                          <h3>{{t.name}}</h3>
                                      
                                    </b-row>
                                    
                                    <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                                       
        
                                        <b-col v-if="t">
                                            <div class="d-flex justify-content-between">
                                                  <div>
                                                      <h5>Area</h5>
                                                  </div>
                                                  <div>
                                                      <p>{{t.area}}</p>
                                                      <!-- <p>{{t.soil_data.textura}}</p> -->
                                                  </div>
                                             </div>
                                        </b-col>
                               
                                    </b-row> 
        
                                    <b-row   align-h="center" style="padding: 0px; margin: 5px">
                                        <!-- <b-col > -->
                                            <b-button   @click="goTodetail(t)" variant="light" class=" col"  style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                                        <!-- </b-col> -->
                                     </b-row>
                                     <b-row v-if="EDITMODE" align-h="center" style="padding: 0px; margin: 5px">
                                       <!-- <b-col > -->
                                            <b-button    @click="editTerrainBtn(t)" variant="light" class=" col"  style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                                        <!-- </b-col> -->
                                      </b-row>
        
                             
                                    <b-row  v-if="EDITMODE" align-h="center" style="padding: 0px; margin: 5px">
                                        <!-- <b-col  > -->
                                            <b-button v-b-modal.my-modal-delete-terrain @click="confirmDelete(t)" variant="light"  block style=" border-color: #ff0000;color: #ff0000; margin: 5px">Delete</b-button>
                                            
                                        <!-- </b-col> -->
                                    </b-row>                             
        
                                  </b-col>
                                  

        
                            </b-row>
                          <!-- </div> -->
                     
                      </b-col>

                      <transition>
                        <router-view></router-view>
                  </transition>
        
        <UiModal v-if="confirmModal" :terrainToDelete="toDelete" @update="closeModal"/>
        
      
        </b-row>                          
                           <b-row v-if="!terrenosSearch" >
                            <NoDataContainer :title="title" > 
                                   <slot >
                                        <b-button @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrains</b-button>
                                  </slot> 
                             </NoDataContainer>
                          </b-row>
                        
                          
                  </template> 
                 
       

            </BodyContainer>
            
  </MainContainerUser>

  </template>
  
  <script>
  import HeadContainer from "../../../wrapper/HeadContainer";
  import MainContainerUser from "../../../wrapper/MainContainerUser";
  import BodyContainer from "../../../wrapper/BodyContainer";
  import NoDataContainer from "../../../components/NoDataContainer";

  import UiModal from "../../../components/UiModal";

  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  import {mapGetters,mapMutations,mapActions} from 'vuex'

import {TerrainService} from "../../../services/TerrainService"; 
  
  export default {
    name: "Terrain",
    components: {
      MainContainerUser,
      HeadContainer,
      BodyContainer,
      NoDataContainer,
      
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
          console.log("terrain : "+this.terrains[0]);
          this.terrain = this.terrains[0];
      }
    },
    computed : {
      ...mapGetters('terrain',['terrains']), 
      ...mapGetters('farm',['farms']),   
      ...mapGetters('auth',['userSettings']),   

      },
    created() {
      this.fetchData()
    },
    methods: {
      ...mapActions('terrain',['saveTerrains','terrainsByFarm']),
      
      async fetchData () {

            this.loading = true
            try {
                  const { data } = await TerrainService.getList();//this.fetchParams)
                  this.saveTerrains(data);
                  
                  // this.pagination.total = data.total
            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
                  this.loading = false
            }

      }
    },
    mounted () {
      console.log("Mounted Terrain.vue");
      }
  };
  </script>
  
  <style>
  </style>
  