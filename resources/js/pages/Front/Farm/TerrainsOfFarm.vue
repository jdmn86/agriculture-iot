<template>
  <b-col v-if="terrains" style="padding-right: 0px">
        <div v-if="terrains.length && google" class="horizontal-scroll-wrapper squares">
          
              <MapLoaderTerrains :terrains="terrains" :google="google"/>

        </div> 
          
        <b-row v-else >
            <NoDataContainer :title="title" > 
                    <slot >
                        <b-button @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
                  </slot> 
              </NoDataContainer>
        </b-row>
        
  </b-col> 
     
</template> 
    
    <script>  
      import Vue from 'vue';
    
    import GoogleMapsApiLoader from 'google-maps-api-loader'
    import MapLoaderTerrains from '../../../components/GoogleMaps/MapLoaderTerrains.vue'
    import NoDataContainer from "../../../components/NoDataContainer";
    import {mapGetters,mapMutations,mapActions} from 'vuex'

    export default {  
      name: 'TerrainsOfFarm',          
       components: {
         MapLoaderTerrains,
         NoDataContainer
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
          ...mapGetters('terrain',['terrainsByFarm']),
          
      },
      created() {
       
      },
      methods: { 
        ...mapActions('terrain',['saveTerrains']),
        
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
    
    
    
    
    </style>