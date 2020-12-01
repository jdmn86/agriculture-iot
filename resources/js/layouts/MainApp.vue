<template>
  <!-- <div> -->
  
      <MainLayout>
        <transition name="slide-fade">
          <router-view name="navTop"></router-view>
        </transition>
        <transition name="slide-fade">
          <router-view></router-view>
        </transition>
      </MainLayout>

  <!-- </div>  -->
</template>

<script>
import MainLayout from "../wrapper/MainLayout";
export default {
  name: "app",
  components: {
    MainLayout
  }
};
</script>

<style> 
</style>
 