<template>
  <div>

    <layout>
      <transition name="slide-fade">
        <router-view name="navTop"></router-view>
      </transition>
      <transition name="slide-fade">
        <router-view></router-view>
      </transition>
    </layout>

  </div>
</template>

<script>
import Layout from "../wrapper/MainLayout";
export default {
  name: "app",
  components: {
    Layout
  }
};
</script>

<style> 
</style>
 