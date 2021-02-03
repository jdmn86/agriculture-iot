<template>
<div>
    
    <HeadContainer :title="title"/>
                
    <BodyContainer :loading.sync="loading">

        <transition  v-if="!loading " name="slide-fade">
            <router-view ></router-view>
        </transition>

        <NoDataContainer v-else :title="title" > 
            <slot >
                <b-button v-can="'user-create'" @click="$router.push({name: 'userCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add User</b-button>
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
import User from '@/models/User'
import Company from '@/models/Company'

import  $bus   from '@/app';

export default {
    name: "Employee",
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
            title: "Employees",
            loading: false,             

        };
    },
    // watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("watch store");
    //       this.terrenosSearch = this.terrains; 
    //   }
    // },
    computed : {
        users(){
            return User.all() ;
           
        },
        terrains(){
            //tem de fazer refreash quando vem do edit terrain
            console.log("computed get employees");
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

        console.log("on created employee")

        // const googleMapApi = await GoogleMapsApiLoader({
        //     apiKey:  "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        // });

        // this.google = googleMapApi;

        this.fetch();
      
    },
    methods: {
   

      async fetch(){
            this.loading = true

            try {
                await User.api().get('user');                
                await Company.api().get('company');                
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
    async mounted () {
      console.log("Mounted employee.vue");

      }
  };
  </script>
  
  <style>
  </style>
  