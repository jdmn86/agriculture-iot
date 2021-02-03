<template>

<!--    <div >

            <HeadContainer :title="title"/>

            <BodyContainer :loading.sync="loading"> 

             <template slot="body" >  -->

    <b-col sm="6" >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Add New Employee</h4>
            </b-col>
            <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(saveEmployee)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="name" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-name" label="Name" label-for="input-name"> 
                    <b-form-input
                        id="input-name"
                        name="input-name"
                        v-model="user.name"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-name-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-name-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


  <ValidationProvider  
            name="email" 
            rules="required|email" 
            v-slot=" validationContext ">
              <b-form-group  id="input-group-email" label="Email" label-for="input-email" style="margin:20px"> 
                <b-form-input
                    id="input-email" 
                    name="input-email"
                    v-model="user.email"
                    :state="getValidationState(validationContext)"
                    aria-describedby="input-email-live-feedback"
                ></b-form-input>

        <b-form-invalid-feedback id="input-email-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
    </ValidationProvider>


 <!-- <ValidationProvider 
            name="password" 
            rules="required|min:3" 
            v-slot=" validationContext ">
              <b-form-group  id="input-group-password" label="Password" label-for="input-password" style="margin:20px"> 
                <b-form-input
                    id="input-password"
                    name="input-password"
                    v-model="credentials.password"
                    :state="getValidationState(validationContext)"
                    aria-describedby="input-password-live-feedback"
                    type="password"
                ></b-form-input>

        <b-form-invalid-feedback id="input-password-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
    </ValidationProvider> -->

          </b-form>
        </validation-observer>

         <ModalToConfirm  v-can="'user-create'" v-if="user" :name="user.name" :isTo="'save'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="saveEmployee">Confirmar</button>
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
import User from '@/models/User'

import  $bus   from '@/app';

import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

import Auth from '@/models/Auth'

  export default {
    name: "EmployeeCreate",
    components: {
      HeadContainer,
        BodyContainer,
      ModalToConfirm
    },
    props: {
        // farmId: { type: String, default: null },
      },
    data() {
      return {        
          title: "Employee Create",
          loading: false, 
          user: {
            
            name: null,
            email: null,
            company_id: null,
            // password: null,
          },
          id: null,
         
    }
  },

    computed : {
      auth(){
            return Auth.query().first();
      },
    
    },
    created() {
      
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },

      async saveEmployee(){      

        try {
             this.loading = true;
             
             this.user.company_id = this.auth.company_id;

              const result = await User.api().post('user',this.user)

                this.$router.push({name: 'user'});
              
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
        console.log("Mounted EmployeeCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  