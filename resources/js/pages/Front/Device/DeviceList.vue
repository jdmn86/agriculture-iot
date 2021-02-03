<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >


<DeviceSearch   :withSearch="false"/>
 
   



<MapOfDevices v-if="google && !isAddDevice" :devices="devicesFiltered" :google="google" style="margin: 0px;padding: 3vw; padding-top: 4vw; padding-bottom: 0px"/>

    <b-row v-if="devicesFiltered && devicesFiltered.length>0" cols="1" cols-sm="1" cols-md="1" cols-lg="2" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="start">


<!--     <b-col sm="7">
     <map-loader-markers 
        :map-config="mapConfig"
        apiKey="AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        :items="GET_DEVICES" 
        
      > 
   
      </map-loader-markers >
</b-col> -->


<AddDevice v-if="isAddDevice"/>



        <b-col v-can="'device-list'" style=" color: black; padding: 0px"  
                        v-for="d in devicesFiltered" :key="d.id">    

            <DeviceDetails :device="d" >
                    
                    <template v-can="'device-delete'" slot="delete" v-if="auth.mode">

                      <ModalToDelete v-can="'device-delete'" >
                          <template slot="deleteButton">
                               <button type="button"  class="btn btn-danger" @click="onConfirmDelete(d)">Confirmar</button>
                          </template>
                      </ModalToDelete>
                         
                    </template>
                    
            </DeviceDetails>

        </b-col>
    </b-row>

     <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'device-create'" @click="$router.push({name: 'deviceCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Device</b-button>
        </slot>
    </NoDataContainer>


</b-container>
</template>
                
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import ModalToDelete from "@/components/ModalToDelete";

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import DeviceDetails from '@/components/Device/DeviceDetails';
import AddDevice from '@/components/Device/AddDevice';
import DeviceSearch from "@/components/Device/DeviceSearch";
import MapOfDevices from '@/components/GoogleMaps/MapOfDevices';

import NoDataContainer from "@/components/NoDataContainer";

import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import Device from '@/models/Device'
import DeviceType from '@/models/DeviceType'

import  $bus   from '@/app';

  export default {
    name: "DeviceList",
    components: {
      // TerrainsOfFarm,
      DeviceDetails,
      ModalToDelete,
      GreyRow,
      AddDevice,
      DeviceSearch,
      NoDataContainer,
      MapOfDevices
    },
    props: ['isAddDevice'],
    // {
          // plant: { type: String, default: null },

    // },
    data() {
      return {
            title: "Device",
            loading: false,
             google: null,            
            // farmsFiltered: null,
            // plantSelected: null,
            // isAddDevice: false,

      };
    },
    watch: {
       // plantSelected: function (newPlant,oldPlant) {

       //      console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

       //      if(newPlant != oldPlant && newPlant.id != this.plant){
       //          this.$router.push({query: {...this.$route.query, plant: newPlant.id}});

       //      }
            
       //  },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
          
            devicesFiltered(){
                // if(this.plant){
                //     return Farm.query().with("terrains").whereHas('terrains', (query) =>{
                //          query.with('crops').whereHas('crops', (queryC) => {

                //            console.log("tem id_plant :"+this.plant);
                          
                //           queryC.where('id_plant',parseInt(this.plant))
                //          })
                //   }).get();    
                // }else{
                //     return Farm.query().with("terrains").with("crops").get();
                // }
                return Device.query().with("company").with("deviceType").get();
           
            },
         
      },
    async created() {
      console.log("Created DeviceList");

      const googleMapApi = await GoogleMapsApiLoader({
        apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      });
      this.google = googleMapApi;

      // if(this.plant){
      //   this.plantSelected = Plant.query().find(this.plant);
      // }

    },
    methods: {
      
      async onConfirmDelete(device){

          console.log("on confirm DeviceList");
          try {
                this.loading = true;
              
                Device.api().delete('device/'+device.id,{delete: device.id});

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
      console.log("Mounted DeviceList");

    
      }
  };
  </script>

  <style>
  </style>
