<template>
    
  <MainContainerUser>
            
    <HeadContainer :title="title">
      
          <template slot="search" v-if="get_farms && get_plants">

            <b-col cols="auto" style="margin: 5px; margin-left: 20px">
              <h5>Search by :</h5>
          </b-col>
                
          <b-col cols="auto" style="margin: 5px">
            <b-row align-v="center" align-h="start">
              <b-col  cols="auto" class=" text-right"> 
                <h5>Farms :</h5>
              </b-col>
              <b-col cols="auto" class=" text-left" style="margin: 5px">
                  <select v-if="get_farms" class="form-control" size="sm" id="selectfarm" @change="cropsFilter"   v-model="farm">
                    <option value>None</option>
                     <option v-for="item in get_farms" :value="item" :key="item.id">{{item.name}}</option>
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
                 <select v-if="get_plants" class="form-control" size="sm" id="selectcultivo"   @change="cropsFilter" v-model="plant">
                      <option value>None</option>
                      <option v-for="itemC in get_plants" :value="itemC" :key="itemC.id">{{itemC.name}} </option>
                  </select>
                 
                </b-col>
              </b-row>
            </b-col >

            <b-col   cols="auto" style="margin: 5px">
              <b-row align-v="center" align-h="start">
                <b-col cols="auto" class="text-right">
                  <h5>Crop state :</h5>
                </b-col>
                <b-col  cols="auto" class=" text-left">
                 <!-- <select class="form-control" size="sm" id="selectFasesCultivo"  @change="cropsFilter" v-model="stagePlant">
                      <option value>None</option>
                      <option v-if="get_fasesCultivo" v-for="itemf in get_fasesCultivo" :value="itemf">{{itemf.GrowthStageName}} </option>
                  </select> -->
                 
                </b-col>
              </b-row>
            </b-col >
  
              <!-- <b-col  style="text-align: right; margin-right: 5px" v-if="userSettings.mode" >
                    <b-button  @click="$router.push({name: 'farmCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
  
              </b-col> -->

          </template>
    </HeadContainer>

    <BodyContainer  :title="title">

          

          <template slot="body">

               
                <!-- <b-row  style="padding:10px;" > -->

                  <b-col sm="3"  style=" border-radius: 4px; color: black; padding: 0px"  
                  v-for="p in crops" :key="p.id">   

                <div class="card card-flip h-100" style="margin: 5px; ">
                    <div class="card-front text-white" style="color: #327927; ">
                        <!-- <div class="card-body" style="padding: 0"> -->
                            <!-- <div class="row">
                                <div class="col"> -->
                                  <!-- <div style="position: relative; text-align: center;"> -->
                                    <b-img src="/img/tomato.jpeg" fluid-grow alt="tomato"  />

                                    <h4 class="font-weight-bolder" style="position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);">{{p.terrain.farm.name}}</h4>

                                    <h4 class="font-weight-bolder" style="position: absolute; top: 45%; left: 50%; transform: translate(-50%, -50%);">{{p.terrain.name}}</h4>


                                    <h3  style="position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%);">{{p.plant.name}}</h3>

                                  <!-- </div> -->
                                  
                                 <!--  </div>
                                </div> -->
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    <div class="card-back bg-white" > <!-- style="padding: 15px"> -->
                        <div class="card-body " style="padding: 5px; color: #327927">
                            <b-row>
                                <b-col>                                  
                                <b-row  align-h="center" align-v="center" style="margin: 5px">
                                  <b-col sm="6">
                                    <h6 class="card-text">Date Start</h6>
                                  </b-col>
                                  <b-col sm="6">
                                    <p class="card-text">{{p.start_crop_date}}</p>
                                  </b-col>
                                </b-row>
                                <b-row align-h="center" align-v="center" style="margin: 5px">
                                  <b-col sm="6">
                                    <h6 class="card-text">Crop Day</h6>
                                  </b-col>
                                  <b-col sm="6">
                                    <p class="card-text">{{p.crop_day}}</p>
                                  </b-col>
                                </b-row>
                                <b-row align-h="center" align-v="center" style="margin: 5px">
                                  <b-col sm="6">
                                    <h6 class="card-text">Stage</h6>
                                  </b-col>
                                  <b-col sm="6">
                                    <p class="card-text">{{p.fase_cultivo.GrowthStageName}}</p>
                                  </b-col>
                                </b-row>
                                <b-row align-h="center" align-v="center" style="margin: 5px">
                                  <b-col sm="6">
                                    <h6 class="card-text">Expected Production:</h6>
                                  </b-col>
                                  <b-col sm="6">
                                    <p class="card-text">{{p.expectedProduction}} </p>
                                  </b-col>
                                </b-row>
                                <b-row align-h="center" ><!-- style="margin: 5px"> -->
                                  <b-col sm="7">
                                    <b-button @click="goTodetail(p.id_terrain)" variant="outline-light" block style=" border-color: #327927;color: #327927; ">Crop Details</b-button>  
                                   </b-col>
                                 </b-row> 
                              </b-col>
                            </b-row>

                           </div>
                            
                            
                        </div>
                    </div>

                </b-col>
  
                                  
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
  
    
    // import Sidebar from '../../../components/menu/SidebarMenu.vue';
  
    import {mapGetters,mapActions} from 'vuex'
  
  import {FarmService} from "../../../services/FarmService"; 
  import {CropService} from "../../../services/CropService"; 
  import {PlantService} from "../../../services/PlantService"; 
    
    export default {
      name: "Crop",
      components: {
        MainContainerUser,
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        
      },
      data() {
        return {        
              title: "Crops",
          loading: false, 
          crops: null,
          farm: null,
          plant: null,
          stagePlant:null,
        };
      },
     
      computed : {
        ...mapGetters('farm',['get_farms']), 
        ...mapGetters('crop',['get_crops']),   
        ...mapGetters('plant',['get_plants']),   
  
        },
        watch: {
              terrainSelected: function() {
                  this.getCultivos();
              }
          },
      created() {
         this.fetchData()
      },
      methods: {
        ...mapActions('farm',['saveFarms']),
        ...mapActions('crop',['saveCrops']),
        ...mapActions('plant',['savePlants']),
        cropsFilter() {
            console.log("cropsFilter function");
            //let result = oData;
            this.crops = this.get_crops;
            console.log("crops :"+ JSON.stringify(this.crops));
            if (this.farm) { // it can be null (optional)
              this.crops = this.crops.filter(c => c.terrain.farm_id === this.farm.id);
            }
            console.log("if (this.farm) :"+ JSON.stringify(this.crops));
            if (this.plant) { // it can be null (optional)
              this.crops = this.crops.filter(c => c.id_plant === this.plant.id);
            }
            console.log("if (this.plant) :"+ JSON.stringify(this.crops));
            if (this.stagePlant) { // it can be null (optional)
              this.crops = this.crops.filter( c => c.fase_cultivo_id === this.stagePlant.id);
            }

            // return result;
          },
       
        async fetchData () {
  
              this.loading = true

              try {
                    const { data } = await FarmService.getList();//this.fetchParams)
                    this.saveFarms(data);
                    // this.farms = data;
                    console.log("farms :"+ JSON.stringify(data))
                    // this.pagination.total = data.total
              } catch (e) {
                    // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                    this.error = e.message
                    console.log(e)
              } finally {
                    this.loading = false
              }

              try {
                    const { data } = await CropService.getList();//this.fetchParams)
                    this.saveCrops(data);
                    // this.farms = data;
                    console.log("crops :"+ JSON.stringify(data))
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
                    // this.farms = data;
                    console.log("plants :"+ JSON.stringify(data))
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
          console.log("Mounted FarmCreate.vue");
        }
    };
    </script>
    
    <style>
    </style>
    