<template>
  <MainContainerUser>

    <!--  <HeadContainer :title="title"/>

        <slot name="search"/>
     </HeadContainer> -->

      <transition>
          <router-view ></router-view>
      </transition>
      
  </MainContainerUser>

  </template>
  
  <script>
  import HeadContainer from "../../../wrapper/HeadContainer";
  import MainContainerUser from "../../../wrapper/MainContainerUser";
  // import BodyContainer from "../../../wrapper/BodyContainer";
  import NoDataContainer from "../../../components/NoDataContainer";

  // import UiModal from "../../../components/UiModal";

  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  import {mapGetters,mapMutations,mapActions} from 'vuex'

import {TerrainService} from "../../../services/TerrainService"; 
import {FarmService} from "../../../services/FarmService"; 
import {PlantService} from "../../../services/PlantService"; 
  
  export default {
    name: "Terrain",
    components: {
      MainContainerUser,
      HeadContainer,
      // BodyContainer,
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
            // terrain: null,
            // create: false,
            // terrenosSearch: null,
            // confirmModal: false,
      };
    },
    watch: { 
      // terrains: function(value) { // watch it
      //     console.log("terrain : "+this.terrains[0]);
      //     this.terrain = this.terrains[0];
      // }
    },
    computed : {
      ...mapGetters('terrain',['terrains']), 
      ...mapGetters('farm',['farms','farmSelected']),  
      ...mapGetters('plant',['plants','plantSelected']),   
      ...mapGetters('auth',['userSettings']),   
      // farm: {
      //     get () {
      //       return this.farmSelected;
      //     },
      //     set (value) {
      //           if(value){
      //             this.setFarmSelected(value);
                
                  
      //           }
      //     }
      //   }
      },
    created() {
      this.fetchData()
    },
    methods: {
      ...mapActions('terrain',['setTerrains','terrainsByFarm']),
      ...mapActions('farm',['setFarms','setFarmSelected']),
      ...mapActions('plant',['setPlants','setPlantSelected']),
        // cropsFilter() {
        //     console.log("cropsFilter function");
        //     //let result = oData;
        //     this.terrenosSearch = this.getTerrains;

        //     console.log("terrains :"+ JSON.stringify(this.terrenosSearch));
        //     if (this.farm) { // it can be null (optional)
        //       this.terrenosSearch = this.terrenosSearch.filter(t => t.farm_id === this.farm.id);
        //     }
        //     console.log("if (this.farm) :"+ JSON.stringify(this.terrenosSearch));
        //     if (this.plant) { // it can be null (optional)
        //       this.terrenosSearch = this.terrenosSearch.filter(t => t.cultivo.id_plant === this.plant.id);
        //     }
        //     console.log("if (this.plant) :"+ JSON.stringify(this.terrenosSearch));
            
        //     // return result;
        //   },
      async fetchData () {

            this.loading = true
            try {
                  const { data } = await TerrainService.getList();//this.fetchParams)
                  this.setTerrains(data);
                  
                  // this.pagination.total = data.total
            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
                  // this.loading = false
            }

           try {
                const { data } = await FarmService.getList();//this.fetchParams)
                this.setFarms(data);
                // this.farms = data;
                console.log("farms :"+ JSON.stringify(data))
                // this.pagination.total = data.total
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.error = e.message
                console.log(e)
          } finally {
                // this.loading = false
          }

           try {
                const { data } = await PlantService.getList();//this.fetchParams)
                this.setPlants(data);
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

      }
    },
    mounted () {
      console.log("Mounted Terrain.vue");
      }
  };
  </script>
  
  <style>
  </style>
  