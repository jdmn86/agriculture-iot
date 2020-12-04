<template>
    
  <!-- <div> -->
    <b-col cols-sm="4"   >
      <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
    <!-- <b-col > --> 
          <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-3">
              <h4 v-if="isEdit">Edit Farm</h4>
              <h4 v-else>Add New Farm</h4>
            </b-col>
            <b-col cols="auto" class="p-3" >
              <a @click="SET_AddFarmAddForm(false)">
                <i class="fas fa-times fa-2x"/>
              </a>
            </b-col>
          </b-row> 


         <b-form @submit.prevent="saveFarm" style="margin-top: 40px;margin-left: 25px">


                  <b-form-group  label="Designação : " label-for="designacao"
                    label-cols-sm="5">

                    <b-form-input
                        id="designacao"
                        v-model="farm.name"
                        type="text"
                        required
                        placeholder="Designação"
                        class="w-75 p-3" 
                    ></b-form-input>
                  </b-form-group>

                  <b-form-group  label-cols-sm="5" label="Localização : " label-for="localizacao">

                    <b-form-input
                      id="localizacao"
                      v-model="farm.localizacao"
                      required
                      type="text"
                      placeholder="Localização"
                      class="w-75 p-3"
                    ></b-form-input>
                  </b-form-group>


                  
                  <b-row align-h="center">
                    <!-- <div v-if="ERRORFARM">{{ERRORFARM}}</div> -->
                  </b-row>

          </b-form>
          
          <b-row align-h="center" style="margin-top: 20px">
                <!-- <b-button v-if="isEdit" type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button>
                <b-button v-else type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button> -->
               
                <b-button @click="saveFarm" type="submit" btn-block  variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>

          </b-row>

          <!-- </b-col>
        </b-row> -->

      </b-container>
      </b-col>
      <!-- </div> -->
  </template>
  
  <script>
//   import HeadContainer from "../../../wrapper/HeadContainer";
//   import MainContainerUser from "../../../wrapper/MainContainerUser";
//   import BodyContainer from "../../../wrapper/BodyContainer";
//   import NoDataContainer from "../../../components/NoDataContainer";
//   import HeaderComponent from "../../../components/HeaderComponent";
  
  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  import {mapGetters,mapActions} from 'vuex'

import {FarmService} from "../../../services/FarmService"; 
   
  export default {
    name: "FarmCreate",
    components: {
    //   MainContainerUser,
    //   HeadContainer,
    //   BodyContainer,
    //   NoDataContainer,
    //   HeaderComponent
    },
    data() {
      return {        
            title: "Farms Create",
        loading: false, 
      //   farms: null,
        farm: {
            name: null,
            localizacao: null,
        },
      };
    },
   
    computed : {
      ...mapGetters('farm',['farms']),   

      },
    created() {
    //   this.fetchData()
    },
    methods: { 
      ...mapActions('farm',['addFarm']),
      async saveFarm(){
        try {
                const { data } = await FarmService.create(this.farm);//this.fetchParams)
                //this.farms(data);
                // this.farms = data;
                
                this.addFarm(this.farm);
                this.$router.push({path: '/front/farm'});
                
                // this.pagination.total = data.total
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false
          }

      },
      async fetchData () {

            this.loading = true
            // try {
            //       const { data } = await FarmService.getList();//this.fetchParams)
            //       this.farms(data);
            //       // this.farms = data;
            //       console.log("farms :"+ JSON.stringify(data))
            //       // this.pagination.total = data.total
            // } catch (e) {
            //       // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
            //       this.error = e.message
            //       console.log(e)
            // } finally {
            //       this.loading = false
            // }

      }
    },
    mounted () {
        console.log("Mounted FarmCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  