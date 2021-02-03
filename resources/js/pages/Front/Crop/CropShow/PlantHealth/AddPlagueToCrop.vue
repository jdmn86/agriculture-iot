<template>

   <b-col  style="margin: 10px; background-color: #f8f9fa;">

        <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
            <h4 >AddPlagueToCrop</h4>

        </b-row> 
 
        <b-row  style="padding: 10px; " align-h="between" align-v="center">

  <validation-observer ref="observer" v-slot="{ handleSubmit }">

         <b-form @submit.stop.prevent="handleSubmit(addPlagueToCrop)" style="margin-top: 40px;margin-left: 25px">

<!-- plague list -->

      <ValidationProvider 
        name="plague_id" 
        rules="required" 
        v-slot=" validationContext ">
                  <b-form-group  id="input-group-plague_id" label="Plague" label-for="input-plague_id"> 
                   <b-form-select 
                            style="margin-left: 10px"
                            id="input-plague_id"
                            name="input-plague_id"
                            v-model="cropPlague.plague_id"               
                            aria-describedby="input-plague_id-live-feedback"
                            >
                            <!-- @change="cropsFilter"> -->
                            <!-- <option :value="null" :selected="!product.typeProduct_id ">None</option> -->
                            <option v-for="p in plant.plagues"
                                :key="p.id"
                                :value="p.id">
                                {{ p.nome_comum }} 
                            </option>
                        </b-form-select> 

        <b-form-invalid-feedback id="input-plague_id-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
  
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

      </b-row>

        <b-row align-h="center" style="margin-top: 20px">

                <b-button v-can="'cropPlague-create'" type="submit" btn-block @click="addPlagueToCrop" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">add Plague</b-button>

               
          </b-row>
</b-col>
    
  </template>


<script>

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";

import Auth from '@/models/Auth'
import Crop from '@/models/Crop'
import Plague from '@/models/Plague'
import Plant from '@/models/Plant'
import CropPlague from '@/models/CropPlague'

      export default {
        name: "AddPlagueToCrop",
        components: {  
          // TerrainsOfFarm  
        },
        props: {
            crop: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {  
              loading: false,        
                cropPlague: {
                  plague_id: null,
                  user_id: null,
                  crop_id: null,
                },
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            plant(){
                return Plant.query().where('id',this.crop.id_plant).with('plagues').first();
            },

          },
         created() {
            console.log("on created AddPlagueToCrop");
             this.fetch();
        
          },
        methods: {
           getValidationState({ dirty, validated, valid = null }) {
              return dirty || validated ? valid : null;
            },
          colher(){

          },
          async addPlagueToCrop(){
            this.loading = true;
                try {

                  this.cropPlague.user_id = this.auth.id;
                  this.cropPlague.crop_id = this.crop.id;
                 await CropPlague.api().post('cropPlague',this.cropPlague);    
                //this.$router.push({path: '/front/terrain/'+result.response.data.id});
                
                // console.log("terrain :"+ JSON.stringify(data))
                // this.$router.push({path: '/front/terrain/'+this.terrain.id});
                
                // await Crop.api().get('crop');
                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                
                this.$router.push({path: '/front/crop/'+this.crop.id+'/plantHealth'});

                this.loading = false
            }  
          },
          enabledDevice(){
            
          },
             async fetch(){
            this.loading = true

            try {
                await Plague.api().get('plague');    
              
                // await Crop.api().get('crop');
                    
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {

                this.loading = false
            }     

        },
      
        },
        mounted () {
            console.log("Mounted AddPlagueToCrop");
          }
      };
      </script>
      
      <style>
      </style>
      