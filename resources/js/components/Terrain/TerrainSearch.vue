<template>

 
     <GreyRow >

       <b-col  v-if="withSearch" cols="auto" align-v="center" style="margin: 5px; margin-left: 20px">
                <h5>Search by :</h5>
            </b-col> 
     
             <b-form inline  style="margin: 5px">

                    <b-form-group class="mr-sm-2" id="input-group-farm" label="Farm:" label-for="input-farm" > 
                         <b-form-select 
                            style="margin-left: 10px"
                            id="input-farm"
                            name="input-farm"
                            v-model="farmSelected"               
                            aria-describedby="input-farm-live-feedback"
                            @change="changeFarm"
                            >
                            <!-- @change="cropsFilter"> -->
                            <option :value="null" :selected="!farmSelected ">None</option>
                            <option v-for="farm in farms" :selected="farmSelected == farmId "
                                :key="farm.id"
                                :value="farm.id">
                                {{ farm.name }} 
                            </option>
                        </b-form-select> 
                    </b-form-group>
                       
                    <b-form-group id="input-group-plant" label="Plant:" label-for="input-plant" >

                        <b-form-select 
                            style="margin-left: 10px"
                            id="input-plant"
                            name="input-plant"
                            v-model="plantSelected"
                            aria-describedby="input-plant-live-feedback"
                            @change="changePlant"
                            >
                            <!-- @change="cropsFilter"> -->
                            <option  :value="null" :selected="!plantSelected">None</option>
                            <option v-for="plant in plants" :selected="plantSelected == plantId "
                                :key="plant.id"
                                :value="plant.id">
                                {{ plant.name }} 
                            </option>
                        </b-form-select> 
                         
                    </b-form-group>


            </b-form>

            <b-col style="text-align: right; ">
                <b-button v-can="'terrain-create'" v-if="auth.mode"  @click="$router.push({name: 'terrainCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin: 5px">Add new Terrain</b-button>

            </b-col>

  </GreyRow>
           
</template>

<script>

import GreyRow from "@/wrapper/GreyRow"

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

    export default {
      name: "TerrainSearch",
      components: {       
        GreyRow
      },
      // props: ['value','withSearch'],
      props: ['plantId','farmId','withSearch'],

          // plantSelected: { type: Object, default: null},
          // farmSelected: { type: Object, default: null},

      // },
      data() {
        return {
            plantSelected: null,
            farmSelected: null,
        };
      },
      watch: {
            
      },
      computed : {
        // this.$emit('interface', this.childData)
           // plantSelected: {
           //    get(){ return this.plant },
           //    set(p){ this.$emit('changePlant', p) }
           //  },
           //  farmSelected: {
           //    get(){ return this.farm },
           //    set(f){ this.$emit('changeFarm', f) }
           //  },
            plants(){
                return Plant.all() ;
           
            },
            farms(){
                return Farm.all() ;
           
            },
           
            auth(){
                return Auth.query().first();
            },
            
           
        },
      created() {
            
           console.log("on created Terrain search");
           if(this.plantId){
              this.plantSelected = this.plantId;
           }

           if(this.farmId){
              this.farmSelected = this.farmId;
           }
            
                   
        
      },
      methods: {
        changePlant(p){
          console.log("value of p :" +JSON.stringify(p));
          this.$emit('changePlant', p) 
        },
        changeFarm(f){
          console.log("value of f :" +JSON.stringify(f));
          this.$emit('changeFarm', f) 
        },
            
      },
      mounted () {

        console.log("Mounted TerrainSearch.vue");

        },
    };
    </script>

    <style>
    </style>
