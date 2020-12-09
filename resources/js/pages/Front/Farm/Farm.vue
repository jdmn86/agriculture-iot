<template>
      <MainContainerUser >

            <Loading :loading.sync="loading" ></Loading>

            <HeadContainer :title="title">

                  <template slot="search" v-if="farms">
                  
                        <b-col cols="auto" style="margin: 5px">
                              <b-row align-v="center" align-h="start">

                                    <b-col  cols="auto" class=" text-right">
                                          <h5>Farm :</h5>
                                    </b-col>
                                    <b-col cols="auto" class=" text-left" style="margin: 5px">    
                        
                                    <b-form-select v-if="farms && farm"
                                    
                                    v-model="farm"
                                    
                                    size="sm"
                                    >
                                          <option :key="f.id" v-for="f in farms" :selected="farm.id == f.id "  v-bind:value="f">{{ f.name }}</option>
                                    </b-form-select>

                                    </b-col>

                              </b-row>
                        </b-col >

                  <b-col  style="text-align: right; margin-right: 5px" v-if="userSettings.mode" >
                        <b-button  v-can="'farm-create'" @click="$router.push({name:'farmCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>

                  </b-col>

                  </template>
            </HeadContainer>

            <BodyContainer  :title="title" >            

                  <template slot="body" >

                              <transition>
                                    <router-view ></router-view>
                              </transition>

                        <NoDataContainer v-if="!farms" :title="title" >
                              <slot >
                                    <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
                              </slot>
                        </NoDataContainer>

                  </template>

            </BodyContainer>
                            
    </MainContainerUser>

</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContainer from "../../../wrapper/BodyContainer";
import NoDataContainer from "../../../components/NoDataContainer";
import ModalToDelete from "../../../components/ModalToDelete";

import TerrainsOfFarm from "./TerrainsOfFarm";
import FarmDetails from './FarmDetails';

import {mapGetters,mapActions} from 'vuex'

import {FarmService} from "../../../services/FarmService";
import {TerrainService} from "../../../services/TerrainService";

import Loading from "../../../components/Loading";

    export default {
      name: "Farm",
      components: {
        MainContainerUser,
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        TerrainsOfFarm,
        FarmDetails,
        ModalToDelete,
        Loading,
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
          
            '$route.params': {
            handler(newValue) {

                  if (this.farm){
                         if(this.farmSelected ){
                              if(this.farmSelected.id != this.farm.id ){
                                    this.farm = this.farmSelected;
                              }
                        }
                  }
                  
                
            },
            immediate: true,
        }
            
      },
      computed : {
            ...mapGetters('farm',['farms','farmById','farmSelected']),
            ...mapGetters('terrain',['terrainsByFarm']),
            ...mapGetters('auth',['userSettings']),
            farm: {
                get () {
                  return this.farmSelected;
                },
                set (value) {
                      if(value){
                        this.setFarmSelected(value);
                        if(this.$route.params){
                              if(this.$route.params && this.$route.params.farmId != value.id ){
                                    this.$router.push({name:'farmShow', params: { farmId: value.id } });
                              }
                        }
                        
                      }
                }
              }
           
        },
      created() {
        
      },
      methods: {
        ...mapActions('farm',['setFarms','setFarmSelected']),
        ...mapActions('terrain',['saveTerrains']),
           
        async fetchData () {

              this.loading = true
              try {
                    const { data } = await FarmService.getList();//this.fetchParams)
                    this.setFarms(data);

              } catch (e) {
                    // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                    this.error = e.message
                    console.log(e)
              } finally {
                   // this.loading = false
              }

            try {
                    const { data } = await TerrainService.getList();//this.fetchParams)
                    this.saveTerrains(data);
            
                    
                    
            } catch (e) {
                    // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                    this.error = e.message
                    console.log(e)
            } finally {
                    this.loading = false
            }


        }
      },
      mounted () {

            this.fetchData().then(() => {
           
                  this.farm = this.farmById(this.$route.params.farmId);
                  
                  console.log(" farm : "+ JSON.stringify(this.farm));
          
            });

        console.log("Mounted Farm.vue");

        },
    };
    </script>

    <style>
    </style>
