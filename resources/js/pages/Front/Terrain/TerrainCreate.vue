<template>
    
    <b-container fluid  class="border border-gray-100" style=" background-color: #f8f9fa; margin: 0px; ">
  
        <b-row class=" align-items-center " style="padding: 14px 0px 0px 14px">
          <b-col cols="5">
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

                <!--  <select v-if="FARMS" class="custom-select"  id="selectfarm"  v-model="farm" >
                   <option v-for="item in FARMS" >{{item.name}}</option>
                 </select> -->

                  <select v-if="farms" class="form-control" size="sm" id="selectfarm"  v-model="farm">
                            <option value>None</option>
                            <option v-for="item in farms" :value="item">{{item.name}} </option>
                        </select>

               </b-col>

             </b-row>
           </b-col>

           <b-col class="col-auto align-self-end" style="">
            <b-button block  @click="saveTerrain"  style=" border-color: #4AAD37;background-color: #4AAD37; ">Save Terrain</b-button>

          </b-col>               

        </b-row>


        <b-col v-if=" google" style="padding: 14px 0px 14px 0px;">

          <MapCreateTerrain
          @updateTerrainCords="updateTerrainCords"
          :terrains="terrainsToSend"
          :google="google"
          >  

        </MapCreateTerrain> 
      </b-col>


    </b-container>
    </template>
    
    <script>
  //   import HeadContainer from "../../../wrapper/HeadContainer";
  //   import MainContainerUser from "../../../wrapper/MainContainerUser";
  //   import BodyContainer from "../../../wrapper/BodyContainer";
  //   import NoDataContainer from "../../../components/NoDataContainer";
  //   import HeaderComponent from "../../../components/HeaderComponent";
    
    // import Sidebar from '../../../components/menu/SidebarMenu.vue';
  
    import {mapGetters,mapActions} from 'vuex'
    import GoogleMapsApiLoader from 'google-maps-api-loader'
    import MapCreateTerrain from "../../../components/GoogleMaps/MapCreateTerrain.vue";

  import {TerrainService} from "../../../services/TerrainService"; 
  import {FarmService} from "../../../services/FarmService"; 

    export default {
      name: "TerrainCreate",
      components: {
      //   MainContainerUser,
      //   HeadContainer,
      //   BodyContainer,
      //   NoDataContainer,
        MapCreateTerrain
      },
      data() {
        return {        
              title: "Terrain Create",
          loading: false, 
        //   farms: null,
        terrainName: null,
        farm: null,
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
        ...mapGetters('farm',['farms']),   
        ...mapGetters('terrain',['terrainsByFarm']),
        },
      created() {
         this.fetchData()
      },
      methods: {
        ...mapActions('farm',['saveFarms']),
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
            }else{
              
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
        }
          
  
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

            const googleMapApi = await GoogleMapsApiLoader({
            apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
            });
            this.google = googleMapApi;
    
            this.terrainsToSend = this.terrainsByFarm(this.FARM_SELECTED);
            this.farm=this.FARM_SELECTED;
    
  
        }
      },
      mounted () {
          console.log("Mounted TerrainCreate.vue");
        }
    };
    </script>
    
    <style>
    </style>
    