<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >


<FarmSearch  v-model="plantSelected" :withSearch="true"/>
 

    <b-row v-if="farmsFiltered && farmsFiltered.length>0" cols="1" cols-sm="1" cols-md="1" cols-lg="2" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col v-can="'farm-list'" style=" color: black; padding: 0px"  
                        v-for="f in farmsFiltered" :key="f.id">    

            <FarmDetails :farm="f" :google="google">
                    
                    <template v-can="'farm-delete'" slot="delete" v-if="auth.mode">

                      <ModalToDelete v-can="'farm-delete'" >
                          <template slot="deleteButton">
                               <button type="button"  class="btn btn-danger" @click="onConfirmDelete(f)">Confirmar</button>
                          </template>
                      </ModalToDelete>
                         
                    </template>
                    
            </FarmDetails>

        </b-col>
    </b-row>

     <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
        </slot>
    </NoDataContainer>


</b-container>
</template>
                
<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
import ModalToDelete from "@/components/ModalToDelete";

import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import FarmDetails from '@/components/Farm/FarmDetails';
import FarmSearch from "@/components/Farm/FarmSearch";

import NoDataContainer from "@/components/NoDataContainer";

import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

  export default {
    name: "FarmList",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
      GreyRow,
      FarmSearch,
      NoDataContainer
    },
    props: {
          plant: { type: String, default: null },

    },
    data() {
      return {
            title: "Farms",
            loading: false,
            google: null,            
            // farmsFiltered: null,
            plantSelected: null,

      };
    },
    watch: {
       plantSelected: function (newPlant,oldPlant) {

            console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

            if(newPlant != oldPlant && newPlant.id != this.plant){
                this.$router.push({query: {...this.$route.query, plant: newPlant.id}});

            }
            
        },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
          
            farmsFiltered(){
                if(this.plant){
                    return Farm.query().with("terrains").whereHas('terrains', (query) =>{
                         query.with('crops').whereHas('crops', (queryC) => {

                           console.log("tem id_plant :"+this.plant);
                          
                          queryC.where('id_plant',parseInt(this.plant))
                         })
                  }).get();    
                }else{
                    return Farm.query().with("terrains").with("crops").get();
                }
                
           
            },
         
      },
    async created() {
      console.log("Created FarmList");

      const googleMapApi = await GoogleMapsApiLoader({
        apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
      });
      this.google = googleMapApi;

      if(this.plant){
        this.plantSelected = Plant.query().find(this.plant);
      }

    },
    methods: {
      
      async onConfirmDelete(farm){

          console.log("on confirm FarmShow");
          try {
                this.loading = true;
                 
                Farm.api().delete('farm/'+farm.id);

                this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {

                this.loading = false
               
            }

      },     
   
    },
    mounted () {
      console.log("Mounted FarmList");

    
      }
  };
  </script>

  <style>
  </style>
