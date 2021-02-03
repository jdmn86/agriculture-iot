  <template>

      <b-col cols="6" style="margin: 10px; background-color: #f8f9fa;">

            <b-row v-if="crop.plant" align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
                <h4 >{{crop.plant.name}}</h4>
    
            </b-row> 

            <b-row  style="padding: 10px; " align-h="between" align-v="center">
                 <b-col cols="auto">
                    <h5 class="card-text">num_plantas :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.num_plantas}}</p>
                  </b-col>
              <!--   <h4 style="margin: 5px" id="localizacao" class="">{{device.localizacao}}</h4> -->
                 
            </b-row> 

            <b-row v-if="crop.terrain" style="padding: 10px; " align-h="between" align-v="center">
                <b-col cols="auto">
                    <h5 class="card-text">terrain :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.terrain.name}}</p>
                  </b-col>
              
           <!--      <h4 style="margin: 5px" id="deviceType" class="">{{device.deviceType.name}} </h4> -->
              
            </b-row>

     <!--         <b-row style="padding: 10px" align-h="center" align-v="center">
              
                <h4 style="margin: 5px" id="coordenadas" class="">{{device.lat}},{{device.lng}} </h4>
              
            </b-row> -->

               <b-row style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">densidade_distribuicao_terreno :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.densidade_distribuicao_terreno}}</p>
                  </b-col>
              <!--   <h4 style="margin: 5px" id="coordenadas" class="">{{device.uptime}} </h4> -->
              
            </b-row>

              <b-row v-if="crop.stage" style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">stage :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.stage.GrowthStageName}} </p>
                  </b-col>
           <!--      <h4 style="margin: 5px" id="coordenadas" class="">{{device.battery_status}} </h4> -->
              
            </b-row>

              <b-row style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">expectedProduction :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.expectedProduction}}</p>
                  </b-col>
        <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
              
            </b-row>

            <b-row style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">start_crop_date :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.start_crop_date}}</p>
                  </b-col>
        <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
              
            </b-row>

            <b-row style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">crop_day :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <p class="card-text">{{crop.crop_day}}</p>
                  </b-col>
        <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
              
            </b-row>

             <b-row style="padding: 10px; " align-h="between" align-v="center">
                     <b-col cols="auto">
                    <h5 class="card-text">Enabled :</h5>
                  </b-col>
                  <b-col cols="auto">
                    <b-form-checkbox v-model="crop.enabled" @change="enabledDevice"name="check-button" switch>
                           
                        </b-form-checkbox>
                  </b-col>
        <!--         <h4 style="margin: 5px" id="coordenadas" class="">{{device.num_reads}} </h4> -->
              
            </b-row>

           <!--    <b-row style="padding: 10px" align-h="center" align-v="center">
              
                <h4 style="margin: 5px" id="coordenadas" class="">{{device.enabled}} </h4>
              
            </b-row> -->

            
             

             <b-row style="padding: 10px; " align-h="between" align-v="center">

                <b-col v-if="!harvest" align-h="center">
                    <b-button   @click="harvest = !harvest" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Harvest</b-button>                             
                </b-col>
              
            </b-row>

            

            <b-row v-if="harvest" style="padding: 10px; " align-h="between" align-v="center">

               <HarvestCreate :crop="crop"/>
              
            </b-row>


             <b-row v-if="auth.mode" style="padding: 10px; " align-h="between" align-v="center">

                   <ModalToConfirm  v-can="'crop-edit'" v-if="crop" :name="crop.plant.name" :isTo="'Finish Crop'">
                            
                    <template slot="confirmButton">
                         <button type="button"  class="btn btn-danger" @click="finishCrop">Finish Crop</button>
                    </template>

                </ModalToConfirm>
              
            </b-row>

             <b-row v-if="auth.mode" style="padding: 10px; " align-h="between" align-v="center">
                <ModalToDelete  v-can="'crop-delete'"   >
                    <template slot="deleteButton">
                         <button type="button"  class="btn btn-danger" @click="onConfirmDelete">Confirmar</button>
                    </template>
                </ModalToDelete>
            </b-row>

        </b-col>

       
   <!-- </b-row> -->


</template>


<script>

import ModalToDelete from "@/components/ModalToDelete";
import HarvestCreate from "@/components/Crop/OverAll/HarvestCreate";
import ModalToConfirm from "@/components/ModalToConfirm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

      export default {
        name: "CropDetails",
        components: {  
          ModalToDelete,
          HarvestCreate,
          ModalToConfirm
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                harvest: false,
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
          finishCrop(){
                try {
            this.loading = true;
                Crop.api().patch('crop/'+this.crop.id+'/finish/',this.crop);
                  // const { data } = await FarmService.remove(this.farmSelected.id);
                  //  Farm.delete(this.farmSelected.id);
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false

      
               
            }
          },
          addPlagueToCrop(){
                
                try {
            this.loading = true;
                Farm.api().delete('cropPlague/'+this.farmId,{delete: this.farmId});
                  // const { data } = await FarmService.remove(this.farmSelected.id);
                  //  Farm.delete(this.farmSelected.id);
                 
                  this.$bvModal.hide('ModalToDelete')
            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                this.loading = false

      
               
            }
          },
          enabledDevice(){

          },
            async onConfirmDelete(){

          console.log("on confirm FarmShow");
          try {
            this.loading = true;
                Farm.api().delete('farm/'+this.farmId,{delete: this.farmId});
                  // const { data } = await FarmService.remove(this.farmSelected.id);
                  //  Farm.delete(this.farmSelected.id);
                 
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
            console.log("Mounted CropDetails");
          }
      };
      </script>
      
      <style>
      </style>
      