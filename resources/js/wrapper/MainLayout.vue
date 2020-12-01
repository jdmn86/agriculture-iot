<template>
  <div>
  <!-- <div id="demo" :class="[{'collapsed' : collapsed}]"> -->
    <!-- <main-header/> -->
    <!-- <div class="container"> -->
      <slot/>
    <!-- </div> -->
    <!-- <main-footer/> -->
  </div>
</template>

<script>
// import MainHeader from "../layout/Header.vue";
// import MainFooter from "../layout/Footer.vue";
export default {
  components: {
    // MainHeader,
    // MainFooter 
  },
  created() {},
  methods: {}
};
</script> 

<style>
  /* #demo {
  padding-left: 180px;
}
#demo.collapsed {
  padding-left: 50px;
} */

</style>
  