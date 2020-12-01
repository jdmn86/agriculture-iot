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

                  <BodyContent v-if="FARMS">

                        <template slot="body">
                              <h1>Back home</h1>
                        </template> 

                  </BodyContent>
                  
                  <BodyNoContent v-else>

                        <template slot="body">
                              <h1>Sem dados</h1>
                        </template> 

                  </BodyNoContent>

                  <router-view></router-view>
            
      </MainContainerUser>
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContent from "../../../wrapper/BodyContent";
import BodyNoContent from "../../../wrapper/BodyNoContent";
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
    BodyNoContent,
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
