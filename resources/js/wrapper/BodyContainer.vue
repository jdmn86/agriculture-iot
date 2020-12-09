<template>
    <div>
        <b-row style="margin: 10px; padding-top: 25px; ">

            <b-container fluid  align-h="center" style=" background-color: #f8f9fa; margin: 0px; ">

                <slot name="body"></slot>

            </b-container> 

        </b-row>

        <!-- <b-row  v-else style="margin: 10px; padding-top: 55px; " align-h="center" align-v="start">

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
    
                                        <slot name="buttonAddEntity"></slot>
    
                                    </b-col>

                                </b-row>
                                
                            </b-col>
    
                        </b-row>                  
                        

                      </b-jumbotron>
    
                </b-container> 

            </b-col>            

        </b-row> -->


 
        
    </div>
</template>


<script>
    import {mapGetters,mapMutations,mapActions} from 'vuex'
    export default {
      name: "BodyContainer",
      props: {
        //  data: { type: Boolean, default: false },
        title: { type: String, default: null },
        
      },
         data() {
        return { 

        };
      }, 
  
      computed : {
             ...mapGetters('auth',['userSettings']),   
           
            },
  
      methods: {
        ...mapMutations('auth',['setMode']),  
      
         
      },
      mounted(){
        console.log("mounted HeaderComponent");
      }
    };

    </script>
    
    <style>  
    </style>
    
    