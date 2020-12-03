<template>

    <div >
    
    
            <div v-if="farm && google" class="horizontal-scroll-wrapper squares">
                <!-- <b-card v-for="terrain in " :key="terrain.id" class="text-center"  > -->
    
                  <!-- <template v-slot:header>
                      <h3 class="mb-0">{{terrain.id}}</h3>
                  </template> -->
    
                     <!-- <b-card-text> -->
                          <MapLoaderTerrains v-if="terrainsByFarm(farm)" :terrains="terrainsByFarm(farm)" :google="google"/>
                     <!-- </b-card-text> -->
    
                  <!-- </b-card> --> 
    
            </div> 

            <b-row v-if="!terrainsByFarm(farm)" >
                <NoDataContainer :title="title" > 
                       <slot >
                            <b-button @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
                      </slot> 
                 </NoDataContainer>
              </b-row>
        
    </div>
     
    </template> 
    
    <script>  
      import Vue from 'vue';
    
    import GoogleMapsApiLoader from 'google-maps-api-loader'
    // import MapProvider from '../../clients/MapProvider.vue'
    // import MapLoaderListComponent from '../../clients/MapLoaderListComponent.vue'
    import MapLoaderTerrains from '../../components/GoogleMaps/MapLoaderTerrains.vue'
    import {mapGetters,mapMutations,mapActions} from 'vuex'
    import {TerrainService} from "../../services/TerrainService"; 
    import NoDataContainer from "../../components/NoDataContainer";

    export default {  
      name: 'TerrainsOfFarm',          
       components: {
        //  MapProvider,
         MapLoaderTerrains,
         NoDataContainer
       },
       props: {
        farm: { type: Object, default: null },
        
      },
       data(){
        return {      
          google: null,
          title: "Terrains in this farm",
    
          // terrain: null,
        }
      },
       watch: {
    
        },
      computed:{
          ...mapGetters('terrain',['terrainsByFarm']),
          
      },
      created() {
        this.fetchData()
      },
      methods: { 
        ...mapActions('terrain',['saveTerrains']),
        
        async fetchData () {
  
            this.loading = true
            try {
                    const { data } = await TerrainService.getList();//this.fetchParams)
                    this.saveTerrains(data);
                    
                    // this.pagination.total = data.total
            } catch (e) {
                    // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                    this.error = e.message
                    console.log(e)
            } finally {
                    this.loading = false
            }

        }
         // handlePermission() {
    
         //      navigator.permissions.query({name:'geolocation'}).then(function(result) {
         //        if (result.state == 'granted') {
         //          console.log('Permission ' + result.state);
         //           navigator.geolocation.getCurrentPosition(position =>{
         //              console.log("lat : "+position.coords.latitude);
         //              console.log("lon : "+position.coords.longitude);
         //            },
         //            error=>{
         //               console.log("error : "+error.message);
         //            }
         //            );
         //        } else if (result.state == 'prompt') {
         //          console.log('Permission ' + result.state);
         //          // geoBtn.style.display = 'none';
         //          navigator.geolocation.getCurrentPosition(position =>{
         //              console.log("lat : "+position.coords.latitude);
         //              console.log("lon : "+position.coords.longitude);
         //            },
         //            error=>{
         //               console.log("error : "+error.message);
         //            }
         //            );
         //        } else if (result.state == 'denied') {
         //          console.log('Permission ' + result.state);
         //          // geoBtn.style.display = 'inline';
         //        }
         //        // result.onchange = function() {
         //        //   this.report(result.state);
         //        // }
         //      });
         //    },
      },
      async mounted () { // point 3
             // this.getCurrentPosition(
             //    this.geoId = geolocation.watchPosition({enableHighAccuracy: true}, (position, err) => {
             //      this.position = position
             //    }));
     
    
              const googleMapApi = await GoogleMapsApiLoader({
                apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
              });
              this.google = googleMapApi;
    
              console.log('Component ShowTerrainsOfFarm horizontal mounted.');
    
              
    
            //   await this.GETTERRAINS();
    
    
    
            },
    
    };
    </script>
    
    
    
    
    </style>
    <!-- USING -->