<template>
<div>
    
    <HeadContainer :title="title"/>
                
    <BodyContainer :loading.sync="loading">

        <transition  v-if="!loading " name="slide-fade">
            <router-view ></router-view>
        </transition>

        <NoDataContainer v-else :title="title" > 
            <slot >
                <b-button v-can="'terrain-create'" @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
            </slot> 
        </NoDataContainer>


    </BodyContainer>
            
</div>

</template>
  
<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import NoDataContainer from "@/components/NoDataContainer";
  
import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import Farm from '@/models/Farm'
import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

export default {
    name: "Terrain",
    components: {
        HeadContainer,
        BodyContainer,
        NoDataContainer,
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
        return {        
            title: "Terrains",
            loading: false,             

            terrenosSearch: [],
            farmSelected: null,
            plantSelected: null,
        };
    },
    // watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("watch store");
    //       this.terrenosSearch = this.terrains; 
    //   }
    // },
    computed : {
        farms(){
            return Farm.all() ;
           
        },
        terrains(){
            //tem de fazer refreash quando vem do edit terrain
            console.log("computed get terrains");
            return Terrain.all() ;
           
        },
        plants(){
            return Plant.all() ;
           
        },
        auth(){
            return Auth.query().first();
        },

    },
    async created() {

        console.log("on created Terrain")

        // const googleMapApi = await GoogleMapsApiLoader({
        //     apiKey:  "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        // });

        // this.google = googleMapApi;

        this.fetch();
      
    },
    methods: {
      
        cropsFilter() {
            console.log("cropsFilter function");
            //let result = oData;
            this.terrenosSearch = this.terrains;

            console.log("terrains :"+ JSON.stringify(this.terrenosSearch));
            if (this.farmSelected) { 
              this.terrenosSearch = this.terrenosSearch.filter(t => t.farm_id === this.farmSelected.id);
            }
            console.log("if (this.farm) :"+ JSON.stringify(this.terrenosSearch));
            if (this.plantSelected) { 
              this.terrenosSearch = this.terrenosSearch.filter(t => t.cultivo.id_plant === this.plantSelected.id);
            }
            console.log("if (this.plant) :"+ JSON.stringify(this.terrenosSearch));
            
            // return result;
          },

      // async onConfirmDelete(terrainToDelete){

      //       console.log("on confirm Terrain");
      //       try {
      //       this.loading = true;
      //             const { data } = await TerrainService.remove(terrainToDelete.id);
      //              Terrain.delete(terrainToDelete.id);
                 
      //             this.$bvModal.hide('ModalToDelete')
      //       } catch (e) {
      //             this.$bus.$emit('warningFixTop', e.message);
      //             this.error = e.message
      //             console.log(e)
      //       } finally {

      //           this.loading = false
   
      //       }

      // },     

      async fetch(){
            this.loading = true

            try {
                await Farm.api().get('farm');                
                await Terrain.api().get('terrain');                
                await Plant.api().get('plant');
                await Crop.api().get('crop');
                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                this.loading = false
            }     

      },

    
    },
    async mounted () {
      console.log("Mounted Terrain.vue");

      }
  };
  </script>
  
  <style>
  </style>
  