<template>
   
<!-- <b-col style="padding: 0px"> -->
<div>


    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col style=" color: black; padding: 0px"  >    

            <TerrainDetails v-can="'terrain-list'"  :terrain="terrain" :google="google">

                  <!--   <template slot="edit" v-if="auth.mode">
                        <b-col align-h="center">
                            <b-button  v-can="'farm-edit'" @click="$router.push({name:'farmEdit', params: { farmId: farm.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Farm</b-button>
                        </b-col>
                    </template> -->
                    
                    <template v-can="'terrain-delete'" slot="delete" v-if="auth.mode">

                        <ModalToDelete  v-can="'terrain-delete'"   >
                            <template slot="deleteButton">
                                 <button type="button"  class="btn btn-danger" @click="onConfirmDelete">Confirmar</button>
                            </template>
                        </ModalToDelete>

                    </template>
                    
            </TerrainDetails>
    
        <!-- <TerrainsOfFarm :google="google"  :terrains="farm.terrains"  />  -->
        </b-col>

    </b-row>

</div>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import TerrainDetails from '@/components/Terrain/TerrainDetails';

// import {FarmService} from "@/services/FarmService";
// import {TerrainService} from "@/services/TerrainService"; 

import GoogleMapsApiLoader from 'google-maps-api-loader'

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: "TerrainShow",
    components: {
      // TerrainsOfFarm,
      TerrainDetails,
      ModalToDelete,
    },
    props: ['terrainId'],
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            title: "Farms",
            loading: false,
            google: null,
            // farmSelected: null,
      };
    },
    watch: {

      
    
    },
    computed : {
          
           // farms(){
           //      return Farm.query().with('terrains').get();
           
           //  },
            terrain(){
                return Terrain.query().find(this.terrainId) 
           
            },
          // terrains: function () {
          //       console.log("computed terrains");
          //       if(this.farmSelected){
          //         return Terrain.query().where('farm_id', this.farmSelected.id).get()  
          //       }
                
                
          // },

            auth(){
                return Auth.query().first();
            },
         
      },
     async created() {
      console.log("Created FarmShow");
      const googleMapApi = await GoogleMapsApiLoader({
        apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      });
      this.google = googleMapApi;

      console.log("Created FarmShow");
       // this.fetchTerrains().then(() => {
            
                //  if(Farm.query().find(this.$route.params.farmId) ){
                //         console.log("with farm")
                //     this.farmSelected = Farm.query().with('terrains').find(this.$route.params.farmId);

                //    // this.terrainsToSend = Terrain.query().where('farm_id', this.terrain.farm_id).where('id', (value) => value != this.terrain.id).get();

                //    // this.farm = Farm.query().where('id', this.terrain.farm_id).first();    
                // }

            // });
               
    },
    methods: {
   
      async onConfirmDelete(){

          console.log("on confirm FarmShow");
          try {
            this.loading = true;
                    Terrain.api().delete('terrain/'+this.terrainId,{delete: this.terrainId});
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false

      
               
            }

      },     
      
      // async fetchTerrains () {

      //         this.loading = true

      //       try {
      //               const { data } = await TerrainService.getList();
      //               Terrain.insert({data: data});
      //               console.log("Terrain :"+JSON.stringify(data));
                    
      //       } catch (e) {
      //               this.$bus.$emit('warningFixTop', e.message);
      //               this.error = e.message
      //               console.log(e)
      //       } finally {
      //               this.loading = false
      //       }

      //   }
    },
    mounted () {
      console.log("Mounted TerrainShow");


    
      }
  };
  </script>

  <style>
  </style>
