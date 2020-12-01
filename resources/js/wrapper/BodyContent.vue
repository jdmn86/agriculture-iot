<template>
    <div>
        <b-row   style="margin: 10px; padding-top: 25px; ">

            <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">

                <slot name="content"></slot>

            </b-container> 

        </b-row>

        
    </div>
</template>


<script>
    export default {
      name: "BodyContent"
    };
    </script>
    
    <style>  
    </style>
    
    