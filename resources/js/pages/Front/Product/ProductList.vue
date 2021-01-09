<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >

   <ProductSearch  :prodType="prodTypeSelected"
   @changeProdType="prodTypeSelected = $event"
   :isBiologic="isBiologicSelected"
   @changeIsBiologic="isBiologicSelected = $event" 
   :withSearch="true"/>
 

    <b-row  v-if="productsFiltered && productsFiltered.length>0" cols="1" cols-sm="2" cols-md="3" cols-lg="4" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="start">


         <b-col v-can="'product-list'" style=" color: black; padding: 0px"  
                        v-for="p in productsFiltered" :key="p.id">    

             <ProductCard :product="p"/>

        </b-col>

    </b-row>   

     <!-- <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Plant</b-button>
        </slot>
    </NoDataContainer> -->


</b-container>
</template>
                
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import ModalToDelete from "@/components/ModalToDelete";

import ProductSearch from "@/components/Product/ProductSearch";
import NoDataContainer from "@/components/NoDataContainer";

import ProductCard from "@/components/Product/ProductCard"

import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'

import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'

import  $bus   from '@/app';

  export default {
    name: "ProductList",
    components: {
      ProductSearch,
      ModalToDelete,
      GreyRow,      
      NoDataContainer,
      ProductCard
    },
    props: {
          prodTypeId: { type: String, default: null },
          isBiologic: { type: String, default: null },

    },
    data() {
      return {
            title: "ProductList",
            loading: false,

            prodTypeSelected: null,
            isBiologicSelected: false,

      };
    },
    watch: {
       prodTypeSelected: function (newProdType,oldProdType) {

            console.log("value in prodTypeSelected watch :"+JSON.stringify(newProdType));

            if( newProdType != oldProdType && newProdType.id != this.prodTypeId){
              console.log("IN prodTypeSelected");
                this.$router.push({query: {...this.$route.query, prodTypeId: newProdType.id}});

            }
            
        },
        isBiologicSelected: function (newIsBiologic,oldIsBiologic) {

            console.log("value in isBiologicSelected watch :"+JSON.stringify(newIsBiologic));

            if(newIsBiologic != oldIsBiologic && newIsBiologic != this.isBiologic){
              console.log("IN isBiologicSelected");
                this.$router.push({query: {...this.$route.query, isBiologic: newIsBiologic}});

            }
            
        },
      
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
            
            // products(){
            //     return Product.query().with('composition').get();
            // },
            //  productTypes(){
            //     return ProductType.query().get();
            // },
           
          productsFiltered(){
            console.log("productsFiltered");
              if(this.prodTypeId ){
                console.log("with producttype id");
                    return Product.query().where('is_biologic',this.isBiologicSelected).with("typeProduct").whereHas('typeProduct', (query) =>{
                         // query.with('crops').whereHas('crops', (queryC) => {

                          // if(this.prodTypeId){
                            console.log("whereHas typeProduct ");
                            query.where('id',parseInt(this.prodTypeId));
                        // }
                         // })
                  }).get();    
                }else{
                  console.log("without producttype id");
                  console.log("this.isBiologicSelected :"+this.isBiologicSelected);
                  return Product.query().where('is_biologic',this.isBiologicSelected).with("typeProduct").get();
                }


                //  if(this.prodTypeId ){
                //     return Product.query().whereHas('is_biologic', (query) =>{
                //           if(this.isBiologic){
                //             console.log("whereHas is_biologic ");
                //             query.where('is_biologic',this.isBiologic);  
                //           }
                
                //   }).with("typeProduct").whereHas('typeProduct', (query) =>{

                //           if(this.prodTypeId){
                //             console.log("whereHas typeProduct ");
                //             query.where('typeProduct_id',parseInt(this.prodTypeId));
                //         }
                //   }).get();    
                // }else{
                //     return Product.query().with("typeProduct").get();
                // }
                
                
           
            },
            
      },
    async created() {
        console.log("Created ProductList");

       if(this.prodTypeId){
        this.prodTypeSelected = ProductType.query().find(this.prodTypeId);
      }

      if(this.isBiologic){
        this.isBiologicSelected = this.isBiologic;
      }
      // if(this.isBiologic){
      //   this.isBiologicSelected = Farm.query().find(this.farmId);
      // }

    },
    methods: {
      
        // typePlantsFilter(id) {
        //     this.tipoPlantaId=id;
        //     console.log("typePlantsFilter function");
        //     this.plantsFilter = this.masterPlants;
        //     console.log("plants :"+ JSON.stringify(this.masterPlants));
        //     if (this.tipoPlantaId) { 
        //         this.plantsFilter = this.plantsFilter.filter(p => p.tipo_planta_id === id);
        //     }
        // },
       
   
    },
    mounted () {
      console.log("Mounted ProductList");

    
      }
  };
  </script>

    <style>
  
  </style>

