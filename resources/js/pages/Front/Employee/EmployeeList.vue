<template>
   
    <b-container fluid style="padding: 0px; margin: 0px" >

   <EmployeeSearch  :isBlocked="isBlocked"
   @changeIsBlocked="changeIsBlocked"   
   :withSearch="true"/>
   
 

    <b-row v-if="employeeFiltered && employeeFiltered.length>0" cols="1" cols-sm="1" cols-md="1" cols-lg="2" style="margin: 0px;padding: 3vw; padding-top: 4vw" align-h="around">

        <b-col v-can="'user-list'" style=" color: black; padding: 0px"  
                        v-for="e in employeeFiltered" :key="e.id">

        <!-- <b-col  style=" border-radius: 4px; color: black; padding: 0px"  
            v-for="(t, index) in terrenosSearch"
            :style="t.style"
            :key="index">   -->                  

            <EmployeeDetails :employee="e" >

               <!--  <template slot="mapa">
                    <MapLoaderOneTerrain v-if="google" :terrain="t" :google="google"/>
                </template>


                <template slot="crop">
                    <b-button   @click="goTodetail(t)" variant="light" block style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                </template>


                <template slot="edit" v-if="auth.mode" >
                    <b-button  @click="$router.push({name:'terrainEdit', params: { terrainId: t.id } })" variant="light" block style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                </template> -->


                <template v-can="'user-delete'" slot="delete" v-if="auth.mode" >
                    <ModalToDelete  v-can="'user-delete'" :name="e.name"  >
                        <template slot="deleteButton">
                            <button type="button"  class="btn btn-danger" @click="onConfirmDelete(e)">Confirmar  </button>
                        </template>
                    </ModalToDelete>
                </template>

            </EmployeeDetails>

        </b-col>

    </b-row>   

     <NoDataContainer v-else :title="title" >
        <slot >
            <b-button v-can="'user-create'" @click="$router.push({name: 'userCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Employee</b-button>
        </slot>
    </NoDataContainer>


</b-container>
</template>
                
<script>
import ModalToDelete from "@/components/ModalToDelete";

// import TerrainsOfFarm from "@/components/Farm/TerrainsOfFarm";
import EmployeeDetails from '@/components/Employee/EmployeeDetails';
import EmployeeSearch from "@/components/Employee/EmployeeSearch";

import NoDataContainer from "@/components/NoDataContainer";


import GreyRow from "@/wrapper/GreyRow"
import Farm from '@/models/Farm'
import Terrain from '@/models/Terrain'
import Auth from '@/models/Auth'
import Plant from '@/models/Plant'
import User from '@/models/User'

import  $bus   from '@/app';

  export default {
    name: "EmployeeList",
    components: {
      // TerrainsOfFarm,
      EmployeeDetails,
      ModalToDelete,
      // GreyRow,
      EmployeeSearch,
      NoDataContainer
    },
    props: ['isBlocked'],
    // {
    //       plantId: { type: String, default: null },
    //       farmId: { type: String, default: null },

    // },
    data() {
      return {
            title: "Employee",
            loading: false,
            // google: null,            
            // farmsFiltered: null,
            // plantSelected: null,
            // farmSelected: null,

      };
    },
    watch: {
       // plantSelected: function (newPlant,oldPlant) {

       //      console.log("value in plantSelected watch :"+JSON.stringify(newPlant));

       //      if(newPlant != oldPlant && newPlant.id != this.plantId){
       //          this.$router.push({query: {...this.$route.query, plantId: newPlant.id}});

       //      }
            
       //  },
       //  farmSelected: function (newFarm,oldFarm) {

       //      console.log("value in farmSelected watch :"+JSON.stringify(newFarm));

       //      if(newFarm != oldFarm && newFarm.id != this.farmId){
       //          this.$router.push({query: {...this.$route.query, farmId: newFarm.id}});

       //      }
            
       //  },
      
    
    },
    computed : {
            auth(){
                return Auth.query().first();
            },
            employeeFiltered(){

               let blocked = (this.isBlocked == 'true');

                return User.query().where((user) => {
                    return user.id != this.auth.id 
                  }).where('blocked',blocked).with('company').get();
            },
            // employeeFiltered(){
            //     console.log("filtering Employee......")
            //      if(this.farmId || this.plantId){
            //         return Terrain.query().with("farm").whereHas('farm', (query) =>{

            //               if(this.farmId){
            //                 query.where('id',parseInt(this.farmId));
            //             }
            //       }).with("crops").whereHas('crops', (query) =>{

            //               if(this.plantId){
            //                 query.where('id_plant',parseInt(this.plantId));  
            //               }
                          
            //       }).get();    
            //     }else{
            //         return Terrain.query().with("crops").get();
            //     }
                
            // }, 
         
      },
    async created() {
      console.log("Created EmployeerList");

    

      // if(this.plantId){
      //   this.plantSelected = Plant.query().find(this.plantId);
      // }
      // if(this.farmId){
      //   this.farmSelected = Farm.query().find(this.farmId);
      // }

    },
    methods: {
        changeIsBlocked(u){
          console.log("in employees change isBlocked :"+JSON.stringify(u))
          this.$router.push({query: {...this.$route.query, isBlocked: u}});
        },
        // changeFarm(f){
        //     if(f){
        //         this.$router.push({query: {...this.$route.query, farmId: f}});           
        //     }else{
        //         this.$router.push({query: {...this.$route.query, farmId: null}});           
        //     }
        // },
        // changePlant(p){
        //     if(p){
        //         this.$router.push({query: {...this.$route.query, plantId: p}});           
        //     }else{
        //         this.$router.push({query: {...this.$route.query, plantId: null}});           
        //     }
 
        // },
      
      async onConfirmDelete(user){

          console.log("on confirm EmployeerList");
          try {
                this.loading = true;
                 
                Terrain.api().delete('user/'+user.id,{delete: user.id});

                this.$bvModal.hide('ModalToDelete')
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
      console.log("Mounted EmployeerList");

    
      }
  };
  </script>

  <style>
  </style>
