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
                        <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
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

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

    export default {
      name: "Farm",
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
              title: "Farms",
              loading: false,
            
        };
      },
      watch: {
        
            
      },
      computed : {
           
            farms(){
                return Farm.query().with("terrains.crops").get();
           
            },
       
            auth(){
                return Auth.query().first();
            },
           
        },
      created() {
            console.log("on created farm");
            this.fetch();
        
      },
      methods: {

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
      mounted () {


        console.log("Mounted Farm.vue");

        },
    };
    </script>

    <style>
    </style>
