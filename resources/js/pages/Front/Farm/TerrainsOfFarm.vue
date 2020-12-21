<template>
  <b-col v-if="terrains" >

          <MapLoaderTerrains v-if="terrains.length && google" :terrains="terrains" :google="google"/>
         
            <NoDataContainer v-else :title="title" > 
                    <slot >
                        <b-button v-can="'farm-create'" @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
                  </slot> 
              </NoDataContainer>
    
  </b-col>  
     
</template> 
    
    <script>  
      import Vue from 'vue';
    
    import GoogleMapsApiLoader from 'google-maps-api-loader'
    import MapLoaderTerrains from '@/components/GoogleMaps/MapLoaderTerrains.vue'
    import NoDataContainer from "@/components/NoDataContainer";

import  $bus   from '@/app';

    export default {  
      name: 'TerrainsOfFarm',          
       components: {
         MapLoaderTerrains,
         NoDataContainer,
       },
       props: {
        terrains: { type: Array, default: null},
        
      },
       data(){
        return {      
          google: null,
          title: "Terrains in this farm",
        }
      },
       watch: {
    
        },
      computed:{
          
          
      },
      created() {
       
      },
      methods: { 
        
        
        async fetchData () {
  
          
        }
        
      },
      async mounted () { 
              const googleMapApi = await GoogleMapsApiLoader({
                apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
              });
              this.google = googleMapApi;
    
              console.log('Component ShowTerrainsOfFarm horizontal mounted.');
    
            },
    
    };
    </script>
    
    <style>    
      
    </style>