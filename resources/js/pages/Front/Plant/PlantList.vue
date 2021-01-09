<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >

<!-- <PlantSearch   :withSearch="false"/> -->
<!-- <FarmSearch  v-model="plantSelected" :withSearch="false"/> -->
 

    <b-row  v-if="masterPlants && masterPlants.length>0" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around" >

        <b-col style="padding: 15px; ">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                    <a v-if="plantTypes" v-for="t in plantTypes" :key="t.id" class="nav-item nav-link"  data-toggle="tab"  role="tab"  aria-selected="false"  v-on:click="typePlantsFilter(t.id)" v-bind:class="[ tipoPlantaId === t.id ? 'show active' : ' ' ]">{{t.name}}</a>

                </div>
            </nav>
            <div class="tab-content px-3 px-sm-0" id="nav-tabContent" style="background-color: #f8f9fa; padding-top: 15px">

                <div class="tab-pane fade show active" id="nav-Horticulas" role="tabpanel" >
                    <div class="row"  style="padding:10px;">

                        <b-col sm="3" style="padding: 0px" v-if="plantsFilter" v-for="p in plantsFilter" :key="p.id">
                         
                            <PlantCard :plant="p"/>

                        </b-col>
                    </div>
                </div>


            </div>
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

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import PlantSearch from "@/components/Plant/PlantSearch";

import NoDataContainer from "@/components/NoDataContainer";

import PlantCard from "@/components/Plant/PlantCard"

import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'

import  $bus   from '@/app';

  export default {
    name: "PlantList",
    components: {
      TerrainsOfFarm,
      PlantSearch,
      ModalToDelete,
      GreyRow,      
      NoDataContainer,
      PlantCard
    },
    props: {
          // plant: { type: String, default: null },

    },
    data() {
      return {
            title: "Plant",
            loading: false,
            plantsFilter: null,
            tipoPlantaId: null,

      };
    },
    watch: {
       // plantSelected: function (newPlant,oldPlant) {

       //      console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

       //      if(newPlant != oldPlant && newPlant.id != this.plant){
       //          this.$router.push({query: {...this.$route.query, plant: newPlant.id}});

       //      }
            
       //  },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
            
            masterPlants(){
                return Plant.query().where('master_plant_id',null).get();
            },
            plantTypes(){
                return PlantType.query().get();
            },

            // plantsFiltered(){
            //     if(this.plant){
            //         return Farm.query().with("terrains").whereHas('terrains', (query) =>{
            //              query.with('crops').whereHas('crops', (queryC) => {

            //                console.log("tem id_plant :"+this.plant);
                          
            //               queryC.where('id_plant',parseInt(this.plant))
            //              })
            //       }).get();    
            //     }else{
            //         return Farm.query().with("terrains").with("crops").get();
            //     }
                
           
            // },
         
      },
    async created() {
        console.log("Created PlantList");

      // const googleMapApi = await GoogleMapsApiLoader({
      //   apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      // });
      // this.google = googleMapApi;

      if(this.masterPlants && this.plantTypes){
        console.log("Created PlantList call typePlantsFilter");
        this.typePlantsFilter(1);
      }

    },
    methods: {
      
        typePlantsFilter(id) {
            this.tipoPlantaId=id;
            console.log("typePlantsFilter function");
            this.plantsFilter = this.masterPlants;
            console.log("plants :"+ JSON.stringify(this.masterPlants));
            if (this.tipoPlantaId) { 
                this.plantsFilter = this.plantsFilter.filter(p => p.tipo_planta_id === id);
            }
        },
       
   
    },
    mounted () {
      console.log("Mounted PlantList");

    
      }
  };
  </script>

    <style>
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

