<template>
   
<b-col>

    <b-row>
        <FarmDetails v-can="'farm-list'" :farmSelected="farmSelected" >
                <template slot="edit" v-if="auth.mode">

                    <b-button  v-can="'farm-edit'" @click="$router.push({name:'farmEdit', params: { farmId: farmSelected.id } })" variant="light" block style=" border-color: #795427;color: #795427;">Edit Farm</b-button>

                </template>
                
                <template v-can="'farm-delete'" slot="delete" v-if="auth.mode">

                   
                    

                    <ModalToDelete  v-can="'farm-delete'"   >
                        <template slot="deleteButton">
                             <button type="button"  class="btn btn-danger" @click="onConfirmDelete">Confirmar</button>
                        </template>
                    </ModalToDelete>
                     

                </template>
                
        </FarmDetails>
    
        <TerrainsOfFarm  :terrains="terrains"  /> 

</b-row>

</b-col>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

import TerrainsOfFarm from "./TerrainsOfFarm";
import FarmDetails from './FarmDetails';

import {FarmService} from "@/services/FarmService";
import {TerrainService} from "@/services/TerrainService"; 

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: "FarmShow",
    components: {
      TerrainsOfFarm,
      FarmDetails,
      ModalToDelete,
    },
    props: {
        farmSelected: { type: Object, default: null },

    },
    data() {
      return {
            title: "Farms",
            loading: false,

      };
    },
    watch: {

      
    
    },
    computed : {
          
           farms(){
                return Farm.all();
           
            },
          terrains: function () {
                console.log("computed terrains");
                if(this.farmSelected){
                  return Terrain.query().where('farm_id', this.farmSelected.id).get()  
                }
                
                
          },
           
            auth(){
                return Auth.query().first();
            },
         
      },
    created() {
      console.log("Created FarmShow");
       this.fetchTerrains().
            then(() => {
            

            });
               
    },
    methods: {
   
      async onConfirmDelete(){

          console.log("on confirm FarmShow");
          try {
            this.loading = true;
                  const { data } = await FarmService.remove(this.farmSelected.id);
                   Farm.delete(this.farmSelected.id);
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false

      
               
            }

      },     
      
      async fetchTerrains () {

              this.loading = true

            try {
                    const { data } = await TerrainService.getList();
                    Terrain.insert({data: data});
                    console.log("Terrain :"+JSON.stringify(data));
                    
            } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
            } finally {
                    this.loading = false
            }

        }
    },
    mounted () {
      console.log("Mounted FarmShow");


    
      }
  };
  </script>

  <style>
  </style>
