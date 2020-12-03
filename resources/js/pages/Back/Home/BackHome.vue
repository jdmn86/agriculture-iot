<template>
      <MainContainerAdmin>
            
                  <HeadContainer :title="title" >
                       
                        <template slot="search">
                              <h1>search slot</h1>
                        </template>

                  </HeadContainer> 

                  <BodyContainer >

                        <template slot="body">
                              <h1>Back home</h1>
                        </template> 

                  </BodyContainer>
                  

                  <router-view></router-view>
            
      </MainContainerAdmin>
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer";
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
    BodyContainer,
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
