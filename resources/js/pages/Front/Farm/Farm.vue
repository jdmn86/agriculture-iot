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
                
                            <b-form-select v-if="farms && farmSelected"
                            v-model="farmSelected"
                            size="sm" 
                            >
                                <option :key="f.id" v-for="f in farms" :selected="farm.id == f.id "  v-bind:value="f">{{ f.name }}</option>
                            </b-form-select>

                            </b-col>

                          </b-row>
                      </b-col >

                  <b-col  style="text-align: right; margin-right: 5px" v-if="auth.mode" >
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

//import {mapGetters,mapActions} from 'vuex'

import {FarmService} from "../../../services/FarmService";
import {TerrainService} from "../../../services/TerrainService";

import Loading from "../../../components/Loading";

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'


// import store from '@/store'
import User from '@/models/User'

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
              farmSelected: null,
            
        };
      },
      watch: {
          
            '$route.params': {
            handler(newValue) {

                  if (newValue){
                         if(this.farmSelected ){
                              if(this.farmSelected.id != newValue.id ){
                                    this.farmSelected = newValue;
                              }
                        }
                  }
                  
                
            },
            immediate: true,
        },
           farmSelected: {
            handler(newValue) {

                    if(newValue){
                        // this.setFarmSelected(newValue);
                        if(this.$route.params){
                              if(this.$route.params && this.$route.params.farmId != newValue.id ){
                                    this.$router.push({name:'farmShow', params: { farmId: newValue.id } });
                              }
                        }
                        
                      }
                  
                
            },
            immediate: true,
        },
            
      },
      computed : {
            // ...mapGetters('farm',['farms','farmById','farmSelected']),
            // ...mapGetters('terrain',['terrainsByFarm']),
            // ...mapGetters('auth',['userSettings']),
            farms(){
                return Farm.all();
           
            },
            // farm(){
            //     return Farm.query().where('id',this.auth.company_id).first();
           
            // },
            auth(){
                return Auth.query().first();
            },
            // farmSelected: {
            //     get () {
            //       return this.farmSelected;
            //     },
            //     set (value) {
            //           if(value){
            //             this.setFarmSelected(value);
            //             if(this.$route.params){
            //                   if(this.$route.params && this.$route.params.farmId != value.id ){
            //                         this.$router.push({name:'farmShow', params: { farmId: value.id } });
            //                   }
            //             }
                        
            //           }
            //     }
            //   }
           
        },
      created() {
          //   const initialData = data
          // User.insert({ data: initialData })
        
      },
      methods: {
        // ...mapActions('farm',['setFarms','setFarmSelected']),
        // ...mapActions('terrain',['setTerrains']),
           
        async fetchFarms () {

              this.loading = true
              try {
                    const { data } = await FarmService.getList();//this.fetchParams)
                    // this.setFarms(data);                    
                    Farm.insert({data: data});
                    console.log("farms :"+JSON.stringify(data));
              } catch (e) {
                    // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                    this.error = e.message
                    console.log(e)
              } finally {
                   this.loading = false
              }          


        },
        async fetchTerrains () {

              this.loading = true

            try {
                    const { data } = await TerrainService.getList();//this.fetchParams)
                    // this.setTerrains(data);
                    Terrain.insert({data: data});
                    console.log("Terrain :"+JSON.stringify(data));
                    
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

            this.fetchFarms().
            then(() => {
           
                this.fetchTerrains().
                then(() => {
               
                    if(this.$route.params && this.$route.params.farmId){
                        this.farmSelected = Farm.query().where('id',this.$route.params.farmId).first();
                      //this.farmById(this.$route.params.farmId);
                      
                     // console.log(" farm : "+ JSON.stringify(this.farm));
                    }else{
                      this.farmSelected = Farm.query().first();
                    }
                      
              
                });
                  
          
            });

        console.log("Mounted Farm.vue");

        },
    };
    </script>

    <style>
    </style>
