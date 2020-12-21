<template>

    <b-col sm="3"  style=" color: black; " v-if="farmSelected">

        <b-row  style=" background-color: #f8f9fa;  ">
            <b-col col-sm="1" >

                 <b-row align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px" class="text-white ">
                        <h4 >{{farmSelected.name}}</h4>
            
                </b-row> 

                <b-row style="padding: 10px" align-h="start" align-v="center">
              
                        <h4 style="margin: 10px" id="localizacao" class="">{{farmSelected.localizacao}}</h4>
                     
                </b-row>
 
                <b-row style="padding: 10px">
                  
                    <h4 style="margin: 10px" id="areaTotal" class="">{{farmSelected.areaTotal}} m<sup>2</sup></h4>
                  
                </b-row>

                <b-row style="padding: 10px">

                    <slot name="edit"></slot>
                  
                </b-row>

                <b-row style="padding: 10px">
                    <slot name="delete"></slot>
                   
                </b-row>

            </b-col>

        </b-row>
    </b-col>

</template>


<script>
      export default {
        name: "FarmDetails",
        components: {    
        },
        props: {
            farmSelected: { type: Object, default: null },

        },
        data() {
          return {        
                
          };
        },
       
        computed : {
            
            

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
      