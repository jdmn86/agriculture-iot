<template>

<b-container style="padding: 0px" >

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Save Crop</h4>
            </b-col>
            <!-- <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col> -->
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveCrop)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="num_plantas" 
        rules="required|integer" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-num_plantas" label="num_plantas" label-for="input-num_plantas"> 
                    <b-form-input
                        id="input-num_plantas"
                        name="input-num_plantas"
                        v-model="crop.num_plantas"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-num_plantas-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-num_plantas-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="id_plant" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-id_plant" label="plant : " label-for="input-id_plant">
                   <!--  <b-form-input
                      id="input-id_plant"
                      name="input-id_plant"
                      v-model="crop.id_plant"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-id_plant-live-feedback"
                    ></b-form-input> -->
                     <b-form-select 
                        style="margin-left: 10px"
                        id="input-id_plant"
                        name="input-id_plant"
                        v-model="crop.id_plant"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-id_plant-live-feedback">         
                        <option v-for="item in plants" 
                            :key="item.id"
                            :value="item.id">
                            {{ item.name }} {{ item.nome_variedade }} 
                        </option>
                    </b-form-select> 

<b-form-invalid-feedback id="input-id_plant-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

   <ValidationProvider 
        name="id_terrain" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-id_terrain" label="terrain : " label-for="input-id_terrain">
                    <!-- <b-form-input
                      id="input-id_terrain"
                      name="input-id_terrain"
                      v-model="crop.id_terrain"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-id_terrain-live-feedback"
                    ></b-form-input> -->
                     <b-form-select 
                        style="margin-left: 10px"
                        id="input-id_terrain"
                        name="input-id_terrain"
                        v-model="crop.id_terrain"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-id_terrain-live-feedback">         
                        <option v-for="item in terrains" 
                            :key="item.id"
                            :value="item.id">
                            {{ item.name }} 
                        </option>
                    </b-form-select> 

<b-form-invalid-feedback id="input-id_terrain-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


<!--    <ValidationProvider 
        name="densidade_distribuicao_terreno" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-densidade_distribuicao_terreno" label="Localização : " label-for="input-densidade_distribuicao_terreno">
                    <b-form-input
                      id="input-densidade_distribuicao_terreno"
                      name="input-densidade_distribuicao_terreno"
                      v-model="crop.densidade_distribuicao_terreno"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-densidade_distribuicao_terreno-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-densidade_distribuicao_terreno-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider> -->

<!-- 
  <ValidationProvider 
        name="cropStage_id" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-cropStage_id" label="compasso_plantas : " label-for="input-cropStage_id">
                    <b-form-input
                      id="input-cropStage_id"
                      name="input-cropStage_id"
                      v-model="crop.cropStage_id"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-cropStage_id-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-cropStage_id-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider> -->

  <ValidationProvider 
        name="expectedProduction" 
        rules="required|integer" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-expectedProduction" label="expectedProduction : " label-for="input-expectedProduction">
                    <b-form-input
                      id="input-expectedProduction"
                      name="input-expectedProduction"
                      v-model="crop.expectedProduction"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-expectedProduction-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-expectedProduction-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


    <ValidationProvider 
        name="isSeed" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-isSeed" label="isSeed : " label-for="input-isSeed">
                   <!--  <b-form-input
                      id="input-isSeed"
                      name="input-isSeed"
                      v-model="crop.isSeed"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-isSeed-live-feedback"
                    ></b-form-input> -->
                    <b-form-checkbox
                            id="input-isSeed"
                            v-model="crop.isSeed"
                            name="input-isSeed"
                       
                          >
                    </b-form-checkbox>

<b-form-invalid-feedback id="input-isSeed-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>





          </b-form>
        </validation-observer>

         <ModalToConfirm  v-can="'crop-create'" v-if="crop" :name="crop.crop_day" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="saveCrop">Confirmar</button>
            </template>

        </ModalToConfirm>

        <!--   <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'farm-create'" type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
               
          </b-row> -->

      </b-container>

      </b-col>
<!-- 
    </template>

            </BodyContainer>
</div> -->
</b-row>
</b-container>
  </template>
  
  <script>

// import {FarmService} from "@/services/FarmService"; 
import Plant from '@/models/Plant'
import PlantPlague from '@/models/PlantPlague'
import PlantStage from '@/models/PlantStage'
import Crop from '@/models/Crop'
import Terrain from '@/models/Terrain'

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

  export default {
    name: "CropCreate",
    components: {
      HeadContainer,
        BodyContainer,
      ModalToConfirm
    },
    // props: ['plantReceive'], 
    // {
        // farmId: { type: String, default: null },
      // },
    data() {
      return {        
          title: "Crop Create",
          loading: false, 
          crop: {
               num_plantas: null,
               id_plant: null,
               id_terrain: null,
               densidade_distribuicao_terreno: null,
               cropStage_id: null,
               expectedProduction: null,
               isSeed: null,
               
            },     
         
    }
  },

    computed : {
      terrains() {
         return Terrain.all() ;
      },

      plants(){
         return Plant.all() ;
      }
    
    },
    created() {
      // this.plant = this.plantReceive;

        // this.plant.nome_variedade = item.nome_variedade;
        // this.plant.master_plant_id=this.plantReceive.id;
        // this.plant.name = this.plantReceive.name;
        // this.plant.name_cientifico = this.plantReceive.name_cientifico;
        // this.plant.tipo_planta_id = this.plantReceive.tipo_planta_id;
        // this.plant.fracao_esgotamento_agua_solo_conforto_hidrico= this.plantReceive.fracao_esgotamento_agua_solo_conforto_hidrico;
        //  this.plant.ph_min= this.plantReceive.ph_min;
        //  this.plant.ph_max= this.plantReceive.ph_max;
        //  this.plant.compasso_plantas= this.plantReceive.compasso_plantas;
        //  this.plant.compasso_linhas= this.plantReceive.compasso_linhas;
        //  this.plant.fotoperiodo= this.plantReceive.fotoperiodo;
        //  this.plant.image= this.plantReceive.image;
        //  this.plant.water_consumption= this.plantReceive.water_consumption;
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },

      async saveCrop(){      

        try {
             this.loading = true;

              const result = await Crop.api().post('crop',this.crop)

              // await PlantPlague.api().get('plantPlague');
              // await PlantStage.api().get('plantStage');

                this.$router.push({path: '/front/crop/'+result.response.data.id});
              
          } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);

                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                
          }

      },

    },
    mounted () {
        console.log("Mounted CropCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  