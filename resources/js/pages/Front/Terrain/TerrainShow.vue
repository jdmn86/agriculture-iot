<template>

<div>

   <BodyContainer  :title="title">
    <template slot="body">
      <b-row  style="padding:10px;" align-h="center">
        
        <Loading :loading.sync="loading" ></Loading>

        <b-col  >
          <b-container fluid  style=" background-color: white; margin: 0px; ">

              <b-row class=" align-items-center " style="padding: 14px 0px 0px 14px">
                <b-col >
                  <b-row class=" align-items-center " style="margin: 5px">
                    <b-col>
                      <!-- <form class="form-inline" > -->
                        <h5 for="nameTerrain">Terrain name: </h5>

                        <!-- </form> -->
                      </b-col>
                      <b-col>
                        <input type="text"  v-model="terrainName" id="nameTerrain" required  class="form-control " >

                      </b-col>


                    </b-row>

                    <b-row class=" align-items-center " style="margin: 5px"> 
                      
                      <b-col>
                        <h5 style="margin-right: 10px"  for="selectfarm">Farms :</h5>
                      </b-col>

                      <b-col >

                        <select v-if="farms" class="form-control" size="sm" id="selectfarm"  v-model="farm">
                                  <option value>None</option>
                                  <option :key="item.id" v-for="item in farms" :value="item">{{item.name}} </option>
                              </select>


                      </b-col>

                    </b-row>
                  </b-col>

                  <b-col class="col-auto align-self-end" style="">
                  <b-button block  @click="saveTerrain"  style=" border-color: #4AAD37;background-color: #4AAD37; ">Save Terrain</b-button>

                </b-col>               

              </b-row>


              <b-col v-if=" google " style="padding: 14px 0px 14px 0px;">

                <MapCreateTerrain 
                @updateTerrainCords="updateTerrainCords"
                :terrains="terrainsToSend"
                :google="google"
                >  

              </MapCreateTerrain> 
            </b-col>


          </b-container>
        </b-col>
      </b-row>
    </template >
   </BodyContainer>
 </div>
</template>

<script>
  import HeadContainer from "../../../wrapper/HeadContainer";
//   import MainContainerUser from "../../../wrapper/MainContainerUser";
  import BodyContainer from "../../../wrapper/BodyContainer";
//   import NoDataContainer from "../../../components/NoDataContainer";
//   import HeaderComponent from "../../../components/HeaderComponent";

// import Sidebar from '../../../components/menu/SidebarMenu.vue';

import {mapGetters,mapActions} from 'vuex'
import GoogleMapsApiLoader from 'google-maps-api-loader'
import MapCreateTerrain from "../../../components/GoogleMaps/MapCreateTerrain.vue";

import {TerrainService} from "../../../services/TerrainService"; 
import {FarmService} from "../../../services/FarmService"; 

import Loading from "../../../components/Loading";

export default {
  name: "TerrainCreate",
  components: {
  //   MainContainerUser,
    HeadContainer,
    BodyContainer,
  //   NoDataContainer,
    MapCreateTerrain,
    Loading
  },
  data() {
    return {        
          title: "Create Terrain",
      loading: false, 
    //   farms: null,
    terrainName: null,    
    google: null,
      terrain: {
          name: null,
          farm_id: null,
          coords: null,
          area: null,
      },
    };
  },
  
  computed : {
    ...mapGetters('farm',['farms','farmSelected']),   
    ...mapGetters('terrain',['terrainsByFarm','terrainSelected']),
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
      }
    },
  created() {
      this.fetchData()
  },
  methods: {
    ...mapActions('farm',['setFarms','setFarmSelected']),
    updateTerrainCords(e) {
        console.log("coords in ADDTERRAIN : ");
        console.log(e);

        if(e==null){
          this.selectPolygon=null 
        }else{
          this.terrain.coords = e[0];
          this.terrain.area = e[1];
          console.log("terrain in AddTerrain");
          console.log(this.terrain);
        }
    },
    async saveTerrain(){

        if(!this.terrain.area){
          alert("Please add Terrain");
        }else if(this.farm){
          
          this.terrain.farm_id = this.farm.id;
          this.terrain.name=this.terrainName;
          
          try {
                const { data } = await TerrainService.create(this.terrain);//this.fetchParams)
                //this.farms(data);
                // this.farms = data;
                this.addTerrain(this.terrain);
                console.log("terrain :"+ JSON.stringify(data))
                this.$router.push({path: '/front/terrain'});
                
                // this.pagination.total = data.total
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false
          }
        }else{
          alert("Please select the farm");
        }
      

    },
    async fetchData () {

          this.loading = true
          
          // try {
          //       const { data } = await FarmService.getList();//this.fetchParams)
          //       this.setFarms(data);
          //       // this.farms = data;
          //       console.log("farms :"+ JSON.stringify(data))
          //       // this.pagination.total = data.total
          // } catch (e) {
          //       // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
          //       this.error = e.message
          //       console.log(e)
          // } finally {
          //       this.loading = false
          // }

        const googleMapApi = await GoogleMapsApiLoader({
        apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        });
        this.google = googleMapApi;

      this.terrainsToSend = this.terrainsByFarm(this.terrainSelected);
      this.farm=this.terrainSelected;


    }
  },
  mounted () {
      console.log("Mounted TerrainCreate.vue");
    }
};
</script>

<style>
</style>
