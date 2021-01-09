<template>
<div>

    <HeadContainer :title="title"/>

    <BodyContainer :loading.sync="loading">  

        <transition  v-if="!loading " name="slide-fade">
            <router-view ></router-view>
        </transition>

    </BodyContainer>

</div>
</template>
  
<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";

import Product from '@/models/Product'
import ProductComposition from '@/models/ProductComposition'
import ProductType from '@/models/ProductType'


import PlantType from '@/models/PlantType'
import PlantStage from '@/models/PlantStage'
import Plague from '@/models/Plague'
import PlantPlague from '@/models/PlantPlague'
import PlagueType from '@/models/PlagueType'
import Crop from '@/models/Crop'

  export default {
    name: "Product",
    components: {
      HeadContainer,
      BodyContainer,
      
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
      return {        
            title: "Product",
            loading: false, 
            // plantsFilter: null,
            // tipoPlantaId: null,

            
      };
    },
    watch: { 
    //   terrains: function(value) { // watch it
    //       console.log("terrain : "+this.terrains[0]);
    //       this.terrain = this.terrains[0];
    //   }
    },
    computed : {
        // masterPlants(){
        //     return Plant.query().where('master_plant_id',null).get();
        // },
        // plantTypes(){
        //     return PlantType.query().get();
        // },
  

      },
    created() {
      this.fetch()
    },
    methods: {
      
      // typePlantsFilter(id) {
      //       this.tipoPlantaId=id;
      //       console.log("typePlantsFilter function");
      //       this.plantsFilter = this.masterPlants;
      //       console.log("plants :"+ JSON.stringify(this.masterPlants));
      //       if (this.tipoPlantaId) { 
      //           this.plantsFilter = this.plantsFilter.filter(p => p.tipo_planta_id === id);
      //       }
      //   },
      //   goTodetail(prodId) {
      //       this.$router.push({name:'PlantDetail',params:{Pid:prodId}})
      //   },
    async fetch () {

        this.loading = true 

        try {
            await ProductComposition.api().get('productComposition');
            await ProductType.api().get('productType');
            await Product.api().get('product');

            
            // await PlantStage.api().get('plantStage');
            // await Plague.api().get('plague');
            // await PlagueType.api().get('plagueType');
            // await PlantPlague.api().get('plantPlague');
            // await Crop.api().get('crop');
            
            
              // const { data } = await PlantTypeService.getList();//this.fetchParams)
              // console.log("PlantTypeService : "+JSON.stringify(data));
              // this.savePlantTypes(data);
              // this.pagination.total = data.total
        } catch (e) {
              // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
              this.error = e.message
              console.log(e)
        } finally {

            // this.typePlantsFilter(1);
              this.loading = false
        }
      }
    },
    mounted () {
      console.log("Mounted Product.vue");
      }
  };
  </script>
  
  <!-- <style>
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
  </style> -->
  