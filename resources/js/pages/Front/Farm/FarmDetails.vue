<template>
    <b-col sm="3"  style=" border-radius: 4px; color: black; " v-if="farmSelected">

        <b-row  class="h-100 " style=" background-color: white;  padding: 10px">

            <b-col col-sm="1" >
                <b-row style="padding: 10px">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 style="margin-right: 10px" id="name" class="">{{farmSelected.name}}</h4>
                        </div>
                    </div>
                </b-row> 

                <b-row style="padding: 10px">
                    <div class="d-flex justify-content-between">
                        <div>
                        <h4 style="margin-right: 10px" id="localizacao" class="">{{farmSelected.localizacao}}</h4>
                        </div>
                    </div>
                </b-row>

                <b-row style="padding: 10px">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 style="margin-right: 10px" id="areaTotal" class="">{{farmSelected.areaTotal}} m<sup>2</sup></h4>
                        </div>
                    </div>
                </b-row>

                <b-row>

                    <slot name="edit"></slot>
                  
                </b-row>

                <b-row>
                    <slot name="delete"></slot>
                   
                </b-row>

            </b-col>

        </b-row>
    </b-col>
</template>


<script>
    
import {mapGetters,mapActions} from 'vuex'
  
      export default {
        name: "FarmDetails",
        components: {        
        },
        props:{
            // farm: { type: Object,   required: true },
        },
        data() {
          return {        
                
          };
        },
       
        computed : {
            ...mapGetters('auth',['userSettings']),
            ...mapGetters('farm',['farmSelected']),

          },
        created() {
        },
        methods: {
       
        },
        mounted () {
            console.log("Mounted FarmDetails");
          }
      };
      </script>
      
      <style>
      </style>
      