<template>
    <!-- <b-container > -->
        <b-row   style="margin: 10px; padding-top: 55px; " align-h="center" align-v="start">

            <b-col sm="10">

                <b-container style=" background-color: #f8f9fa; margin: 0px; ">

                    <b-jumbotron>
    
                        <b-row align-v="center" align-h="center">
    
                            <b-col sm="10">
    
                                <b-row style="margin: 15px;">

                                    <b-col>
                                        <h1>Não existem {{title}} </h1>
                                    </b-col>
                                    
                                </b-row>
                                
                                <b-row style="margin: 15px;" align-v="center" align-h="between">
    
                                    <b-col>
                                        <h3> Deseja adicionar {{title}} ? </h3>
                                    </b-col>
    
                                    <b-col cols="auto">
    
                                        <slot ></slot>
    
                                    </b-col>

                                </b-row>
                                
                            </b-col>
    
                        </b-row>                    
                        
                      </b-jumbotron>
    
                </b-container> 

            </b-col>            

        </b-row>

           
         
         </b-row>
     <!-- </b-container> --> 
</template>


<script>
    export default {
      name: "NoDataContainer",
      props:{
        title: { type: String, default: "without text" },
        },
    };

    </script>
    
    <style>  
    </style>
    
    