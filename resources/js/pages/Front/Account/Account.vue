<template>
<div>
    
    <HeadContainer :title="title"/>
                
    <BodyContainer :loading.sync="loading">

<b-container fluid style="padding: 0px; margin: 0px" >

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col cols="5" style="background-color: #f8f9fa; color: black; padding: 0px" > 
<!-- 
            <b-row  align-h="around"   style="margin: 10px; background-color: #f8f9fa; ">

                <b-col sm="5"  style=" padding: 0px; " >
 -->
                    <b-row  style="  margin: 0px">
                        <b-col col-sm="1" >

                            <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                                <h4 >{{auth.name}}</h4>
                
                            </b-row> 

                            <b-row style="padding: 10px" align-h="start" align-v="center">
                                <h4 style="margin: 5px" id="localizacao" class="">{{auth.email}}</h4>
                            </b-row> 

                             <b-row style="padding: 10px" align-h="start" align-v="center">
                                <h4 style="margin: 5px" id="localizacao" class="">Address</h4>
                            </b-row> 

                            <b-row style="padding: 10px" align-h="start" align-v="center">
                                <b-button  block v-show="!componentChangePassword" @click="componentChangePassword = !componentChangePassword" style=" border-color: #4AAD37;background-color: #4AAD37; ">Change Password</b-button>

                                <ChangePassword v-show="componentChangePassword" />

                            </b-row>

                        </b-col>

                    </b-row>

            <!--     </b-col>

            </b-row> -->

        </b-col>

        <Settings />

        

    </b-row>
</b-container>
        <!-- <transition  v-if="!loading " name="slide-fade">
            <router-view ></router-view>
        </transition>

        <NoDataContainer v-else :title="title" > 
            <slot >
                <b-button v-can="'terrain-create'" @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
            </slot> 
        </NoDataContainer> -->


    </BodyContainer>
            
</div>

</template>
  
<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
  
import ChangePassword from "@/components/Account/ChangePassword";
import Settings from "@/components/Account/Settings";

import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import Farm from '@/models/Farm'
import User from '@/models/User'
import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

export default {
    name: "Account",
    components: {
        HeadContainer,
        BodyContainer,
        ChangePassword,
        Settings
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
        return {        
            title: "Account",
            loading: false,    
            componentChangePassword: false,         
            
        };
    },
    // watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("watch store");
    //       this.terrenosSearch = this.terrains; 
    //   }
    // },
    computed : {
      
        auth(){
            return Auth.query().first();
        }, 
        user(){
            return User.query().first();
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
        updateMetric() {
            console.log("updateMetric");
           
          },

      async onConfirmDelete(terrainToDelete){

            console.log("on confirm Terrain");
            try {
            this.loading = true;
                  const { data } = await TerrainService.remove(terrainToDelete.id);
                   Terrain.delete(terrainToDelete.id);
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false
   
            }

      },     

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
      console.log("Mounted Account.vue");

      }
  };
  </script>
  
  <style>
  </style>
  