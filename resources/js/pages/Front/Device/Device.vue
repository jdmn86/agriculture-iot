<template>

    <div >

        <HeadContainer :title="title"/>

        <BodyContainer :loading.sync="loading">            

            <!-- <template slot="body" > -->
               
                <transition  v-if="!loading " name="slide-fade">
                    <router-view ></router-view>
                </transition>

                <NoDataContainer v-else :title="title" >
                    <slot >
                        <b-button v-can="'device-create'" @click="$router.push({name: 'deviceCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Device</b-button>
                    </slot>
                </NoDataContainer>

            <!-- </template> -->

        </BodyContainer>
                            
    </div>
</template>

<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import NoDataContainer from "@/components/NoDataContainer";
import GreyRow from "@/wrapper/GreyRow"
// import FarmList from "@/components/Farm/FarmList";

// import Farm from '@/models/Farm'
// import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
// import Plant from '@/models/Plant'
// import Crop from '@/models/Crop'
import Device from '@/models/Device'
import DeviceType from '@/models/DeviceType'

import  $bus   from '@/app';

    export default {
      name: "Device",
      components: {
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        GreyRow
      },
      props: {
      //   title: { type: String, default: "without text" },

      },
      data() {
        return {
              title: "Devices",
              loading: false,
            
        };
      },
      watch: {
        
            
      },
      computed : {
           
            // farms(){
            //     return Farm.query().with("terrains.crops").get();
           
            // },
       
            auth(){
                return Auth.query().first();
            },
           
        },
      created() {
            console.log("on created Device");
            this.fetch();
        
      },
      methods: {

        async fetch(){
            this.loading = true

            try {
                await Device.api().get('device');    
                await DeviceType.api().get('deviceType');                
                // await Terrain.api().get('terrain');                
                // await Plant.api().get('plant');
                // await Crop.api().get('crop');
                    
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


        console.log("Mounted Device.vue");

        },
    };
    </script>

    <style>
    </style>
