<template>
            <div class="col-md-12" style="background-color: red">
                <h1>Company</h1>
            </div>
 
          <!-- <transition name="slide-fade">
            <Sidebar/>
          </transition> -->
          
</template>

<script>
import HeadContainer from "../../../components/HeadContainer";
import MainContainer from "../../../components/MainContainer";

// import Sidebar from '../../../components/menu/SidebarMenu.vue';

import UserService from "../../../services/UserService"; 

export default {
  name: "Home",
  data() {
    return {
      users: []
    };
  },
  components: {
    MainContainer,
    HeadContainer,
    
  },
  created() {
    // this.getAllUsers();
  },
  methods: {
    // getAllUsers() {
    //   UserService.getAllUsers()
    //     .then(userList => {
    //       this.users = userList;
    //     })
    //     .catch(error => {
    //       console.log(error);
    //     });
    // }
  }
};
</script>

<style>
</style>
