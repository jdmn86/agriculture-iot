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
                                        disabled
                                        style="margin-left: 10px"
                                        id="input-farm"
                                        name="input-farm"
                                        v-model="farm"
                                        :state="getValidationState(validationContext)"
                                        aria-describedby="input-farm-live-feedback">
                                        <option v-for="item in farms" :selected="farm == item "
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

                  <!--   <b-col class="col-auto align-self-end" style="margin-left: 10px">
                        <b-button block  @click="saveTerrain"  style=" border-color: #4AAD37;background-color: #4AAD37; ">Save Terrain</b-button>

                    </b-col>     -->          

                    
                   <!--  <b-col class="col-auto align-self-end" style="margin-left: 10px">
                        <b-button v-can="'terrain-edit'"  @click="$bvModal.show('ModalToConfirmUpdate')"  block  style=" border-color: #4AAD37;background-color: #4AAD37; ">Update</b-button>
                    </b-col> -->

                    <ModalToConfirm  v-can="'terrain-edit'" v-if="terrain.name" :name="terrain.name" >
                        <template slot="confirmButton">
                             <button type="button"  class="btn btn-danger" @click="saveTerrain">Confirmar</button>
                        </template>
                    </ModalToConfirm>




                </b-row>

                <MapEditTerrain v-if="terrain.name && google"
                    :t="terrain"
                    @updateTerrainCords="updateTerrainCords"
                    :terrains="terrainsToSend"
                    :google="google"
                    >  
                </MapEditTerrain> 

            </b-col>

            <NoDataContainer v-else :title="title" >
                  <slot >
                        <b-button v-can="'farm-create'" @click="$router.push({name: 'terrainCreate'})" variant="light"  style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Terrain</b-button>
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
import MapEditTerrain from "@/components/GoogleMaps/MapEditTerrain.vue";

import {TerrainService} from "@/services/TerrainService"; 
import {FarmService} from "@/services/FarmService"; 

import  $bus   from '@/app';

import Terrain from '@/models/Terrain'
import Farm from '@/models/Farm'
import Auth from '@/models/Auth'

export default {
    name: "TerrainEdit",
    components: {
        HeadContainer,
        BodyContainer,
        NoDataContainer,
        MapEditTerrain,
        ModalToConfirm,
    },
    data() {
        return {        
            title: "Edit Terrain",
            loading: false, 
            google: null,
            terrain: {
                name: null,
                farm_id: null,
                coords: null,
                area: null,
            },
            farm: null,
            terrainsToSend: null,
        };
    },    
    async created() {

        this.loading=true;

        const googleMapApi = await GoogleMapsApiLoader({
            apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo&libraries=drawing"
        });
        
        this.google = googleMapApi;     

        console.log("Created before fetch farms")
        this.fetchFarms().then(()=>{
            this.fetchTerrains().then(()=>{

                console.log("finish fetch farms")
                // let t =  Terrain.query().find(this.$route.params.terrainId);
                this.terrain = Terrain.query().find(this.$route.params.terrainId);

                this.terrainsToSend = Terrain.query().where('farm_id', this.terrain.farm_id).where('id', (value) => value != this.terrain.id).get();

                this.farm = Farm.query().where('id', this.terrain.farm_id).first();

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
            // console.log("coords in ADDTERRAIN : ");
            console.log(e);
            if(e!=null){
                this.terrain.coords = e[0];
                this.terrain.area = e[1];
                // console.log("terrain in AddTerrain");
                // console.log(this.terrain);
            }
        },
        async saveTerrain(){


            if(!this.terrain.area){
                this.$bus.$emit('warningFixTop', "Please add Terrain");
            }else if(!this.farm){
                this.$bus.$emit('warningFixTop', "Please select the farm");
            }else{
                  this.terrain.farm_id = this.farm.id;
              
                try {
                    this.loading = true;
                    const { data } = await TerrainService.update(this.terrain.id,this.terrain);
                    
                     Terrain.update({where: data.id,data: {data}});

                    console.log("terrain :"+ JSON.stringify(data))
                    this.$router.push({path: '/front/terrain'});
                    
                } catch (e) {
                    this.$bus.$emit('warningFixTop', e.message);
                    this.error = e.message
                    console.log(e)
                } finally {
                    this.loading = false
                }
            }
        },
        async fetchFarms () {

            // this.loading = true
            try {
                console.log("fetch farms")
                const { data } = await FarmService.getList();
                Farm.insert({data: data});
            } catch (e) {
                this.$bus.$emit('warningFixTop', e.message);
                this.error = e.message
                console.log(e)
            } finally {
                // this.loading = false
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
        console.log("Mounted TerrainEdit.vue");

    },

};
</script>

<style>
</style>
