<template>
  <div>
    <!-- <div id="demo" :class="[{'collapsed' : collapsed}]"> -->
      <!-- <MainContainerUser> -->
        <!-- <transition name="slide-fade">
          <router-view name="navTop"></router-view>
        </transition> -->
        <transition name="slide-fade">
          <router-view></router-view>
        </transition>
      
        <!-- <template> -->
          <!-- <sidebar-menu :collapsed="collapsed" :menu="menu" :width="'180px'"/> -->
          <!-- <router-view name="nav" :collapsed="collapsed"
        :show-one-child="true"
        @toggle-collapse="onToggleCollapse"
        @item-click="onItemClick"></router-view> -->
      <!-- </template> -->

      <!-- </MainContainerUser> -->

  </div> 
</template>

<script>
// import MainContainerUser from "../wrapper/MainContainerUser";
// import { SidebarMenu } from 'vue-sidebar-menu'
export default {
  name: "MainApp",
  components: {
    // MainLayout
  },
  data(){
        return{
              // collapsed: false,
        }
    },
    methods: {
            
            // onToggleCollapse (collapsed) {
            // console.log(collapsed)
            // this.collapsed = collapsed
            // },
            // onItemClick (event, item) {
            // console.log('onItemClick')
            // // console.log(event)
            // // console.log(item)
            // },
      },
      mounted() {
      console.log('Component MainApp mounted.')
      },
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
 