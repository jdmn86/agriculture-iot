<template>

<b-container style="padding: 0px" >

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Save Plague</h4>
            </b-col>
            <!-- <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col> -->
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(savePlague)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="nome_comum" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-nome_comum" label="Name Variety" label-for="input-nome_comum"> 
                    <b-form-input
                        id="input-nome_comum"
                        name="input-nome_comum"
                        v-model="plague.nome_comum"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-nome_comum-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-nome_comum-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="nome_cientifico" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-nome_cientifico" label="nome_cientifico : " label-for="input-nome_cientifico">
                    <b-form-input
                      id="input-nome_cientifico"
                      name="input-nome_cientifico"
                      v-model="plague.nome_cientifico"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-nome_cientifico-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-nome_cientifico-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

   <ValidationProvider 
        name="cause" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-cause" label="Localização : " label-for="input-cause">
                    <b-form-input
                      id="input-cause"
                      name="input-cause"
                      v-model="plague.cause"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-cause-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-cause-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


   <ValidationProvider 
        name="comments" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-comments" label="Localização : " label-for="input-comments">
                    <b-form-input
                      id="input-comments"
                      name="input-comments"
                      v-model="plague.comments"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-comments-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-comments-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


  <ValidationProvider 
        name="management" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-management" label="compasso_plantas : " label-for="input-management">
                    <b-form-input
                      id="input-management"
                      name="input-management"
                      v-model="plague.management"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-management-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-management-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>

  <ValidationProvider 
        name="symptoms" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-symptoms" label="compasso_linhas : " label-for="input-symptoms">
                    <b-form-input
                      id="input-symptoms"
                      name="input-symptoms"
                      v-model="plague.symptoms"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-symptoms-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-symptoms-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>



          </b-form>
        </validation-observer>

         <ModalToConfirm  v-can="'plague-create'" v-if="plague" :name="plague.nome_comum" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="savePlague">Confirmar</button>
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

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

  export default {
    name: "PlagueCreate",
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
          title: "Plague Create",
          loading: false, 
          plague: {
               nome_comum: null,
               nome_cientifico: null,
               plagueType_id: null,
               cause: null,
               comments: null,
               management: null,
               symptoms: null,
               image: null,
               company_id: null,
               
            },     
         
    }
  },

    computed : {
    
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

      async savePlague(){      

        try {
             this.loading = true;

              const result = await Plant.api().post('plague',this.plague)

              // await PlantPlague.api().get('plantPlague');
              // await PlantStage.api().get('plantStage');

                this.$router.push({path: '/front/plague/'+result.response.data.id});
              
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
        console.log("Mounted plagueCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  