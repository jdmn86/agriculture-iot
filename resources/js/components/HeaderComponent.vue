<template>
    <!-- <b-row style="margin: 10px; "> -->
    <b-row style="margin: 10px; ">
        <b-col >
            <h1 style="color: rgb(74, 173, 55);padding-top: 30px " class="font-weight-bolder">{{title}}</h1>
        </b-col>
          <b-col cols="auto" class="header-component-content">
            <toggle-button @change="setMode" :value="userSettings.mode"  :height="25" :width="110" :font-size="13" :sync="true" :labels="{checked: 'Edit Mode', unchecked: 'View Mode'}" color="rgb(74, 173, 55)"/>
        </b-col>
        <!-- <h1 v-can="role-list">Pode</h1>
          <h1 v-if="$can('role-list')">You have permission to manage users</h1>
          <h1 v-else>You dont have permission to manage users</h1> -->
    </b-row>
  <!-- </div> -->

  </template>
  
  <script>
    
  import {mapGetters,mapMutations,mapActions} from 'vuex'

    export default {
      name: `HeaderComponent`,
      props: {
        title: { type: String, default: "without text" },
        
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
  
    }
  </script>
  
  <style scoped lang="scss">

  
  
  </style>