
<template>
   
<b-col class="col-auto align-self-end" style="margin-left: 10px">
   <b-button v-can="'terrain-edit'"  @click="$bvModal.show('ModalToConfirmUpdate')"  block  style=" border-color: #4AAD37;background-color: #4AAD37; ">{{isTo}}</b-button>
   <slot name="saveUpdate"/>

      <b-modal id="ModalToConfirmUpdate" hide-footer  title="Confirmation" :header-text-variant="headerTextVariant" header-class="backcolor" >

  
              <div class="modal-window" style="padding: 20px">
  
              <p>Are you sure? Want to {{isTo}} <strong v-if="name">{{ name }}</strong> ?</p>
              
              <div class="actions">
                <button type="button" class="btn btn-primary"  @click="$bvModal.hide('ModalToConfirmUpdate')">Anular</button>

                <slot name="confirmButton"/>
               
              </div>
            </div>
          
          </b-modal>
</b-col>
  </template> 
  
  <script>
  
  
      export default {
          name: 'ModalToConfirm',
            props:{
            name: String,
            isTo: String,
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
  
            console.log('Component ModalToConfirm mounted.');
            // console.log(this.userTerrains);
          },
      }
  </script>
  
  <style scoped>
  
  /deep/ .backcolor {
  background: blue ;
  color: white;
}

/deep/ .modal-backdrop
{
    opacity:0.8 !important;
}

  </style>

  