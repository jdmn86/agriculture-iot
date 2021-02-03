<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >

 <!--   <ProductSearch  :prodType="prodTypeSelected"
   @changeProdType="prodTypeSelected = $event"
   :isBiologic="isBiologicSelected"
   @changeIsBiologic="isBiologicSelected = $event" 
   :withSearch="true"/> -->
   <ProductSearch  :prodTypeId="prodTypeId"
   @changeProdType="changeProdType"
   :isBiologic="isBiologic"
   @changeIsBiologic="changeIsBiologic" 
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
    props: ['prodTypeId','isBiologic'],
    // {
    //       prodTypeId: { type: String, default: null },
    //       isBiologic: { type: String, default: false },

    // },
    data() {
      return {
            title: "ProductList",
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
           
          productsFiltered(){
            console.log("productsFiltered");

            let bio = (this.isBiologic == 'true');
            
              if(this.prodTypeId ){
                console.log("with producttype id");
                    return Product.query().where('is_biologic',bio).with("typeProduct").whereHas('typeProduct', (query) =>{
                         // query.with('crops').whereHas('crops', (queryC) => {

                          // if(this.prodTypeId){
                            console.log("whereHas typeProduct ");
                            query.where('id',parseInt(this.prodTypeId));
                        // }
                         // })
                  }).get();    
                }else{
                  console.log("without producttype id");
                  console.log("this.isBiologicSelected :"+this.isBiologic);
                  return Product.query().where('is_biologic',bio).with("typeProduct").get();
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
      console.log("Mounted ProductList");

    
      }
  };
  </script>

 <style scoped>
  nav > .nav.nav-tabs{
    
    border: none;
      color:#fff;
      background:#28a745;
      border-radius:0;
  
  }
  nav > div a.nav-item.nav-link,
  nav > div a.nav-item.nav-link.active
  {
    border: none;
      padding: 18px 25px;
      color:#fff;
      background:#28a745;
      border-radius:0;
  }
  
  nav > div a.nav-item.nav-link.active:after
   {
    content: "";
    position: relative;
    bottom: -60px;
    left: -10%;
    border: 15px solid transparent;
    border-top-color: #832E00 ;
  }
  .tab-content{
    background: #fdfdfd;
      line-height: 25px;
      /*border: 1px solid #ddd;*/
      border-top:5px solid #832E00;
      /*border-bottom:5px solid #832E00;*/
      /*padding:30px 25px;*/
  }
  
  nav > div a.nav-item.nav-link:hover,
  nav > div a.nav-item.nav-link:focus
  {
    border: none;
      background: #832E00;
      color:#fff;
      border-radius:0;
      transition:background 0.20s linear;
  }
  
  .card-flip > div {
    backface-visibility: hidden;
    transition: transform 300ms;
    transition-timing-function: linear;
    width: 100%;
    height: 100%;
    margin: 0;
    display: flex;
  }
  
  .card-front {
    transform: rotateY(0deg);
  }
  
  .card-back {
    transform: rotateY(180deg);
    position: absolute;
    top: 0;
  }
  
  .card-flip:hover .card-front {
    transform: rotateY(-180deg);
  }
    
  .card-flip:hover .card-back {
    transform: rotateY(0deg);
  }
  </style>



