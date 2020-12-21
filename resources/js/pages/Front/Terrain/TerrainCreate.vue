<template>

<div>

        <HeadContainer :title="title"/>

        <BodyContainer :loading.sync="loading">  

            <template slot="body">

                <b-col v-if="farms.length " style="margin: 0px">
                    <b-row fluid style=" background-color: #f8f9fa; margin: 0px; margin-bottom: 10px; padding: 10px">
                        <validation-observer ref="observer" v-slot="{ handleSubmit }">

                             <b-form inline @submit.stop.prevent="handleSubmit(saveTerrain)" style="margin-top: 10px;margin-left: 20px">

                                <ValidationProvider 
                                    name="name" 
                                    rules="required|min:3" 
                                    v-slot=" validationContext ">

                                    <b-form-group class="mr-sm-2" id="input-group-name" label="Name" label-for="input-name" > 
                                        <b-form-input
                                            style="margin-left: 10px"
                                            class="mb-2 mr-sm-2 mb-sm-0"
                                            id="input-name"
                                            name="input-name"
                                            v-model="terrain.name"
                                            :state="getValidationState(validationContext)"
                                            aria-describedby="input-name-live-feedback">
                                        </b-form-input>

                                        <b-form-invalid-feedback id="input-name-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                              
                                    </b-form-group>
                                </ValidationProvider>


                                <ValidationProvider 
                                    name="farm" 
                                    rules="required" 
                                    v-slot=" validationContext ">
                                    <b-form-group id="input-group-farm" label="Farm" label-for="input-farm" >

                                        <b-form-select 
                                            style="margin-left: 10px"
                                            id="input-farm"
                                            name="input-farm"
                                            v-model="farmSelected"
                                            :state="getValidationState(validationContext)"
                                            aria-describedby="input-farm-live-feedback">
                                            <option v-for="item in farms" :selected="farmSelected == item "
                                                :key="item.id"
                                                :value="item">
                                                {{ item.name }} 
                                            </option>
                                        </b-form-select> 
                                                
                                             
                                        <b-form-invalid-feedback id="input-farm-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                              
                                    </b-form-group>
                                </ValidationProvider>


                            </b-form>
                        </validation-observer>

                            <!-- <b-col class="col-auto align-self-end" style="margin-left: 10px">
                                <b-button block  @click="saveTerrain"  style=" border-color: #4AAD37;background-color: #4AAD37; ">Save Terrain</b-button>

                            </b-col>  -->              
                        <ModalToConfirm  v-can="'terrain-create'" v-if="terrain.name" :name="terrain.name">
                            <template slot="confirmButton">
                                 <button type="button"  class="btn btn-danger" @click="saveTerrain">Confirmar</button>
                            </template>
                        </ModalToConfirm>


                    </b-row>

                    <MapCreateTerrain v-if="google"
                        @updateTerrainCords="updateTerrainCords"
                        :terrains="terrainsToSend"
                        :google="google"
                        >  

                    </MapCreateTerrain> 

                </b-col>

                <NoDataContainer v-else :title="title" >
                    <slot >
                        <b-button v-can="'farm-create'" @click="$router.push({name: 'farmCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Farm</b-button>
                    </slot>
                </NoDataContainer>


            </template>

        </BodyContainer>
                            
</div>
</template>

<script>
import HeadContainer from "@/wrapper/HeadContainer";
import BodyContainer from "@/wrapper/BodyContainer";
import NoDataContainer from "@/components/NoDataContainer";
import ModalToConfirm from "@/components/ModalToConfirm";

import GoogleMapsApiLoader from 'google-maps-api-loader'
import MapCreateTerrain from "@/components/GoogleMaps/MapCreateTerrain.vue";

import {TerrainService} from "@/services/TerrainService"; 
import {FarmService} from "@/services/FarmService"; 

import  $bus   from '@/app';

import Terrain from '@/models/Terrain'
import Farm from '@/models/Farm'
import Auth from '@/models/Auth'


export default {
    name: "TerrainCreate",
    components: {
      //   MainContainerUser,
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        MapCreateTerrain,
        ModalToConfirm
          
    },
    props: {
       // title: { type: String, default: "without text" },
      
    },
    data() {
        return {        
            title: "Add Terrain",
            loading: false, 
            // terrainName: null,    
            google: null,
            terrain: {
                name: null,
                farm_id: null,
                coords: null,
                area: null,
            },
            farmSelected: null,
            terrainsToSend: null,
        };
    },
    // watch:{
    //     farm: function(value){
    //         this.terrainsToSend = Terrain.query().where('farm_id', this.farmSelected.id).get(); 
    //         console.log("terrainsToSend :" + JSON.stringify(this.terrainsToSend));
    //         this.terrain.farm_id = value.id;
    //     }
    // },
    // farmSelected: {
    //     get () {
    //         console.log("get farmSelected");
    //       return this.farmSelected;
    //     },
    //     set (value) {
    //         console.log("set farmSelected");
    //           if(value){
    //             this.farmSelected = value;

    //             this.terrainsToSend = Terrain.query().where('farm_id', this.farmSelected.id).get(); 
    //             console.log("terrainsToSend :" + JSON.stringify(this.terrainsToSend));
                
    //           }
    //     }
    //   }
    // },
    async created() {
        const googleMapApi = await GoogleMapsApiLoader({
            apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        });
        
        this.google = googleMapApi;

        this.fetchFarms().then(()=>{
            this.fetchTerrains().then(()=>{

                console.log("finish fetch farms")            

                this.farmSelected = Farm.query().first();

                this.loading = false
            });
        });
    },
     computed : {
        farms(){
            return Farm.all() ;
       
        },
    },
    methods: {
        getValidationState({ dirty, validated, valid = null }) {
            return dirty || validated ? valid : null;
        },
    
    updateTerrainCords(e) {
        console.log("coords in ADDTERRAIN : ");
        console.log(e);

        if(e==null){
            this.selectPolygon=null 
        }else{
            this.terrain.coords = e[0];
            this.terrain.area = e[1];
            console.log("terrain in AddTerrain");
            console.log(this.terrain);
        }
    },
    async saveTerrain(){

        if(!this.terrain.area){
           
            alert("Please add Terrain");
        }else if(this.farmSelected){
          
           this.terrain.farm_id = this.farmSelected.id;
          // this.terrain.name=this.terrainName;
          
            try {
                this.loading = true;
                const { data } = await TerrainService.create(this.terrain);//this.fetchParams)
                //this.farms(data);
                // this.farms = data;
                 Terrain.insert({data: data});

                console.log("terrain :"+ JSON.stringify(data))
                this.$router.push({path: '/front/terrain'});
                
                // this.pagination.total = data.total
            } catch (e) {
                // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                this.loading = false
            }
        }else{
          alert("Please select the farm");
        }
      

    },
    async fetchFarms () {

        this.loading = true
        try {
            const { data } = await FarmService.getList();
            Farm.insert({data: data});
        } catch (e) {
            this.$bus.$emit('warningFixTop', e.message);
            this.error = e.message
            console.log(e)
        } finally {
           this.loading = false
        }          

    },

      async fetchTerrains () {

            // this.loading = true
            try {
                console.log("fetch terrains")
                const { data } = await TerrainService.getList();
                Terrain.insert({data: data});
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
               // this.loading = false
            }          
        },
   
    },
    mounted () {
        console.log("Mounted TerrainCreate.vue");

          // this.title = "add Terrain"
    }
};
</script>

<style>
</style>
