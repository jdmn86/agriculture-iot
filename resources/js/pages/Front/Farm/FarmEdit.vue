<template>
    
 <b-col>

    <b-row>

    <b-col sm="6"   >
      <b-container fluid  style=" background-color: white; margin: 0px; ">
          <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-3">
              <h4 >Edit Farm</h4>
            </b-col>
            <b-col cols="auto" class="p-3" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(updateFarm)" style="margin-top: 40px;margin-left: 25px">


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

                <b-button v-can="'farm-edit'" type="submit" btn-block @click="updateFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button>

               
          </b-row>

      </b-container>
      </b-col>
    </b-row>
</b-row>

</b-col>
    
  </template>
  
  <script>

import {FarmService} from "@/services/FarmService"; 
import Farm from '@/models/Farm'

import  $bus   from '@/app';

  export default {
    name: "FarmEdit",
    components: {
  
    },
    props: {
        farmSelected: { type: Object, default: null },
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
      farmToEdit: function(){
        return this.$route.params.farmId ;
      }
    },
    created() {
        if(this.$route.params.farmId){
          
          console.log("parmID : " +JSON.stringify(this.$route.params.farmId));
            let f =  Farm.query().find(this.$route.params.farmId);
            console.log("f : " +JSON.stringify(f));
            this.farm =f ;
            this.id = f.id; 
            
        }
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },
     
      async updateFarm(){
        try {
          console.log("this.farm.id"+this.id);
              const { data } = await FarmService.update(this.id,this.farm);
                // this.updateFarm(data);
                Farm.update({where: data.id,data: {data}});

                this.$router.push({path: '/front/farm/'+data.id});
          } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                
          }

      },


      async fetchData () {

            this.loading = true

      }
    },
    mounted () {
        console.log("Mounted FarmEdit.vue");
      }
  };
  </script>
  
  <style>
  </style>
  