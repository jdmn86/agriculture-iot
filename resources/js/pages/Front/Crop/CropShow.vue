<template>
   
<!-- <b-col style="padding: 0px"> -->
  <b-container fluid style="padding: 0px; margin: 0px" >
 

  <GreyRow >
<b-col>
 <b-nav tabs justified style="margin: 5px 10px 2px 10px;">
    
    <b-nav-item  :to="{name: 'overall'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Crop</h5></b-nav-item>
    
    <b-nav-item :to="{name: 'weather'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Weather</h5></b-nav-item>

     <!-- <b-nav-item  :to="{name: 'watering'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Watering</h5></b-nav-item> -->

<b-nav-item  :to="{name: 'watering'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Water</h5></b-nav-item>
    
    <b-nav-item :to="{name: 'fertilization'}" exact exact-active-class="active"  ><h5  style="color: #4aad37">Fertilization</h5></b-nav-item>
   
   <!-- <b-nav-item :to="{name: 'analysis'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Analysis</h5></b-nav-item> -->

<b-nav-item :to="{name: 'analysis'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Soil</h5></b-nav-item>
   
    <!-- <b-nav-item :to="{name: 'plantHealth'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Plant Health</h5></b-nav-item> -->

<b-nav-item :to="{name: 'plantHealth'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Plant </h5></b-nav-item>

     <b-nav-item :to="{name: 'schedule'}" exact exact-active-class="active" ><h5  style="color: #4aad37">Schedule</h5></b-nav-item>
  
  
  </b-nav>
</b-col>
    
  </GreyRow>

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">


          <transition  v-if="!loading "  name="slide-fade">
              <router-view :crop="crop"></router-view>
          </transition>


        </b-row>
        

</b-container>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
// import CropDetails from '@/components/Crop/CropDetails';
import GreyRow from "@/wrapper/GreyRow"

import TimeLineChart from '@/components/TimeLineChart';

// import CropDetails from "@/components/Crop/CropDetails";
// import CropDetails from "@/pages/Front/Crop/CropShow/CropDetails";

// import {FarmService} from "@/services/FarmService";
// import {TerrainService} from "@/services/TerrainService"; 

import GoogleMapsApiLoader from 'google-maps-api-loader'

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

  export default {
    name: "CropShow",
    components: {
      GreyRow,
      // TerrainsOfFarm,
      // CropDetails,
      // CropDetails,
      ModalToDelete,
      TimeLineChart
    },
    props: ['cropId'],
    // {
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            title: "Crop",
            loading: false,
            // google: null,
            // farmSelected: null,
      };
    },
    watch: {

      
    
    },
    computed : {
          
           crop(){
                return Crop.query().with("terrain").with("plant").with("stage").find(this.cropId);
           
            },
            // farm(){
            //     return Farm.query().with('terrains').find(this.farmId) 
           
            // },
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
      console.log("Created CropShow");
      // const googleMapApi = await GoogleMapsApiLoader({
      //   apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      // });
      // this.google = googleMapApi;

      console.log("Created CropShow");
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

          console.log("on confirm CropShow");
          try {
            this.loading = true;
                Crop.api().delete('crop/'+this.cropId,{delete: this.CropId});
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
      console.log("Mounted CropShow");


    
      }
  };
  </script>

 <style scoped>

.nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
  background-color: white !important;
 
}





/*.nav-tabs .nav-link, .nav-tabs .nav-item .nav-link{
  border: ;
}*/

/*.nav-tabs {
    border-bottom: 2px solid #dee2e6;
}*/

/* .tab2 {
  color: green !important;
  background-color: green;
}*/

/* .tabs > .nav-item > .nav-link {
  color: green !important;
  background-color: green;
}*/



  </style>
