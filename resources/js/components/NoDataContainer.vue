<template>
    <!-- <b-container > -->
        <b-row   style="padding:10px;" >

           <b-jumbotron>
               <h1>Não existem {{title}} </h1>

               <h1> Deseja adicionar {{title}} ? </h1>

                <slot name="button"></slot>
               
             </b-jumbotron>
         
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
    
    