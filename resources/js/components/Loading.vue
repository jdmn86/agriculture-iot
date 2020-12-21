<template>    


        <loading :active.sync="loading" 
        :can-cancel="false" 
        :on-cancel="onCancel"
        :color="color"
        :height="110"
        :width="110"
        :is-full-page="fullPage"
        :blur="'1'"></loading>

</template>
  <script>
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        props:{ 
            loading: { type: Boolean, default: false },
        },
      data() {
        return {
                // isLoading: false,
                fullPage: false,
                color: "#4AAD37",
            }
      },
      components: {
        Loading
      },
      methods: {
        // doAjax() {
        //         this.isLoading = true;
        //         // simulate AJAX
        //         setTimeout(() => {
        //           this.isLoading = false
        //         },5000)
        //     },
            onCancel() {
              console.log('User cancelled the loader.')
            }
        }
    }
  </script>