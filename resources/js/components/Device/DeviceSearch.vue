<template>


     <GreyRow >

      <!--  <b-col  v-if="withSearch" cols="auto" align-v="center" style="margin: 5px; margin-left: 20px">
                <h5>Search by :</h5>
            </b-col> 
     
             <b-form inline  style="margin: 5px">
                       
                    <b-form-group id="input-group-prodType" label="Product Type:" label-for="input-prodType" >

                        <b-form-select 
                            style="margin-left: 10px"
                            id="input-prodType"
                            name="input-prodType"
                            v-model="prodTypeSelected"
                            aria-describedby="input-prodType-live-feedback"
                            @change="changeProdType"

                            >
                            <option  :value="null" :selected="!prodTypeSelected">None</option>
                            <option v-for="prodType in prodTypes" :selected="prodTypeSelected == prodTypeId "
                                :key="prodType.id"
                                :value="prodType.id">
                                {{ prodType.name }} 
                            </option>
                        </b-form-select> 
                         
                       

                    </b-form-group>

                        <b-form-group class="mr-sm-2" id="input-group-isBiologic" label="Biologic:" label-for="input-isBiologic" > 
                            <b-form-checkbox
                                id="isBiologic"
                                v-model="isBiologicSelected"
                                name="isBiologic"
                                @change="changeIsBiologic"
                              >
                              </b-form-checkbox>
                    </b-form-group>

            </b-form> -->

            <b-col style="text-align: right; ">
                <b-button v-can="'device-create'" v-if="auth.mode"  @click="$router.push({name: 'deviceCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin: 5px">Add new Device</b-button>

            </b-col>

  </GreyRow>
           
</template>

<script>

import GreyRow from "@/wrapper/GreyRow"

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'


import  $bus   from '@/app';

    export default {
      name: "DeviceSearch",
      components: {       
        GreyRow
      },
      // props: ['prodType','isBiologic','withSearch'],
      props: ['withSearch'],

          // plantSelected: { type: Object, default: null},
          // farmSelected: { type: Object, default: null},

      // },
      data() {
        return {
             //  prodTypeSelected: null,
             // isBiologicSelected: null,
        };
      },
      watch: {
            
      },
      computed : {
           // prodTypeSelected(){
           //    return ProductType.query().where('id',this.prodTypeId).get();
           // }, 
           // {
           //    get(){ return this.prodType },
           //    set(t){                 
           //      if(t != this.prodType){
           //        console.log("emit changeProdType")
           //        this.$emit('changeProdType', t) 
           //        }
           //      }
                
           //  },
           //  isBiologicSelected: {
           //    get(){ return this.isBiologic },
           //    set(b){ 
           //      if(b != this.isBiologic){
           //        console.log("emit changeIsBiologic")
           //        this.$emit('changeIsBiologic', b) 
           //        }
           //      }
                
           //  },
            // prodTypes(){
            //     return ProductType.all() ;
           
            // },
            // farms(){
            //     return Farm.all() ;
           
            // },
           
            auth(){
                return Auth.query().first();
            },
            
           
        },
      created() {
            
           console.log("on created DeviceSearch");
           // if(this.prodTypeId){
           //    this.prodTypeSelected = this.prodTypeId;
           // }
            
           //  this.isBiologicSelected = this.isBiologic;
        
      },
      methods: {
        // changeProdType(t){
        //   console.log("value of t :" +JSON.stringify(t));
        //   this.$emit('changeProdType', t) 
        // },
        // changeIsBiologic(b){
        //   console.log("value of b :" +JSON.stringify(b));
        //   this.$emit('changeIsBiologic', b) 
        // },
          // testchange(){
          //   console.log("tesete change")
          // },
          // testinput(){
          //   console.log("tesete input")
          // }
      },
      mounted () {

        console.log("Mounted DeviceSearch.vue");

        },
    };
    </script>

    <style>
    </style>
