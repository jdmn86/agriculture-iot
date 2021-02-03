<template>

    <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 10px; background-color: white;">
                      
       <!--  <b-col sm="7" style="padding: 0px; ">
              
              <MapLoaderOneTerrain v-if="google && terrain" :terrain="terrain" :google="google"/>

        </b-col> -->

        <b-col sm="5" style="  padding: 0px">

            <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                  
                <h4>{{employee.name}}</h4>
                
            </b-row> 

             <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                  
             <b-form @submit.stop.prevent="handleSubmit(updateEmployee)" >

                <h4>{{employee.blocked}}</h4>
                <b-form-checkbox v-model="employee.blocked" @change="updateEmployee"name="check-button" switch>
                  Blocked 
                </b-form-checkbox>
                 </b-form>
        
          <!-- <b-row align-h="center" style="margin-top: 20px"> -->
<!-- 
                <b-button v-can="'user-edit'" type="submit" btn-block @click="updateEmployee" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">save User</b-button>
 -->
               
          <!-- </b-row> -->
                
            </b-row> 

             <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                  
                <h4>{{employee.company.name}}</h4>
                
            </b-row> 
              
            <!-- <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                  
                <b-col v-if="terrain">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Area</h4>
                        </div>
                        <div>
                            <p>{{terrain.area}}</p>
                        </div>
                     </div>
                </b-col>
          
            </b-row> 

            <b-row v-if="terrain.crop" align-h="center" style="padding: 0px; margin: 5px"> 
                  
                <b-col v-if="terrain">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4>Cultivo</h4>
                        </div>
                        <div>
                            <p>{{terrain.crop.name}}</p>
                        </div>
                    </div>
                </b-col>
          
            </b-row>  -->

            

            <b-row v-can="'user-edit'" v-if="auth.mode"  align-h="center" style="padding: 0px; margin: 5px">
                <b-col align-h="center">

                     <b-button  @click="$router.push({name:'employeeEdit', params: { employeeId: employee.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
              
                </b-col>
            </b-row>

            <b-row  v-can="'user-delete'" align-h="center" style="padding: 0px; margin: 5px">

                <slot name="delete"></slot>
               
            </b-row>                             

        </b-col>

    </b-row>

</template>


<script>
// import MapLoaderOneTerrain from "@/components/GoogleMaps/MapLoaderOneTerrain.vue"

import Auth from '@/models/Auth'
import User from '@/models/User'

      export default {
        name: "EmployeeDetails",
        components: {  
            // MapLoaderOneTerrain  
        },
        props: {
            employee: { type: Object, default: null },
            // google: { type: Object, default: null },

        },
        data() {
          return {        
                
          };
        },
       
        computed : {
             auth(){
                return Auth.query().first();
            },
            

          },
        created() {
        },
        methods: {
             async updateEmployee(){

                try {
                    // this.loading = true;
                    // const { data } = await TerrainService.update(this.terrain.id,this.terrain);
                    
                    //  Terrain.update({where: data.id,data: {data}});
                    User.api().patch('user/'+this.employee.id+'/blockUnblock',this.employee)

                    // console.log("terrain :"+ JSON.stringify(data))
                    // this.$router.push({path: '/front/terrain'});
                    
                } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
                } finally {
                    // this.loading = false
                    // this.$router.push({path: '/front/terrain/'+this.terrain.id});
                }
            
        },
      
        },
        mounted () {
            console.log("Mounted EmployeeDetails");
          }
      };
      </script>
      
      <style>
      </style>
      