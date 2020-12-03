<template>
      <MainContainerUser>
            
              <HeadContainer :title="title">
                
                    <template slot="search" v-if="farms">
  
                          <b-col cols="auto" style="margin: 5px">
                                <b-row align-v="center" align-h="start">
                                  <b-col  cols="auto" class=" text-right">
                                    <h5>Farm :</h5>
                                  </b-col>
                                  <b-col cols="auto" class=" text-left" style="margin: 5px">
                                      <select v-if="farms" class="form-control" size="sm" id="selectfarm"  v-model="farm">
                                      <!-- <select v-if="farms" class="form-control" size="sm" id="selectfarm"  value="FARM_SELECTED" v-model="farm"> -->
                                        <option v-for="item in farms" :value="item">{{item.name}}</option>
                                      </select>
                                  </b-col>
                              
                                </b-row>
                              </b-col >
            
                        <b-col  style="text-align: right; margin-right: 5px" v-if="userSettings.mode" >
                              <b-button  @click="$router.push({name: 'farmCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
            
                        </b-col>
  
                    </template>
              </HeadContainer>
    
              <BodyContainer  :title="title">
  
                    
  
                    <template slot="body">
  
                         
                          <b-row  style="padding:10px;" >
  
                                <!-- <b-col sm="3"  style=" border-radius: 4px; color: black; " v-if="FARM_SELECTED && !get_farmAddForm">
                                       -->
                                <b-col sm="3"  style=" border-radius: 4px; color: black; " v-if="farm">
  
                                    <b-row  class="h-100 " style=" background-color: white;  padding: 10px">
                                  
                                        <b-col col-sm="1" >
                                            <b-row style="padding: 10px">
                                                <div class="d-flex justify-content-between">
                                                      <div>
                                                         <h4 style="margin-right: 10px" id="name" class="">{{farm.name}}</h4>
                                                      </div>
                                                 </div>
                                            </b-row>
            
                                            <b-row style="padding: 10px">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                       <h4 style="margin-right: 10px" id="localizacao" class="">{{farm.localizacao}}</h4>
                                                      </div>
                                                 </div>
                                            </b-row>
            
                                            <b-row style="padding: 10px">
                                                <div class="d-flex justify-content-between">
                                                      <div>
                                                          <h4 style="margin-right: 10px" id="areaTotal" class="">{{farm.areaTotal}} m<sup>2</sup></h4>                  
                                                      </div>
                                                 </div>
                                            </b-row>
            
                                            <b-row>
                                                <!-- <b-col  col-sm="1"  v-if="!get_farmAddForm && EDITMODE" >
                                                      <b-button  @click="change_AddFarmFormOpenToEdit" variant="light" block style=" border-color: #795427;color: #795427;margin-bottom: 10px">Edit Farm</b-button>
            
                                                </b-col>             -->
            
                                            </b-row>
            
                                            <b-row>
                                                 <b-col col-sm="1"  v-if=" userSettings.mode" >
                                                     <!-- <b-button v-b-modal.my-modal-delete-farm @click="confirmDelete(FARM_SELECTED)" variant="light" block  style=" border-color: #ff0000;color: #ff0000;margin-bottom: 10px">Delete</b-button> -->
                                                  
                                                </b-col>
                                            </b-row>
                                            
                                        </b-col>
                                    
                                    </b-row>
                                </b-col>
                          <!-- </b-row> -->
            
                                <!-- <b-row  style="margin: 10px; padding-top: 25px; "> -->
                              <!-- <b-col cols-sm="4"   > -->
                                    <!-- <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; "> -->
                                          <transition>
                                                <router-view></router-view>
                                          </transition>
                                    <!-- </b-container> -->
                              <!-- </b-col> -->
                              <!-- </b-row> -->
                               <!-- <b-col cols-sm="4"  v-if="get_farmAddForm" >
                                    <AddFarm  :edit="editFarm"/>                
                                </b-col> -->
            
            
                                <b-col col-sm="1" style="padding-right: 0px">
                                    
                                    <!-- <TerrainsOfFarm  v-if="farm && !addTerrain"/> -->
                                    <TerrainsOfFarm  :farm="farm" v-if="farm "/>
            
                                </b-col>
                            </b-row>
                            
                             <b-row v-if="!farms" >
                              <NoDataContainer :title="title" > 
                                     <slot >
                                          <b-button @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
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
    import TerrainsOfFarm from "../../../components/Farm/TerrainsOfFarm";
    // import Sidebar from '../../../components/menu/SidebarMenu.vue';
  
    import {mapGetters,mapMutations,mapActions} from 'vuex'
  
  import {FarmService} from "../../../services/FarmService"; 
    
    export default {
      name: "Farm",
      components: {
        MainContainerUser,
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        TerrainsOfFarm,
      },
      props: {
      //   title: { type: String, default: "without text" },
        
      },
      data() {
        return {        
              title: "Farms",
              loading: false, 
              //   farms: null,
              farm: null,
              create: false,
        };
      },
      watch: { 
        farms: function(value) { // watch it
            console.log("farm : "+this.farms[0]);
            this.farm = this.farms[0];
        }
      },
      computed : {
        ...mapGetters('farm',['farms']),   
        ...mapGetters('auth',['userSettings']),   
  
        },
      created() {
        this.fetchData()
      },
      methods: {
        ...mapActions('farm',['saveFarms']),
        
        async fetchData () {
  
              this.loading = true
              try {
                    const { data } = await FarmService.getList();//this.fetchParams)
                    this.saveFarms(data);
                    
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
        console.log("Mounted Farm.vue");
        }
    };
    </script>
    
    <style>
    </style>
    