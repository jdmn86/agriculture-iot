<template>

   <div >

            <HeadContainer :title="title"/>

            <BodyContainer :loading.sync="loading"> 

             <template slot="body" > 

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Add New Farm</h4>
            </b-col>
            <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveFarm)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="designacao" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-designacao" label="Designação" label-for="input-designacao"> 
                    <b-form-input
                        id="input-designacao"
                        name="input-designacao"
                        v-model="farm.name"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-designacao-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-designacao-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="localizacao" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-localizacao" label="Localização : " label-for="input-localizacao">
                    <b-form-input
                      id="input-localizacao"
                      name="input-localizacao"
                      v-model="farm.localizacao"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-localzacao-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-designacao-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


          </b-form>
        </validation-observer>
          <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'farm-create'" type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
               
          </b-row>

      </b-container>

      </b-col>

    </template>

            </BodyContainer>
</div>
  </template>
  
  <script>

import {FarmService} from "@/services/FarmService"; 
import Farm from '@/models/Farm'

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";


  export default {
    name: "FarmCreate",
    components: {
      HeadContainer,
        BodyContainer,
    
    },
    props: {
        // farmSelected: { type: Object, default: null },
      },
    data() {
      return {        
          title: "Farms Create",
          loading: false, 
          farm: {
            
            name: null,
            localizacao: null,
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

      async saveFarm(){      

        try {
             this.loading = true;

              const { data } = await FarmService.create(this.farm);
                
                console.log("response :"+JSON.stringify(data))
                Farm.insert({data: data});
                
                this.$router.push({path: '/front/farm/'+data.id});
              
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
        console.log("Mounted FarmCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  