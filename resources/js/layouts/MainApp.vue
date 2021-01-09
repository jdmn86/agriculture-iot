<template>
  <div style="background-color: white;">
    
      

        <transition name="slide-fade">
          <router-view></router-view>
        </transition>
   
      <Footer/>

  </div> 
</template>

<script>
import Footer from "./Footer";



export default {
  name: "MainApp",
  components: { 
    Footer,
  },
  data(){ 
        return{         
        }
    },
    methods: {

    },
    mounted() {
    console.log('Component MainApp mounted.')
    },
    created (){
      
    }
};
</script>

<style> 


</style>
 