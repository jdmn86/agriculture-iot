<template>
    <MainContainerUser>
          
            <!-- <HeadContainer :title="title">
                  <template slot="search" >
                  </template>
            </HeadContainer> -->
  
        <BodyContainer  :title="title">

                  

            <template slot="body">

                <b-row   style="padding:10px;" >

                    <b-col style="padding: 15px; ">
                        <nav>
                          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
      
                            <a v-if="plantTypes" v-for="t in plantTypes" :key="t.id" class="nav-item nav-link"  data-toggle="tab"  role="tab"  aria-selected="false" v-on:click="typePlantsFilter(t.id)" v-bind:class="[ tipoPlantaId === t.id ? 'show active' : ' ' ]">{{t.name}}</a>
      
                            <!-- <a class="nav-item nav-link"  data-toggle="tab" href="#nav-Fruticulas" role="tab" aria-controls="nav-Fruticulas" aria-selected="false" v-on:click="tipoPlantaId=2" v-bind:class="[ tipoPlantaId === 2 ? 'show active' : ' ' ]">Fruticulas</a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#nav-Viticultura" role="tab" aria-controls="nav-Viticultura" aria-selected="false" v-on:click="tipoPlantaId=3" v-bind:class="[ tipoPlantaId === 3 ? 'show active' : ' ' ]">Viticultura</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-Olivicolas" role="tab" aria-controls="nav-Olivicolas" aria-selected="false" v-on:click="tipoPlantaId=4" v-bind:class="[ tipoPlantaId === 4 ? 'show active' : ' ' ]">Olivicolas</a>     -->                
                          </div>
                        </nav>
                        <div class="tab-content px-3 px-sm-0" id="nav-tabContent" style="background-color: #f8f9fa; padding-top: 15px">
                          
                          <div class="tab-pane fade show active" id="nav-Horticulas" role="tabpanel" >
                            <div class="row"  style="padding:10px;">
                                <!-- <ShowPlant :plantId="p.id"/> -->
      
      
                                <b-col sm="3" style="padding: 0px" v-if="plantsFilter" v-for="p in plantsFilter" :key="p.id">
                                    <div class="card card-flip " style="margin: 5px; height: 180px;">
                                        <div class="card-front text-white ">
                                            
                                            <b-img :src="p.image" style="height: 180px" fluid-grow alt="tomato"  />
                                            
                                            <p style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">{{p.name}}</p>
      
                                             <p style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">{{p.nome_variedade}}</p>
      
                                        </div>
                                        <div class="card-back bg-white">
                                            <div class="card-body " style="padding: 5px; color: #327927">
                                               <b-row>
                                                
                                                <b-col>                                                                            
                                                  <b-row align-h="center" align-v="center" style="margin: 5px">
                                                    <b-col sm="6">
                                                      <h6 class="card-text">name cientifico</h6>
                                                    </b-col>
                                                    <b-col sm="6">
                                                      <p class="card-text">{{p.name_cientifico}}</p>
                                                    </b-col>
                                                  </b-row>
      
                                                  <b-row  v-if="p.user_id" align-h="center" align-v="center" style="margin: 5px">
                                                    <b-col sm="6">
                                                      <h6 class="card-text">mine :</h6>
                                                    </b-col>
                                                    <b-col sm="6">
                                                      <p class="card-text">{{p.user_id}}</p>
                                                    </b-col>
                                                  </b-row>
      
                                                  <b-row align-h="center" ><!-- style="margin: 5px"> -->
                                                    <b-col sm="7">
                                                      <b-button @click="goTodetail(p.id)" variant="outline-light" block style=" border-color: #327927;color: #327927; ">Plant Details</b-button>  
                                                     </b-col>
                                                   </b-row> 
      
      
                                                </b-col>
      
                                              </b-row>
      
                                             </div>
                                                
                                            </div>
                                      </div>
                                    </b-col>
                                </div>
                            </div>
      
      
                          </div>
                          
                        </div>
                      
                      </b-col>
    

                    <!-- <transition>
                        <router-view></router-view>
                    </transition> -->
            
                    <!-- <UiModal v-if="confirmModal" :terrainToDelete="toDelete" @update="closeModal"/> -->
                
            
                </b-row>   

                <!-- <b-row v-if="!terrenosSearch" >
                    <NoDataContainer :title="title" > 
                        <slot >
                            <b-button @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrains</b-button>
                        </slot> 
                    </NoDataContainer>
                </b-row> -->
                        
                          
            </template> 
                 
       

        </BodyContainer>
            
  </MainContainerUser>

  </template>
  
  <script>
  import HeadContainer from "../../../wrapper/HeadContainer";
  import MainContainerUser from "../../../wrapper/MainContainerUser";
  import BodyContainer from "../../../wrapper/BodyContainer";
