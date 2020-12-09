<template>
   
                           
    <b-row  style="padding:10px;" >

        <FarmDetails v-can="'farm-edit'" v-if="farmSelected " >
                <template slot="edit" v-if="userSettings.mode">
                    <b-button  @click="$router.push({name:'farmEdit', params: { farmId: farmSelected.id } })" variant="light" block style=" border-color: #795427;color: #795427;margin-bottom: 10px">Edit Farm</b-button>
                </template>
                
                <template v-can="'farm-delete'" slot="delete" v-if="userSettings.mode">
                    <ModalToDelete   :toDelete="farmSelected"  :onConfirm="onConfirm" />
                    <b-button @click="$bvModal.show('ModalToDelete')" variant="light" block  style=" border-color: #ff0000;color: #ff0000;margin-bottom: 10px">Delete</b-button> 
                </template>
                
        </FarmDetails>
    
        <TerrainsOfFarm  :terrains="terrains"  /> 

    </b-row>
        
</template>
                
<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContainer from "../../../wrapper/BodyContainer";
import NoDataContainer from "../../../components/NoDataContainer";
import ModalToDelete from "../../../components/ModalToDelete";

import TerrainsOfFarm from "./TerrainsOfFarm";
import FarmDetails from './FarmDetails';

import {mapGetters,mapActions} from 'vuex'

import {FarmService} from "../../../services/FarmService";
import {TerrainService} from "../../../services/TerrainService"; 

  export default {
    name: "FarmShow",
    components: {
      MainContainerUser,
      HeadContainer,
      BodyContainer,
      NoDataContainer,
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: {
    //   title: { type: String, default: "without text" },

    },
    data() {
      return {
            title: "Farms",
            loading: false,
          
      };
    },
    watch: {
        
    },
    computed : {
          ...mapGetters('farm',['farms','farmById','farmSelected']),
          ...mapGetters('terrain',['terrainsByFarm']),
          ...mapGetters('auth',['userSettings']),

          terrains: function () {
                console.log("computed");
                return this.terrainsByFarm(this.farmSelected);
                
          },
       
         
      },
    created() {
      
               
    },
    methods: {
      ...mapActions('farm',['setFarms','removeFarm']),
      ...mapActions('terrain',['saveTerrains']),
   
      async onConfirm(){
          console.log("on confirm");
          try {
                  const { data } = await FarmService.remove(this.farm.id);//this.fetchParams)
                  this.removeFarm(this.farm);

                  this.$router.push({path: '/front/farm'});
               
            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
                  this.loading = false
            }


      },
      onClose(){
            this.isEditFarm = false;
            this.isEditCreateFarm = false;
      },
  
      async fetchData () {

            this.loading = true
            try {
                  const { data } = await FarmService.getList();//this.fetchParams)
                  this.setFarms(data);

            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
                  this.loading = false
            }

            try {
                  const { data } = await TerrainService.getList();//this.fetchParams)
                  this.saveTerrains(data);
                  
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
      console.log("Mounted FarmShow");

      
    
      }
  };
  </script>

  <style>
  </style>
