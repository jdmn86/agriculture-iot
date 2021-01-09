<template>


     <GreyRow >

      <b-form v-if="withSearch " inline  style="margin: 5px; margin-left: 20px">

       <!--  <b-form-group class="mr-sm-2" id="input-group-plant" label="Plant:" label-for="input-plant" > 
               <b-form-select 
                  style="margin-left: 10px"
                  id="input-plant"
                  name="input-plant"                  
                  v-model="plantSelected"                            
                  aria-describedby="input-plant-live-feedback"
                  >
                  <option :value="null" :selected="!plantSelected ">None</option>
                  <option v-for="plant in plants" :selected="plantSelected == plant "
                      :key="plant.id"
                      :value="plant">
                      {{ plant.name }} 
                  </option>
              </b-form-select> 
      </b-form-group> -->

      </b-form>

      <b-col style="text-align: right; ">
          <b-button v-can="'variety-create'" v-if="auth.mode"   @click="$router.push({name: 'varietyCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin: 5px">Add new Variety</b-button>

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
      name: "PlantSearch",
      components: {       
        GreyRow
      },
      props: ['value','withSearch'],

           // plantSelected: { type: Object, default: null},

      // },
      data() {
        return {
            
        };
      },
      watch: {
            
      },
      computed : {
           plantSelected: {
              get(){ return this.value },
              set(v){ this.$emit('input', v) }
            },
            plants(){
                return Plant.all() ;
           
            },
           
            auth(){
                return Auth.query().first();
            },
            
           
        },
      created() {
            
           console.log("on created plant search");
                   
        
      },
      methods: {
            
      },
      mounted () {

        console.log("Mounted PlantSearch.vue");

        },
    };
    </script>

    <style>
    </style>
