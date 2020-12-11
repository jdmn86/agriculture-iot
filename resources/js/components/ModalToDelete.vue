
<template>
  <b-modal id="ModalToDelete" hide-footer  title="Confirmation" :header-text-variant="headerTextVariant" header-class="backcolor" >

  
              <div class="modal-window" style="padding: 20px">
  
              <p>Are you sure? Want to delete <strong v-if="toDelete.name">{{ toDelete.name }}</strong> ?</p>
              
              <div class="actions">
                <button type="button" class="btn btn-primary"  @click="$bvModal.hide('ModalToDelete')">Anular</button>
                <button type="button"  class="btn btn-danger" @click="onConfirm">Confirmar</button>
              </div>
            </div>
          
          </b-modal>
  </template>
  
  <script>
  
  import {mapGetters,mapMutations,mapActions} from 'vuex'
  
  
      export default {
          name: 'ModalToDelete',
            props:{
            toDelete: Object,
            onConfirm: Function,
          },
      components: {
        
      },
    data(){
      return {
            headerTextVariant: 'light',
      }
    },
      watch: {
          
      },
        computed: {
      
          },
          methods: { 
          
              onCancel(){
                console.log("click on cancel");
                // this.confirmModal = false;
                // this.$emit('update');
  
              },
              },
                    
          async mounted () { // point 3
  
            // this.toDelete=this.$props.terrainToDelete;
  
            console.log('Component modalToDelete mounted.');
            // console.log(this.userTerrains);
          },
      }
  </script>
  
  <style scoped>
  
  /deep/ .backcolor {
  background: red ;
  color: white;
}
/*
  #backcolor{
     background-color: #4AAD37 !important;
  }*/
/*
  .modal-header{
    background-color: #4AAD37 !important;
  }*/

  </style>

  