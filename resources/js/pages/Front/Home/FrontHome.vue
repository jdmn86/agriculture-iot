<template>
      <!-- <MainContainerUser> -->
      <!-- <div id="demo" :class="[{'collapsed' : collapsed}]">
            <b-container fluid style="padding-left: 0px; padding-right: 0px;"> -->
      <!--  <div class="py-4 main">
                  <div class="container">
                        <div class="row justify-content-center"> -->
                        <!-- <div class="container-fluid"> -->

                              <!-- <TopNavBarUser/> -->
                              
                              <h1>Front HOME</h1>
                              <!-- <slot></slot> -->                               
                              
  
                              <!-- <template>
                                    <sidebar-menu :menu="menu" :width="'180px'"/>
                              </template> -->
                        <!-- </div> -->
            <!--      </div>
            </div> -->
            <!-- </b-container> 
      </div> -->
<!-- </MainContainerUser> -->
</template>

<script> 
 import HeadContainer from "../../../wrapper/HeadContainer";
 // import MainContainerUser from "../../../wrapper/MainContainerUser";
 import BodyContainer from "../../../wrapper/BodyContainer";
// import HeaderComponent from "../../../components/HeaderComponent";
//import UserService from "../../services/UserService"; 

export default {
  name: "FrontHome",
  data() {
    return {
      title: "Home",
    } 
  },
  components: {
      // MainContainerUser,
      HeadContainer,
      BodyContainer,
//     HeaderComponent,
  },
  created() {
   
  },
  computed:{
      
  },
  methods: {
      onToggleCollapse (collapsed) {
            console.log(collapsed)
            this.collapsed = collapsed
            },
            onItemClick (event, item) {
            console.log('onItemClick')
            // console.log(event)
            // console.log(item)
            },
   
  }
};
</script>


<style >
      #demo {
       padding-left: 180px;
     }
     #demo.collapsed {
       padding-left: 50px;
     }
     
/*     .v-sidebar-menu {
         background-color: #4AAD37 !important;
     }       
     .v-sidebar-menu .vsm--toggle-btn { 
         color: #fff;
         background-color: #327927 !important;
     }
     .v-sidebar-menu .vsm--link_level-1 .vsm--icon {
         background-color: #327927 !important;
     }*/
     </style>  
      
     
     
     
     
     
