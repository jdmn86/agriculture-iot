<template>
 <b-col  >

      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
          <b-row align-h="center" align-v="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-1">
              <h4 >Change Password</h4>
            </b-col>
            <!-- <b-col cols="auto" class="p-1" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/> 
              </a>
            </b-col> -->
          </b-row> 

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(changePassword)" style="margin-top: 40px;margin-left: 25px">

         <ValidationProvider 
        name="oldPassword" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-oldPassword" label="oldPassword:" label-for="input-oldPassword"> 
                    <b-form-input
                        id="input-oldPassword"
                        name="input-oldPassword"
                        v-model="newCredentials.oldPassword"
                        type="password"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-oldPassword-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-oldPassword-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>

      <ValidationProvider 
        name="password" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-password" label="Password:" label-for="input-password"> 
                    <b-form-input
                        id="input-password"
                        name="input-password"
                        v-model="newCredentials.password"
                        type="password"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-password-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-password-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <ValidationProvider 
        name="password_confirmation" 
        rules="required|min:3" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-password_confirmation" label="password_confirmation : " label-for="input-password_confirmation">
                    <b-form-input
                      id="input-password_confirmation"
                      name="input-password_confirmation"
                      v-model="newCredentials.password_confirmation"
                      type="password"
                      :state="getValidationState(validationContext)"
                      aria-describedby="input-password_confirmation-live-feedback"
                    ></b-form-input>

<b-form-invalid-feedback id="input-password_confirmation-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>


                  </b-form-group>
  </ValidationProvider>


          </b-form>
        </validation-observer>

         <ModalToConfirm   :name="'password'" :isTo="'change'">
                            
            <template slot="confirmButton">
                 <button type="button"  class="btn btn-danger" @click="changePassword">Confirmar</button>
            </template>

        </ModalToConfirm>

        <!--   <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'farm-create'" type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
               
          </b-row> -->

      </b-container>

      </b-col>

</template>
  
<script>
import ModalToConfirm from "@/components/ModalToConfirm";

import Terrain from '@/models/Terrain'
import Plant from '@/models/Plant'
import Farm from '@/models/Farm'
import User from '@/models/User'
import Auth from '@/models/Auth'
import Crop from '@/models/Crop'

import  $bus   from '@/app';

export default {
    name: "ChangePassword",
    components: {
        ModalToConfirm,
    },
    props: {
    //   title: { type: String, default: "without text" },
      
    },
    data() {
        return {        
            // title: "Account",
            loading: false, 
            newCredentials: {
                oldPassword: null,
                password: null,
                password_confirmation: null,
            },         
        };
    },
    watch: { 
      // auth: function(value) { // watch it
      //     console.log("watch ");
      //     this.newCredentials.token = this.auth.token;
      //     this.newCredentials.email = this.auth.email;
      // }
    },
    computed : {
        auth(){
            return Auth.query().first();
        }, 
        user(){
            return User.query().first();
        },       


    },
    async created() {

        console.log("on created ChangePassword")


        // this.fetch();
      
    },
    methods: {
      getValidationState({ dirty, validated, valid = null }) {
            return dirty || validated ? valid : null;
        },
      async changePassword(){
            this.loading = true;

            try {        

                const result = await Auth.api().changePassword(this.newCredentials);
                  // await Terrain.api().post('terrain',this.terrain);
                    
                    // console.log("result :"+JSON.stringify(result.response.data));

                    // await Auth.api().delete('/auth/logout',{delete: this.auth.id});
               
                    Auth.deleteAll();

                    localStorage.removeItem('auth');

                    this.$router.push('/login');

            } catch (e) {
                  this.$bus.$emit('warningFixTop', e.message);
                  this.error = e.message
                  console.log(e)
            } finally {

                 
                this.loading = false
   
            }

      },     

      // async fetch(){
      //       this.loading = true

      //       try {
      //           await Farm.api().get('farm');                
      //           await Terrain.api().get('terrain');                
      //           await Plant.api().get('plant');
      //           await Crop.api().get('crop');
                    
      //       } catch (e) {
      //           this.$bus.$emit('warningFixTop', e.message);
      //           this.error = e.message
      //           console.log(e)
      //       } finally {
      //           this.loading = false
      //       }     

      // },

    
    },
    async mounted () {
      console.log("Mounted ChangePassword.vue");

      }
  };
  </script>
  
  <style>
  </style>
  