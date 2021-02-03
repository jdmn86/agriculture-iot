<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >


<!-- <TerrainSearch  :plant="plantSelected"
   @changePlant="plantSelected = $event"
   :farm="farmSelected"
   @changeFarm="farmSelected = $event" :withSearch="true"/> -->

   <TerrainSearch  :plant="plantId"
   @changePlant="changePlant"
   :farm="plantId"
   @changeFarm="changeFarm" :withSearch="true"/>
   
 

    <b-row v-if="terrainsFiltered && terrainsFiltered.length>0" cols="1" cols-sm="1" cols-md="1" cols-lg="2" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col v-can="'terrain-list'" style=" color: black; padding: 0px"  
                        v-for="t in terrainsFiltered" :key="t.id">

        <!-- <b-col  style=" border-radius: 4px; color: black; padding: 0px"  
            v-for="(t, index) in terrenosSearch"
            :style="t.style"
            :key="index">   -->                  

            <TerrainDetails :terrain="t" :google="google">

               <!--  <template slot="mapa">
                    <MapLoaderOneTerrain v-if="google" :terrain="t" :google="google"/>
                </template>


                <template slot="crop">
                    <b-button   @click="goTodetail(t)" variant="light" block style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                </template>


                <template slot="edit" v-if="auth.mode" >
                    <b-button  @click="$router.push({name:'terrainEdit', params: { terrainId: t.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                </template> -->


                <template v-can="'terrain-delete'" slot="delete" v-if="auth.mode" >
                    <ModalToDelete  v-can="'terrain-delete'" :name="t.name"  >
                        <template slot="deleteButton">
                            <button type="button"  class="btn btn-danger" @click="onConfirmDelete(t)">Confirmar  </button>
                        </template>
                    </ModalToDelete>
                </template>

            </TerrainDetails>

        </b-col>

    </b-row>   

     <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
        </slot>
    </NoDataContainer>


</b-container>
</template>
                
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import ModalToDelete from "@/components/ModalToDelete";

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import TerrainDetails from '@/components/Terrain/TerrainDetails';
import TerrainSearch from "@/components/Terrain/TerrainSearch";

import NoDataContainer from "@/components/NoDataContainer";


import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

  export default {
    name: "TerrainList",
    components: {
      // TerrainsOfFarm,
      TerrainDetails,
      ModalToDelete,
      // GreyRow,
      TerrainSearch,
      NoDataContainer
    },
    props: ['plantId','farmId'],
    // {
    //       plantId: { type: String, default: null },
    //       farmId: { type: String, default: null },

    // },
    data() {
      return {
            title: "Terrain",
            loading: false,
            google: null,            
            // farmsFiltered: null,
            // plantSelected: null,
            // farmSelected: null,

      };
    },
    watch: {
       // plantSelected: function (newPlant,oldPlant) {

       //      console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

       //      if(newPlant != oldPlant && newPlant.id != this.plantId){
       //          this.$router.push({query: {...this.$route.query, plantId: newPlant.id}});

       //      }
            
       //  },
       //  farmSelected: function (newFarm,oldFarm) {

       //      console.log("value in farmSelected watch :"+JSON.stringify(newFarm));

       //      if(newFarm != oldFarm && newFarm.id != this.farmId){
       //          this.$router.push({query: {...this.$route.query, farmId: newFarm.id}});

       //      }
            
       //  },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
          
            terrainsFiltered(){
                console.log("filtering terrain......")
                 if(this.farmId || this.plantId){
                    return Terrain.query().with("farm").whereHas('farm', (query) =>{
                         // query.with('crops').whereHas('crops', (queryC) => {

                         //   console.log("tem id_plant :"+this.plant);
                          if(this.farmId){
                            query.where('id',parseInt(this.farmId));
                        }
                         // })
                  }).with("crops").whereHas('crops', (query) =>{
                         // query.with('crops').whereHas('crops', (queryC) => {

                         //   console.log("tem id_plant :"+this.plant);
                          if(this.plantId){
                            query.where('id_plant',parseInt(this.plantId));  
                          }
                          
                         // })
                  }).get();    
                }else{
                    return Terrain.query().with("crops").get();
                }
                
           
            }, 
         
      },
    async created() {
      console.log("Created TerrainList");

      const googleMapApi = await GoogleMapsApiLoader({
        apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      });
      this.google = googleMapApi;

      // if(this.plantId){
      //   this.plantSelected = Plant.query().find(this.plantId);
      // }
      // if(this.farmId){
      //   this.farmSelected = Farm.query().find(this.farmId);
      // }

    },
    methods: {
        changeFarm(f){
            if(f){
                this.$router.push({query: {...this.$route.query, farmId: f}});           
            }else{
                this.$router.push({query: {...this.$route.query, farmId: null}});           
            }
        },
        changePlant(p){
            if(p){
                this.$router.push({query: {...this.$route.query, plantId: p}});           
            }else{
                this.$router.push({query: {...this.$route.query, plantId: null}});           
            }
 
        },
      
      async onConfirmDelete(terrain){

          console.log("on confirm TerrainList");
          try {
                this.loading = true;
                 
                Terrain.api().delete('terrain/'+terrain.id,{delete: terrain.id});

                this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {

                this.loading = false
               
            }

      },     
   
    },
    mounted () {
      console.log("Mounted TerrainList");

    
      }
  };
  </script>

  <style>
  </style>
