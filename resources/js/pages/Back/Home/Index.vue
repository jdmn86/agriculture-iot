<template>
      <MainContainer>
            <div class="col-md-12">
                  <HeadContainer>
                        <template slot="title">All Users</template>
                        <template slot="body">
                              <table class="table table-borderless">
                                    <thead>
                                          <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
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
                  </HeadContainer>
            </div>
      </MainContainer>
</template>

<script>
import HeadContainer from "../../../components/HeadContainer";
import MainContainer from "../../../components/MainContainer";
//import UserService from "../../services/UserService"; 

export default {
  name: "Back",
  data() {
    return {
      users: []
    };
  },
  components: {
    MainContainer,
    HeadContainer
  },
  created() {
    this.getAllUsers();
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
