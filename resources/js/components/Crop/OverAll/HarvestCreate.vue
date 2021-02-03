<template>

<!--    <div >

            <HeadContainer :title="title"/>

            <BodyContainer :loading.sync="loading"> 

             <template slot="body" >  -->

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Harvest</h4>
            </b-col>
            <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveHarvest)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="kg" 
        rules="required|double:0" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-kg" label="Quantity harvest" label-for="input-kg"> 
                    <b-form-input
                        id="input-kg"
                        name="input-kg"
                        v-model="harvest.kg"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-kg-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-kg-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="hectars" 
        rules="required|double:0" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-hectars" label="Hectar : " label-for="input-hectars">
                    <b-form-input
                      id="input-hectars"
                      name="input-hectars"
                      v-model="harvest.hectars"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-localzacao-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-hectars-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


          </b-form>
        </validation-observer>

         <ModalToConfirm  v-can="'harvest-create'" v-if="harvest" :name="crop.plant.name" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="saveHarvest">Confirmar</button>
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
import Harvest from '@/models/Harvest'

import  $bus   from '@/app';

// import HeadContainer from "@/wrapper/HeadContainer";
// import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

  export default {
    name: "HarvestCreate",
    components: {
        // HeadContainer,
        // BodyContainer,
        ModalToConfirm
    },
    props: {
        crop: { type: Object, default: null },
      },
    data() {
      return {        
          title: "HarvestCreate",
          loading: false, 
          harvest: {
            crop_id: null , 
            kg: null,
            hectars: null,
          },
          id: null,
         
    }
  },

    computed : {
    
    },
    created() {
      
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },

      async saveHarvest(){      

        try {
             this.loading = true;

             this.harvest.crop_id = this.crop.id;

              const result = await Harvest.api().post('harvest',this.harvest)

                // this.$router.push({path: '/front/farm/'+result.response.data.id});
              
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
        console.log("Mounted HarvestCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  