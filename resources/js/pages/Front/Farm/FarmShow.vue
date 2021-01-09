<template>
   
<!-- <b-col style="padding: 0px"> -->
<div>


    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col style=" color: black; padding: 0px"  >    

            <FarmDetails v-can="'farm-list'"  :farm="farm" :google="google">

                  <!--   <template slot="edit" v-if="auth.mode">
                        <b-col align-h="center">
                            <b-button  v-can="'farm-edit'" @click="$router.push({name:'farmEdit', params: { farmId: farm.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit Farm</b-button>
                        </b-col>
                    </template> -->
                    
                    <template v-can="'farm-delete'" slot="delete" v-if="auth.mode">

                        <ModalToDelete  v-can="'farm-delete'"   >
                            <template slot="deleteButton">
                                 <button type="button"  class="btn btn-danger" @click="onConfirmDelete">Confirmar</button>
                            </template>
                        </ModalToDelete>

                    </template>
                    
            </FarmDetails>
    
        <!-- <TerrainsOfFarm :google="google"  :terrains="farm.terrains"  />  -->
        </b-col>

    </b-row>

</div>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import FarmDetails from '@/components/Farm/FarmDetails';

// import {FarmService} from "@/services/FarmService";
// import {TerrainService} from "@/services/TerrainService"; 

import GoogleMapsApiLoader from 'google-maps-api-loader'

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: "FarmShow",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: ['farmId'],
    // {
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
          
           farms(){
                return Farm.query().with('terrains').get();
           
            },
            farm(){
                return Farm.query().with('terrains').find(this.farmId) 
           
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
                Farm.api().delete('farm/'+this.farmId,{delete: this.farmId});
                  // const { data } = await FarmService.remove(this.farmSelected.id);
                  //  Farm.delete(this.farmSelected.id);
                 
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
      console.log("Mounted FarmShow");


    
      }
  };
  </script>

  <style>
  </style>
