<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >


<!--    <ProductSearch  :prodTypeId="prodTypeId"
   @changeProdType="changeProdType"
   :isBiologic="isBiologic"
   @changeIsBiologic="changeIsBiologic" 
   :withSearch="true"/> -->

    <b-row  v-if="cropsFiltered && cropsFiltered.length>0" cols="1" cols-sm="2" cols-md="3" cols-lg="4" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="start">


         <b-col v-can="'crop-list'" style=" color: black; padding: 0px"  v-for="c in cropsFiltered" :key="c.id">    

             <CropCard :crop="c"/>

        </b-col>

    </b-row>   

     <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'crop-create'" @click="$router.push({name: 'cropCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Crop</b-button>
        </slot>
    </NoDataContainer>


</b-container>
</template>
                
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import ModalToDelete from "@/components/ModalToDelete";

import ProductSearch from "@/components/Product/ProductSearch";
import NoDataContainer from "@/components/NoDataContainer";

import CropCard from "@/components/Crop/CropCard"

import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'

import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'

import Crop from '@/models/Crop'


import  $bus   from '@/app';

  export default {
    name: "CropList",
    components: {
      ProductSearch,
      ModalToDelete,
      GreyRow,      
      NoDataContainer,
      CropCard
    },
    props: ['prodTypeId','isBiologic'],
    // {
    //       prodTypeId: { type: String, default: null },
    //       isBiologic: { type: String, default: false },

    // },
    data() {
      return {
            title: "CropList",
            loading: false,

            // prodTypeSelected: null,
            // isBiologicSelected: null,

      };
    },
    watch: {
       // prodTypeSelected: function (newProdType,oldProdType) {

       //      // console.log("prodTypeSelected");
       //      if(newProdType ){
       //        if( newProdType != oldProdType && newProdType.id  != this.prodTypeId){
       //      // if(newProdType != oldProdType &&  this.prodTypeSelected != null){
              
       //          console.log("change route with prodTypeSelected ");
       //          this.$router.push({query: {...this.$route.query, prodTypeId: newProdType.id}});
       //        }

       //      }else{
       //          console.log("change route withOUT prodTypeSelected ");
       //          this.$router.push({query: {...this.$route.query}});
       //        }
            
       //  },
       //  isBiologicSelected: function (newIsBiologic,oldIsBiologic) {

       //      // console.log("isBiologicSelected");

       //      if(newIsBiologic != oldIsBiologic && newIsBiologic != this.isBiologic){
       //        // if(newIsBiologic != oldIsBiologic &&  this.isBiologicSelected != null){
       //        console.log("change route isBiologicSelected");
       //          this.$router.push({query: {...this.$route.query, isBiologic: newIsBiologic}});

       //      }
            
       //  },
      
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
            
            // products(){
            //     return Product.query().with('typeProduct').get();
            // },
            //  productTypes(){
            //     return ProductType.query().get();
            // },
           
          cropsFiltered(){
            console.log("cropsFiltered");

            // let bio = (this.isBiologic == 'true');
            
            //   if(this.prodTypeId ){
            //     console.log("with producttype id");
            //         return Product.query().where('is_biologic',bio).with("typeProduct").whereHas('typeProduct', (query) =>{
            //              // query.with('crops').whereHas('crops', (queryC) => {

            //               // if(this.prodTypeId){
            //                 console.log("whereHas typeProduct ");
            //                 query.where('id',parseInt(this.prodTypeId));
            //             // }
            //              // })
            //       }).get();    
            //     }else{
            //       console.log("without producttype id");
            //       console.log("this.isBiologicSelected :"+this.isBiologic);
            //       return Product.query().where('is_biologic',bio).with("typeProduct").get();
            //     }

  return Crop.query().with("terrain").with("plant").with("stage").get();
           
            },
            
      },
    async created() {
        console.log("Created CropList");

        // if(!this.isBiologic){
        //   this.isBiologic = false;
        // }
//        if(this.prodTypeId){
// console.log("Created ProductList change prodTypeSelected :"+JSON.stringify(this.prodTypeId));    
//         this.prodTypeSelected = ProductType.query().find(this.prodTypeId);
//       }

      // if(this.isBiologic ){
      //   console.log("Created isBiologic change isBiologicSelected :"+JSON.stringify(this.isBiologic));    
      //   this.isBiologicSelected = this.isBiologic;
      // }
       // if(!this.isBiologic ){
       //    this.isBiologicSelected = false;
       // }

      // if(this.isBiologic){
      //   this.isBiologicSelected = Farm.query().find(this.farmId);
      // }

    },
    methods: {
      changeProdType(t){
        console.log("in productlist change prodtype :"+JSON.stringify(t))
        if(t){
           console.log("in productlist change prodtype 1:"+JSON.stringify(t))
          this.$router.push({query: {...this.$route.query, prodTypeId: t}});  
        }else{
           console.log("in productlist change prodtype 2:"+JSON.stringify(t))
          this.$router.push({query: {...this.$route.query,prodTypeId: null}});  
        }
        

      },
      changeIsBiologic(b){
        console.log("in productlist change isBiologic :"+JSON.stringify(b))
        this.$router.push({query: {...this.$route.query, isBiologic: b}});
      },
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
      console.log("Mounted CropList");

    
      }
  };
  </script>

    <style>
  
  </style>

