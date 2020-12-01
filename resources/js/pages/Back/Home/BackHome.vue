<template>
      <MainContainerAdmin>
            
                  <HeadContainer>
                        <template slot="top">
                              <HeaderComponent :title="title" />    
                              <!-- <h1>{{userPermissions}}</h1>                          
                              <h1>{{userRole}}</h1>                          
                              <h1>{{userSettings.mode}}</h1>                           -->
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
            
      </MainContainerAdmin>
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContent from "../../../wrapper/BodyContent";
import HeaderComponent from "../../../components/HeaderComponent";
//import UserService from "../../services/UserService"; 

export default {
  name: "Back",
  data() {
    return {
      title: "home Back",
    };
  },
  components: {
    MainContainerAdmin,
    HeadContainer,
    BodyContent,
    HeaderComponent,
  },
  created() {
    this.getAllUsers();
  },
  computed:{
      
  },
  methods: {
     
     getAllUsers() {
    //   UserService.getAllUsers()
    //     .then(userList => {
    //       this.users = userList;
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
     }
  }
};
</script>

<style>
</style>
