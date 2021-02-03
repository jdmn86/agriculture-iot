<template>
    
<b-container style="padding: 0px" >

    <b-row style="margin: 0px; background-color: #f8f9fa;" align-h="around">

    <b-col   >
      <b-container fluid  style=" background-color: white; margin: 0px; ">
          <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-3">
              <h4 >Add Device</h4>
            </b-col>
            <b-col cols="auto" class="p-3" >
              <a @click="$router.go(-1)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 
 
  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(addDevice)" style="margin-top: 40px;margin-left: 25px">


      <ValidationProvider 
        name="ref" 
        rules="required|min:12" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-ref" label="Ref" label-for="input-ref"> 
                    <b-form-input
                        id="input-ref"
                        name="input-ref"
                        v-model="ref"
                        :state="getValidationState(validationContext)"
                        aria-describedby="input-ref-live-feedback"
                    ></b-form-input>

        <b-form-invalid-feedback id="input-ref-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
                  </b-form-group>
</ValidationProvider>


 <!-- <ValidationProvider 
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
  </ValidationProvider> -->


          </b-form>
        </validation-observer>
          <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'device-create'" type="submit" btn-block @click="addDevice" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">add Device</b-button>

               
          </b-row>

      </b-container>
      </b-col>
    </b-row>


</b-row>

</b-container>
    
  </template>
  
  <script>

// import {FarmService} from "@/services/FarmService"; 
import Auth from '@/models/Auth'
import Device from '@/models/Device'

import  $bus   from '@/app';

  export default {
    name: "AddDevice",
    components: {
  
    },
    props: ['farmId'],
    // { 
    //     farmId: { type: String, default: null },
    //   },
    data() {
      return {        
          title: "Add Device",
          loading: false, 
          ref: null,
          // farm: {
            
          //   name: null,
          //   localizacao: null,
          // },
          id: null,
         
    }
  },

    computed : {
       auth(){
                return Auth.query().first();
            },
            
      // farmToEdit: function(){
      //   return this.$route.params.farmId ;
      // }
      // farm: function(){
      //   this.id = this.farm.id;
      //   return Farm.query().find(this.$route.params.farmId);
      // },
       // farm: {
       //    get(){ return Farm.query().find(this.farmId); },
       //    set(value){ this.farm = value}
       //  },
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
     
      async addDevice(){
        this.loading = true;
        try {
          // console.log("this.farm.id"+this.id);
              // const { data } = await FarmService.update(this.id,this.farm);
                // this.updateFarm(data);
                // Farm.update({where: data.id,data: {data}});
                 Device.api().patch('device/'+this.ref+'/addToCompany/'+this.auth.company_id)

                
          } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                this.$router.push({path: '/front/device'});
                
          }

      },


      async fetchData () {

            this.loading = true

      }
    },
    mounted () {
        console.log("Mounted AddDevice.vue");
      }
  };
  </script>
  
  <style>
  </style>
  