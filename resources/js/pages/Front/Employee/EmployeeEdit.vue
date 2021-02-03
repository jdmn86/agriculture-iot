<template>
    
<b-container style="padding: 0px" >

    <b-row style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

    <b-col sm="6"   >
      <b-container fluid  style=" background-color: white; margin: 0px; ">
          <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-3">
              <h4 >Edit Employee</h4>
            </b-col>
            <b-col cols="auto" class="p-3" >
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
                        v-model="employee.name"
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
                    v-model="employee.email"
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

          <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'farm-edit'" type="submit" btn-block @click="updateFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button>

               
          </b-row>

      </b-container>
      </b-col>
    </b-row>


</b-row>

</b-container>
    
  </template>
  
  <script>

// import {FarmService} from "@/services/FarmService"; 
import User from '@/models/User'

import  $bus   from '@/app';

  export default {
    name: "EmployeeEdit",
    components: {
  
    },
    props: ['employeeId'],
    // { 
    //     farmId: { type: String, default: null },
    //   },
    data() {
      return {        
          title: "Employee Create",
          loading: false, 
          // farm: {
            
          //   name: null,
          //   localizacao: null,
          // },
          id: null,
         
    }
  },

    computed : {
      // farmToEdit: function(){
      //   return this.$route.params.farmId ;
      // }
      // farm: function(){
      //   this.id = this.farm.id;
      //   return Farm.query().find(this.$route.params.farmId);
      // },
       employee: {
          get(){ return User.query().find(this.employeeId); },
          set(value){ this.user = value}
        },
    },
    created() {
        // if(this.$route.params.farmId){
          
        //   console.log("parmID : " +JSON.stringify(this.$route.params.farmId));
        //     let f =  Farm.query().find(this.$route.params.farmId);
        //     console.log("f : " +JSON.stringify(f));
        //     this.farm =f ;
        //     this.id = f.id; 
            
        // }
    },
    methods: { 
       getValidationState({ dirty, validated, valid = null }) {
      return dirty || validated ? valid : null;
        },
     
      async updateFarm(){
        this.loading = true;
        try {
          // console.log("this.farm.id"+this.id);
              // const { data } = await FarmService.update(this.id,this.farm);
                // this.updateFarm(data);
                // Farm.update({where: data.id,data: {data}});
                User.api().patch('user/'+this.user.id,this.user)

                
          } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                this.$router.push({name: 'user'});
                
          }

      },


      async fetchData () {

            this.loading = true

      }
    },
    mounted () {
        console.log("Mounted EmployeeEdit.vue");
      }
  };
  </script>
  
  <style>
  </style>
  