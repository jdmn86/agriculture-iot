<template>

 
     <GreyRow >

       <b-col  v-if="withSearch" cols="auto" align-v="center" style="margin: 5px; margin-left: 20px">
                <h5>Search by :</h5>
            </b-col> 
     
             <b-form inline  style="margin: 5px">

                   <!--  <b-form-group class="mr-sm-2" id="input-group-farm" label="Farm:" label-for="input-farm" > 
                         <b-form-select 
                            style="margin-left: 10px"
                            id="input-farm"
                            name="input-farm"
                            v-model="farmSelected"               
                            aria-describedby="input-farm-live-feedback"
                            @change="changeFarm"
                            >
                            <option :value="null" :selected="!farmSelected ">None</option>
                            <option v-for="farm in farms" :selected="farmSelected == farmId "
                                :key="farm.id"
                                :value="farm.id">
                                {{ farm.name }} 
                            </option>
                        </b-form-select> 
                    </b-form-group> -->
                       
                  <b-form-group class="mr-sm-2" id="input-group-isBlocked" label="Blocked:" label-for="input-isBlocked" > 
                            <b-form-checkbox
                                id="isBlocked"
                                v-model="isBlockedSelected"
                                name="isBlocked"
                                @change="changeIsBlocked"
                              >
                              </b-form-checkbox>
                    </b-form-group>


            </b-form>

            <b-col style="text-align: right; ">
                <b-button v-can="'user-create'" v-if="auth.mode"  @click="$router.push({name: 'employeeCreate'})"  style=" border-color: #4AAD37;background-color: #4AAD37; margin: 5px">Add new Employee</b-button>

            </b-col>

  </GreyRow>
           
</template>

<script>

import GreyRow from "@/wrapper/GreyRow"

import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import User from '@/models/User'
import Plant from '@/models/Plant'

import  $bus   from '@/app';

    export default {
      name: "EmployeeSearch",
      components: {       
        GreyRow
      },
      // props: ['value','withSearch'],
      props: ['isBlocked','withSearch'],

          // plantSelected: { type: Object, default: null},
          // farmSelected: { type: Object, default: null},

      // },
      data() {
        return {
            isBlockedSelected: null,
        };
      },
      watch: {
            
      },
      computed : {
        // this.$emit('interface', this.childData)
           // plantSelected: {
           //    get(){ return this.plant },
           //    set(p){ this.$emit('changePlant', p) }
           //  },
           //  farmSelected: {
           //    get(){ return this.farm },
           //    set(f){ this.$emit('changeFarm', f) }
           //  },
            plants(){
                return Plant.all() ;
           
            },
            farms(){
                return Farm.all() ;
           
            },
           
            auth(){
                return Auth.query().first();
            },
            
           
        },
      created() {
            
           console.log("on created EmployeeSearch");
            this.isBlockedSelected = this.isBlocked;
            
                   
        
      },
      methods: {
         changeIsBlocked(u){
          console.log("value of u :" +JSON.stringify(u));
          this.$emit('changeIsBlocked', u) 
        },
            
      },
      mounted () {

        console.log("Mounted EmployeeSearch.vue");

        },
    };
    </script>

    <style>
    </style>
