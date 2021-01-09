
<template>
   
<b-col align-h="center">
    <b-button @click="$bvModal.show('ModalToDelete')" variant="light" block  style=" border-color: #ff0000;color: #ff0000;margin: 5px">Delete</b-button>

      <b-modal id="ModalToDelete" hide-footer  title="Confirmation" :header-text-variant="headerTextVariant" header-class="backcolor" >

  
              <div class="modal-window" style="padding: 20px">
  
              <p>Are you sure? Want to delete <strong v-if="name">{{ name }}</strong> ?</p>
              
              <div class="actions">
                <button type="button" class="btn btn-primary"  @click="$bvModal.hide('ModalToDelete')">Anular</button>

                <slot name="deleteButton"/>
               
              </div>
            </div>
          
          </b-modal>
</b-col>

  </template>
  
  <script>
   
  
      export default {
          name: 'ModalToDelete',
            props:{
             name: String,
            // onConfirmDelete: Function,
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
                    
          async mounted () { 
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

/deep/ .modal-backdrop
{
    opacity:0.8 !important;
}

  </style>

  