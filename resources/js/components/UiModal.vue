<template>
  <b-modal  id="my-modal-delete-terrain" hide-footer title="Confirmation" :header-text-variant="headerTextVariant">
             <div class="modal-window" style="padding: 20px">
  
              <p>Are you sure? Want to delete <strong v-if="toDelete">{{ toDelete.name }}</strong> ?</p>
             
             <!--  <div class="actions">
               <button class="cancel" @click="onCancel">Anular</button>
               <button class="confirm" @click="onConfirm">Confirmar</button>
              </div> -->
            </div>
              <div class="modal-footer">
                    <button class="btn btn-danger" v-on:click="onConfirm">Delete</button>
                    <button class="btn btn-primary" v-on:click="onCancel">Cancel</button>
                </div>
          </b-modal>
  </template>
  
  <script>
  import Vue from 'vue';
  
  // import GoogleMapsApiLoader from 'google-maps-api-loader'
  // import MapProvider from '../MapProvider.vue'
  import {mapGetters,mapMutations,mapActions} from 'vuex'
  
  // import axios from 'axios';
  
  // Vue.directive('scroll', {
  //   inserted: function (el, binding) {
  //     let f = function (evt) {
  //       if (binding.value(evt, el)) {
  //         window.removeEventListener('scroll', f)
  //         console.log("scroll remove listener");
  //       }
  //     }
  //     window.addEventListener('scroll', f)
  //     console.log("scroll add listener");
  //   }
  // })
  
      export default {
          name: 'ModalConfirmTerrainDelete',
           props:{
          terrainToDelete: Object,
        },
     components: {
       
     },
    data(){
      return {
        
            toDelete: null,
            headerTextVariant: 'light',
      }
    },
     watch: {
          // userTerrains: {
          //  handler: function() {
        
          //       this.userTerrainsD = this.userTerrains;
  
          //       },
          //   deep: true 
          // },
  
      },
       computed: {
            ...mapGetters(['getTerrainsByFarm','FARM_SELECTED','getTerrains','getTerrainSelect','EDITMODE']),
     
          },
          methods: { 
             ...mapMutations(['SELECTTERRAIN']),
              ...mapActions(['GETTERRAINS','action_delete_terrain']),
              // confirmDelete(t) {
              //   console.log("confirmDelete");
              //   this.toDelete = t;
              //   this.confirmModal = true;
              // },
              onConfirm(){
                console.log("deleteTerrain");
                this.confirmModal = false;
                this.action_delete_terrain(this.toDelete);
              },
              onCancel(){
                console.log("click on cancel");
                this.confirmModal = false;
                this.$emit('update');
  
              },
             },
                   
          async mounted () { // point 3
  
            this.toDelete=this.$props.terrainToDelete;
  
            console.log('Component modalconfirmterraindelete mounted.');
           // console.log(this.userTerrains);
          },
      }
  </script>
  
  <style >
  
  .modal-header{
  background-color: #4AAD37;
  }
  </style>
  <!-- USING -->
  