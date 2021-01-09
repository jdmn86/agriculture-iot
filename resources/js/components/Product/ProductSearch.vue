<template>


     <GreyRow >

       <b-col  v-if="withSearch" cols="auto" align-v="center" style="margin: 5px; margin-left: 20px">
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
                            >
                            <!-- @change="cropsFilter"> -->
                            <option  :value="null" :selected="!prodTypeSelected">None</option>
                            <option v-for="prodType in prodTypes" :selected="prodTypeSelected == prodType "
                                :key="prodType.id"
                                :value="prodType">
                                {{ prodType.name }} 
                            </option>
                        </b-form-select> 
                         
                       

                    </b-form-group>

                        <b-form-group class="mr-sm-2" id="input-group-isBiologic" label="Biologic:" label-for="input-isBiologic" > 
                            <b-form-checkbox
                                id="isBiologic"
                                v-model="isBiologicSelected"
                                name="isBiologic"
                              >
                              </b-form-checkbox>
                    </b-form-group>

            </b-form>

            <b-col style="text-align: right; ">
                <b-button v-can="'product-create'" v-if="auth.mode"  @click="$router.push({name: 'productCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin: 5px">Add new Product</b-button>

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
      name: "ProductSearch",
      components: {       
        GreyRow
      },
      // props: ['prodType','isBiologic','withSearch'],
      props: ['prodType','isBiologic','withSearch'],

          // plantSelected: { type: Object, default: null},
          // farmSelected: { type: Object, default: null},

      // },
      data() {
        return {
            
        };
      },
      watch: {
            
      },
      computed : {
        // this.$emit('interface', this.childData)
           prodTypeSelected: {
              get(){ return this.prodType },
              set(t){ this.$emit('changeProdType', t) }
            },
            isBiologicSelected: {
              get(){ return this.isBiologic },
              set(b){ this.$emit('changeIsBiologic', b) }
            },
            prodTypes(){
                return ProductType.all() ;
           
            },
            farms(){
                return Farm.all() ;
           
            },
           
            auth(){
                return Auth.query().first();
            },
            
           
        },
      created() {
            
           console.log("on created Product search");
                   
        
      },
      methods: {
            
      },
      mounted () {

        console.log("Mounted ProductSearch.vue");

        },
    };
    </script>

    <style>
    </style>
