<template>

   <div >

            <HeadContainer :title="title"/>

            <BodyContainer :loading.sync="loading">            

                <template slot="topBody" >

                    <b-col cols="auto" style="margin: 5px">
                        <b-row align-v="center" align-h="start">

                            <b-col  cols="auto" class=" text-right">
                                  <h5>Farm :</h5>
                            </b-col>

                            <b-col cols="auto" class=" text-left" style="margin: 5px">    
                
                                <b-form-select v-if="farms.length "
                                v-model="farmSelected"
                                size="sm" 
                                >
                                    <option :key="f.id" v-for="f in farms" :selected="farmSelected == f "  v-bind:value="f">{{ f.name }}</option>
                                </b-form-select>

                            </b-col>

                        </b-row>
                  </b-col >

                  <b-col  style="text-align: right; margin: 5px"  >
                        <b-button  v-can="'farm-create'" v-if="auth.mode" @click="$router.push({name:'farmCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>

                  </b-col>


                </template>
                  
                <template slot="body" >

                    <transition  v-if="farms.length " name="slide-fade">
                        <router-view :farmSelected.sync="farmSelected"></router-view>
                    </transition>

                    <NoDataContainer v-else :title="title" >
                          <slot >
                                <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
                          </slot>
                    </NoDataContainer>

                </template>

            </BodyContainer>
                            
</div>
</template>

<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import NoDataContainer from "@/components/NoDataContainer";

import {FarmService} from "@/services/FarmService";
import {TerrainService} from "@/services/TerrainService";


import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'

import  $bus   from '@/app';


    export default {
      name: "Farm",
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
              title: "Farms",
              loading: false,
            
        };
      },
      watch: {
        
            
      },
      computed : {
           
            farms(){
                return Farm.all() ;
           
            },
           
            auth(){
                return Auth.query().first();
            },
             farmSelected: {
                get () {
                  return Farm.query().find(this.$route.params.farmId);
                },
                set (value) {
                    console.log("set farm")
                        if(this.farms.length){
                            if(value !== null){
                                console.log("with value")
                                if(this.$route.params.farmId != value.id){
                                    if(Farm.query().find(value.id)){
                                        console.log("to farm with farmID dont existe")
                                        this.$router.push({name:'farmShow', params: { farmId: value.id } });
                                    }
                                    
                                }
                            }else{
                                let first = Farm.query().first();
                                this.$router.push({name:'farmShow', params: { farmId: first.id } });
                            }
                        }
                     
                }
              }
          
           
        },
      created() {
             this.fetchFarms()
              .then(() => {
           console.log("on created farm");
                    if(this.farms.length){
                        if(this.$route.params && this.$route.params.farmId){
                            if(Farm.query().find(this.$route.params.farmId)){
                                console.log("1")
                                this.farmSelected = Farm.query().find(this.$route.params.farmId);
                            }else{
                                console.log("2")
                                var first= Farm.query().first();
                                this.farmSelected = first;
                            }
                        }else{
                            console.log("3")
                            var first= Farm.query().first();
                            this.farmSelected = first;
                            
                        }
                    }

            });
        
      },
      methods: {

        async fetchFarms () {

              this.loading = true
              try {
                    const { data } = await FarmService.getList();
                    Farm.insert({data: data});
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
