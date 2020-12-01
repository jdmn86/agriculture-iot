<template>

  <MainContainerAdmin>
    <div class="col-md-12">
          <HeadContainer>
                <template slot="top">Users</template>
                <template slot="search">searche</template>
          </HeadContainer>

          <BodyContent>
                <template slot="body">
                      <table class="table table-borderless">
                            <thead>
                                  <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email<i class="fas fa-user"></i></th>
                                  </tr>
                            </thead>
                            <tbody>
                                  <tr v-if="users.length == 0">
                                        <td colspan="4" style="text-align: center">No data available</td>
                                  </tr>
                                  <tr v-for="(user, index) in users" :key="user.id" v-else>
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                  </tr>
                            </tbody>
                      </table>
                </template> 
                 
          </BodyContent> 

           <router-view></router-view>
           <slot></slot>
    </div>

  
   </MainContainerAdmin>
</template>

<script>
  import HeadContainer from "../../../wrapper/HeadContainer";
  import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContent from "../../../wrapper/BodyContent";
  // import Sidebar from '../../../components/menu/SidebarMenu.vue';

  // import UserService from "../../../services/UserService";

  export default {
    name: "Users",
    data() {
      return {users: []};
    },
    components: {
      MainContainerAdmin,
      HeadContainer,
      BodyContent,
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

<style></style>
