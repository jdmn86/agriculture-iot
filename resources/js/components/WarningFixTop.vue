<template>
  <div>
    <b-alert
      :show="dismissCountDown"
      dismissible
      variant="danger"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged"
    >
      {{text}}
    </b-alert>

  </div>
</template>


<script>

  export default {
     props: {
 
      },
    data() {
      return {
        text: "",
        dismissSecs: 8,
        dismissCountDown: 0
      }
    },
    methods: {
      countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {

        this.dismissCountDown = this.dismissSecs
      }
    },
    created(){
      this.$bus.$on('warningFixTop', (data) => {
        this.text = data;          
        this.showAlert();
      })
    }
  }
</script>
<style >

.toast {
    opacity: 1 !important;
}

  </style>