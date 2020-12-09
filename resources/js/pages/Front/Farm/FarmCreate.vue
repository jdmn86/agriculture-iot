<template>
    
  <b-row  style="padding:10px;" align-h="center">
    <b-col sm="5"   >
      <b-container fluid  style=" background-color: white; margin: 0px; ">
          <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
            <b-col cols="auto" class="mr-auto p-3">
              <h4 v-if="farmToEdit">Edit Farm</h4>
              <h4 v-else>Add New Farm</h4>
            </b-col>
            <b-col cols="auto" class="p-3" >
              <a @click="$router.go(-1)">
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

           
          </b-form>
          
          <b-row align-h="center" style="margin-top: 20px">
                <b-button v-if="farmToEdit" type="submit" btn-block @click="updateFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button>
                <b-button v-else type="submit" btn-block @click="saveFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
               
          </b-row>

      </b-container>
      </b-col>
    </b-row>
  </template>
  
  <script>

  import {mapGetters,mapActions} from 'vuex'

import {FarmService} from "../../../services/FarmService"; 
   
  export default {
    name: "FarmCreate",
    components: {
    
    },
    props: {
        onClose: { type: Function },

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
      ...mapGetters('farm',['farms','farmById']),   
      farmToEdit: function(){
        return this.$route.params.farmId ;
      }
      },
    created() {
        if(this.$route.params.farmId){
          
          console.log("parmID : " +JSON.stringify(this.$route.params.farmId));
            let f =  this.farmById(this.$route.params.farmId);
            console.log("f : " +JSON.stringify(f));
            this.id = f.id; 
             this.farm.name = f.name;
             this.farm.localizacao = f.localizacao;
        }
    },
    methods: { 
      ...mapActions('farm',['addFarm','setFarmSelected','updateDarm']),
     
      async updateFarm(){
        try {
          console.log("this.farm.id"+this.id);
              const { data } = await FarmService.update(this.id,this.farm);//this.fetchParams)
                this.updateFarm(data);

                this.$router.push({path: '/front/farm/'+data.id});
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.error = e.message
                console.log(e)
          } finally {
                this.loading = false;
                
          }

      },
      async saveFarm(){
        try {
            
              const { data } = await FarmService.create(this.farm);//this.fetchParams)
                
                console.log("response :"+JSON.stringify(data))
                this.addFarm(data);
                
                this.$router.push({path: '/front/farm/'+data.id});
              
          } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
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
        console.log("Mounted FarmCreate.vue");
      }
  };
  </script>
  
  <style>
  </style>
  