//   import NoDataContainer from "../../../components/NoDataContainer";

  // import UiModal from "../../../components/UiModal";

  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  import {mapGetters,mapMutations,mapActions} from 'vuex'

import {PlantService} from "../../../services/PlantService"; 
  import {PlantTypeService} from "../../../services/PlantTypeService"; 

  export default {
    name: "Plant",
    components: {
      MainContainerUser,
      HeadContainer,
      BodyContainer,
    //   NoDataContainer,
      
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
      return {        
            title: "Plants",
            loading: false, 
            plantsFilter: null,
            tipoPlantaId: null,

            
      };
    },
    watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("terrain : "+this.terrains[0]);
    //       this.terrain = this.terrains[0];
    //   }
    },
    computed : {
      ...mapGetters('plant',['plants','masterPlants']), 
       ...mapGetters('plantType',['plantTypes']),   
    //   ...mapGetters('auth',['userSettings']),   

      },
    created() {
      this.fetchData()
    },
    methods: {
      ...mapActions('plant',['savePlants']),
      ...mapActions('plantType',['savePlantTypes']),
      typePlantsFilter(id) {
                  this.tipoPlantaId=id;
                console.log("typePlantsFilter function");
                //let result = oData;
                this.plantsFilter = this.masterPlants;
                console.log("plants :"+ JSON.stringify(this.masterPlants));
                if (this.tipoPlantaId) { // it can be null (optional)
                  this.plantsFilter = this.plantsFilter.filter(p => p.tipo_planta_id === id);
                }
            },
        goTodetail(prodId) {
            this.$router.push({name:'PlantDetail',params:{Pid:prodId}})
            },
      async fetchData () {

            this.loading = true 

            try {
                  const { data } = await PlantTypeService.getList();//this.fetchParams)
                  console.log("PlantTypeService : "+JSON.stringify(data));
                  this.savePlantTypes(data);
                  // this.pagination.total = data.total
            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
                  this.loading = false
            }

            try {
                  const { data } = await PlantService.getList();//this.fetchParams)
                  this.savePlants(data);
                  this.typePlantsFilter(1);
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
      console.log("Mounted Plant.vue");
      }
  };
  </script>
  
  <style>
  nav > .nav.nav-tabs{
    
    border: none;
      color:#fff;
      background:#28a745;
      border-radius:0;
  
  }
  nav > div a.nav-item.nav-link,
  nav > div a.nav-item.nav-link.active
  {
    border: none;
      padding: 18px 25px;
      color:#fff;
      background:#28a745;
      border-radius:0;
  }
  
  nav > div a.nav-item.nav-link.active:after
   {
    content: "";
    position: relative;
    bottom: -60px;
    left: -10%;
    border: 15px solid transparent;
    border-top-color: #832E00 ;
  }
  .tab-content{
    background: #fdfdfd;
      line-height: 25px;
      /*border: 1px solid #ddd;*/
      border-top:5px solid #832E00;
      /*border-bottom:5px solid #832E00;*/
      /*padding:30px 25px;*/
  }
  
  nav > div a.nav-item.nav-link:hover,
  nav > div a.nav-item.nav-link:focus
  {
    border: none;
      background: #832E00;
      color:#fff;
      border-radius:0;
      transition:background 0.20s linear;
  }
  
  .card-flip > div {
    backface-visibility: hidden;
    transition: transform 300ms;
    transition-timing-function: linear;
    width: 100%;
    height: 100%;
    margin: 0;
    display: flex;
  }
  
  .card-front {
    transform: rotateY(0deg);
  }
  
  .card-back {
    transform: rotateY(180deg);
    position: absolute;
    top: 0;
  }
  
  .card-flip:hover .card-front {
    transform: rotateY(-180deg);
  }
    
  .card-flip:hover .card-back {
    transform: rotateY(0deg);
  }
  </style>
  