<template>

<!--    <div >

            <HeadContainer :title="title"/>

            <BodyContainer :loading.sync="loading"> 

             <template slot="body" >  -->

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >New Variety</h4>
            </b-col>
            <!-- <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col> -->
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveVariety)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="nome_variedade" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-nome_variedade" label="Name Variety" label-for="input-nome_variedade"> 
                    <b-form-input
                        id="input-nome_variedade"
                        name="input-nome_variedade"
                        v-model="plant.nome_variedade"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-nome_variedade-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-nome_variedade-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="fracao_esgotamento_agua_solo_conforto_hidrico" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-fracao_esgotamento_agua_solo_conforto_hidrico" label="fracao_esgotamento_agua_solo_conforto_hidrico : " label-for="input-fracao_esgotamento_agua_solo_conforto_hidrico">
                    <b-form-input
                      id="input-fracao_esgotamento_agua_solo_conforto_hidrico"
                      name="input-fracao_esgotamento_agua_solo_conforto_hidrico"
                      v-model="plant.fracao_esgotamento_agua_solo_conforto_hidrico"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-fracao_esgotamento_agua_solo_conforto_hidrico-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-fracao_esgotamento_agua_solo_conforto_hidrico-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

   <ValidationProvider 
        name="ph_min" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-ph_min" label="Localização : " label-for="input-ph_min">
                    <b-form-input
                      id="input-ph_min"
                      name="input-ph_min"
                      v-model="plant.ph_min"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-ph_min-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-ph_min-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


   <ValidationProvider 
        name="ph_max" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-ph_max" label="Localização : " label-for="input-ph_max">
                    <b-form-input
                      id="input-ph_max"
                      name="input-ph_max"
                      v-model="plant.ph_max"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-ph_max-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-ph_max-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="compasso_plantas" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-compasso_plantas" label="compasso_plantas : " label-for="input-compasso_plantas">
                    <b-form-input
                      id="input-compasso_plantas"
                      name="input-compasso_plantas"
                      v-model="plant.compasso_plantas"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-compasso_plantas-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-compasso_plantas-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="compasso_linhas" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-compasso_linhas" label="compasso_linhas : " label-for="input-compasso_linhas">
                    <b-form-input
                      id="input-compasso_linhas"
                      name="input-compasso_linhas"
                      v-model="plant.compasso_linhas"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-compasso_linhas-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-compasso_linhas-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="fotoperiodo" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-fotoperiodo" label="fotoperiodo : " label-for="input-fotoperiodo">
                    <b-form-input
                      id="input-fotoperiodo"
                      name="input-fotoperiodo"
                      v-model="plant.fotoperiodo"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-fotoperiodo-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-fotoperiodo-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="water_consumption" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-water_consumption" label="water_consumption : " label-for="input-water_consumption">
                    <b-form-input
                      id="input-water_consumption"
                      name="input-water_consumption"
                      v-model="plant.water_consumption"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-water_consumption-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-water_consumption-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

          </b-form>
        </validation-observer>

         <ModalToConfirm  v-can="'variety-create'" v-if="plant" :name="plant.nome_variedade" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="saveVariety">Confirmar</button>
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
  </template>
  
  <script>

// import {FarmService} from "@/services/FarmService"; 
import Plant from '@/models/Plant'
import PlantPlague from '@/models/PlantPlague'
import PlantStage from '@/models/PlantStage'

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

  export default {
    name: "VarietyCreate",
    components: {
      HeadContainer,
        BodyContainer,
      ModalToConfirm
    },
    props: ['plantReceive'], 
    // {
        // farmId: { type: String, default: null },
      // },
    data() {
      return {        
          title: "Variety Create",
          loading: false, 
            plant:{
                   name: null,
                   master_plant_id: null,
                   nome_variedade: null,
                   name_cientifico: null,
                   tipo_planta_id: null,
                   fracao_esgotamento_agua_solo_conforto_hidrico: null,
                   ph_min: null,
                   ph_max: null,
                   compasso_plantas: null,
                   compasso_linhas: null,
                   fotoperiodo: null,
                   image: null,
                   water_consumption: null,
                   company_id: null,
                },     
         
    }
  },

    computed : {
    
    },
    created() {
      // this.plant = this.plantReceive;

        // this.plant.nome_variedade = item.nome_variedade;
        this.plant.master_plant_id=this.plantReceive.id;
        this.plant.name = this.plantReceive.name;
        this.plant.name_cientifico = this.plantReceive.name_cientifico;
        this.plant.tipo_planta_id = this.plantReceive.tipo_planta_id;
        this.plant.fracao_esgotamento_agua_solo_conforto_hidrico= this.plantReceive.fracao_esgotamento_agua_solo_conforto_hidrico;
         this.plant.ph_min= this.plantReceive.ph_min;
         this.plant.ph_max= this.plantReceive.ph_max;
         this.plant.compasso_plantas= this.plantReceive.compasso_plantas;
         this.plant.compasso_linhas= this.plantReceive.compasso_linhas;
         this.plant.fotoperiodo= this.plantReceive.fotoperiodo;
         this.plant.image= this.plantReceive.image;
         this.plant.water_consumption= this.plantReceive.water_consumption;
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },

      async saveVariety(){      

        try {
             this.loading = true;



              const result = await Plant.api().post('plant/'+this.plantReceive.id+'/variety',this.plant)

              await PlantPlague.api().get('plantPlague');
              await PlantStage.api().get('plantStage');

                this.$router.push({path: '/front/plant/'+result.response.data.id});
              
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
        console.log("Mounted VarietyCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  