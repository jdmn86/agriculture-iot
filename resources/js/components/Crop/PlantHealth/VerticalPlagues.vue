<template>

     <b-col  style="margin: 10px; background-color: #f8f9fa;">

            <b-row  align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
               <h4 >Plagues/Diseases</h4>
    
            </b-row> 

             <b-row  style="padding: 10px; " align-h="between" align-v="center">
                
                 <b-list-group v-if="plagues && plagues.length>0" id="container" class="shadow-sm" >
                    <b-list-group-item button style="padding: 20px;
                  border: 1px solid #745220;
                  border-radius: 5px;"  v-for="p in plagues" :key="p.id"  > 
                      <b-row class="justify-content-md-center"   >
                        <b-col >
                            <p>Name</p>
                        </b-col>
                        <b-col >
                            <h4>{{p.nome_comum}}</h4>    
                        </b-col>
                        <!-- <b-col cols="3">
                            <h4>{{item.area}}</h4>    
                        </b-col>
                        <b-col cols="2"> 
                            <b-button  @click="goTerrain(item.id)" variant="light" style=" border-color: #4AAD37;background-color: #4AAD37">Show more</b-button>
                        </b-col> -->
                      </b-row>
                       
                    </b-list-group-item>
                
                  </b-list-group>

                 <NoDataContainer v-else :title="title" >
                   <slot >
                      <b-button v-can="'cropPlague-create'" @click="$router.push({name: 'addPlague'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Plague</b-button>
                  </slot>
                </NoDataContainer> 

            </b-row>

        </b-col>

   

        
</template>

<script>
import NoDataContainer from "@/components/NoDataContainer";
// import ModalToDelete from "@/components/ModalToDelete";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

      export default {
        name: "VerticalPlagues",
        components: {  
          // ModalToDelete,
          NoDataContainer
        },
        props: {
            plagues: { type: Array, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                title: "Crops",
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            

          },
        created() {
        },
        methods: {
          // colher(){

          // },
          // addPlagueToCrop(){
                
          //       try {
          //   this.loading = true;
          //       Farm.api().delete('cropPlague/'+this.farmId,{delete: this.farmId});
          //         // const { data } = await FarmService.remove(this.farmSelected.id);
          //         //  Farm.delete(this.farmSelected.id);
                 
          //         this.$bvModal.hide('ModalToDelete')
          //   } catch (e) {
          //         this.$bus.$emit('warningFixTop', e.message);
          //         this.error = e.message
          //         console.log(e)
          //   } finally {

          //       this.loading = false

      
               
          //   }
          // },
          // enabledDevice(){

          // },
          //   async onConfirmDelete(){

          // console.log("on confirm FarmShow");
          // try {
          //   this.loading = true;
          //       Farm.api().delete('farm/'+this.farmId,{delete: this.farmId});
          //         // const { data } = await FarmService.remove(this.farmSelected.id);
          //         //  Farm.delete(this.farmSelected.id);
                 
          //         this.$bvModal.hide('ModalToDelete')
          //   } catch (e) {
          //         this.$bus.$emit('warningFixTop', e.message);
          //         this.error = e.message
          //         console.log(e)
          //   } finally {

          //       this.loading = false

      
               
          //   }

      // },     
      
        },
        mounted () {
            console.log("Mounted VerticalPlagues");
          }
      };
      </script>
      
      <style>
      </style>