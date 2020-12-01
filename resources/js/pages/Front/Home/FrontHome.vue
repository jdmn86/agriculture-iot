<template>
      <MainContainerUser>
            
                  <HeadContainer>
                        <template slot="top">
                              <HeaderComponent :title="title" />    
                        </template>

                        <template slot="search">
                              <h1>search slot</h1>
                        </template>

                  </HeadContainer> 

                  <BodyContent >

                        <template slot="body">
                              <h1>Back home</h1>
                        </template> 

                  </BodyContent>
                  
                  

                  <router-view></router-view>
            
      </MainContainerUser>
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContent from "../../../wrapper/BodyContent";
import HeaderComponent from "../../../components/HeaderComponent";
//import UserService from "../../services/UserService"; 

export default {
  name: "FrontHome",
  data() {
    return {
      title: "Home",
    };
  },
  components: {
      MainContainerUser,
    HeadContainer,
    BodyContent,
    HeaderComponent
  },
  created() {
   
  },
  computed:{
      
  },
  methods: {
     
   
  }
};
</script>

<style>
</style>
