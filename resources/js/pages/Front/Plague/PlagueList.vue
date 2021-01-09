<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >


<!-- <FarmSearch  v-model="plantSelected" :withSearch="true"/> -->
 

  <!-- <div class="container-fluid" > -->
  

     <b-row v-if="plagues && plagues.length>0 " style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <!-- <b-container fluid  style="; background-color: #f8f9fa; margin: 0px; "> -->
        <!-- <div class="row " > --> 

  <b-col style="padding: 15px; ">
            
             <!-- <div class="container"> -->  
              <!-- <div class="row"> -->
                <!-- <div class="col" style="padding: 15px; "> -->
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                      <a v-if="plagueType"  v-for="t in plagueType" :key="t.id" class="nav-item nav-link"  data-toggle="tab"  role="tab"  aria-selected="false" v-on:click="plagueTypeFilter(t.id)"  v-bind:class="[ plagueTypeId === t.id ? 'show active' : ' ' ]">{{t.name}}</a>

                                
                    </div>
                  </nav>
                  <div class="tab-content px-3 px-sm-0" id="nav-tabContent" style="background-color: #f8f9fa; padding-top: 15px">
                    
                    <div class="tab-pane fade show active"  role="tabpanel" >

                      
                      <div class="row"  style="padding:10px;">

                            <b-col sm="3" style="padding: 0px" v-if="plaguesFilter" v-for="plague in plaguesFilter" :key="plague.id">
                                
                                <PlagueCard :plague="plague"/>

                                </b-col>
                          </div>
                      </div>


                    </div>
                    
                  <!-- </div> -->
              </b-col>
                
                <!-- </div> -->
            </b-row>


      <!-- </b-container> -->
        
    <!-- </b-row> -->






      
<!-- 
</div>
</div>
</div> -->



</b-container>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import FarmDetails from '@/components/Farm/FarmDetails';
import FarmSearch from "@/components/Farm/FarmSearch";

import NoDataContainer from "@/components/NoDataContainer";

import PlagueCard from "@/components/Plague/PlagueCard";

import GreyRow from "@/wrapper/GreyRow"

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import PlantType from '@/models/PlantType'
import PlantStage from '@/models/PlantStage'
import Plague from '@/models/Plague'
import PlantPlague from '@/models/PlantPlague'
import PlaguePlantsPartsAnatomy from '@/models/PlaguePlantsPartsAnatomy'
import PlantPartsAnatomy from '@/models/PlantPartsAnatomy'
import PlagueType from '@/models/PlagueType'

import  $bus   from '@/app';

  export default {
    name: "PlagueList",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
      GreyRow,
      FarmSearch,
      NoDataContainer,
      PlagueCard
    },
    props: {
          // plant: { type: String, default: null },

    },
    data() {
      return {
            title: "PlagueList",
            loading: false,
            plaguesFilter: null,
            plagueTypeId: 1,

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
            plagueType(){
                return PlagueType.query().get();
            },
            plagues(){
               return  Plague.query().get();
            },
            // farmsFiltered(){
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
      console.log("Created PlagueList");

       if(this.plagues && this.plagueType){
        this.plagueTypeFilter(1);
      }
      // if(this.plagues && this.plagueType){
      //   console.log("Created PlantList call typePlantsFilter");
      //   this.typePlantsFilter(1);
      // }
      // const googleMapApi = await GoogleMapsApiLoader({
      //   apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      // });
      // this.google = googleMapApi;

      // if(this.plant){
      //   this.plantSelected = Plant.query().find(this.plant);
      // }

    },
    methods: {

         plagueTypeFilter(id) {
            this.plagueTypeId=id;
            console.log("plagueTypeFilter function");
            this.plaguesFilter = this.plagues;
            console.log("plants :"+ JSON.stringify(this.plagues));
            if (this.plagueTypeId) { 
                this.plaguesFilter = this.plaguesFilter.filter(p => p.plagueType_id === id);
            }
        },
      
      // async onConfirmDelete(farm){

      //     console.log("on confirm FarmShow");
      //     try {
      //           this.loading = true;
                 
      //           Farm.api().delete('farm/'+farm.id);

      //           this.$bvModal.hide('ModalToDelete')
      //       } catch (e) {
      //           this.$bus.$emit('warningFixTop', e.message);
      //           this.error = e.message
      //           console.log(e)
      //       } finally {

      //           this.loading = false
               
      //       }

      // },     
   
    },
    mounted () {
      console.log("Mounted PlagueList");

    
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

