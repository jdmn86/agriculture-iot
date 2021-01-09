<template>

  <!-- <MainContainerAdmin> -->
      
      

            <!-- <HeadContainer :title="title">
                <template slot="top">Users</template>
                <template slot="search">searche</template>
          </HeadContainer> -->

          <!-- <BodyContainer> -->
                <!-- <template slot="body"> -->
            <div>
                  <Loading :loading.sync="loading" ></Loading>
                  <!-- <router-view></router-view> -->

                      <table class="table table-borderless">
                            <thead>
                                  <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email<i class="fas fa-user"></i></th>
                                  </tr>
                            </thead> 
                            <tbody>
                                  <tr v-if="users && users.length == 0">
                                        <td colspan="4" style="text-align: center">No data available</td>
                                  </tr>
                                  <tr v-for="(user, index) in users" :key="user.id" v-else>
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ user.name }}</td>
                                        <td>{{ user.email }}</td>
                                  </tr>
                            </tbody>
                      </table>
                <!-- </template>  -->
                <b-button   @click="$router.push({name:'userCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Company</b-button>

                <router-view></router-view>
      </div>


  
   <!-- </MainContainerAdmin> -->
</template>

<script>
  import HeadContainer from "../../../wrapper/HeadContainer";
  // import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer";
  // import Sidebar from '../../../components/menu/SidebarMenu.vue';
  import Loading from "../../../components/Loading";
  // import UserService from "../../../services/UserService";
  // import {mapGetters,mapActions} from 'vuex'
  // import {UserService} from "../../../services/UserService";

  export default {
    name: "Users",
    data() {
      return {
            title: "Users",
            loading: false,
            // users: [],
      };
    },
    components: {
      // MainContainerAdmin,
      HeadContainer,
      BodyContainer,
      Loading
    },
    computed : {
            // ...mapGetters('user',['users']),
    },
    created() {
      // this.getAllUsers();
    },
    methods: {
      // ...mapActions('user',['setUsers']),
      async fetchData () {

            this.loading = true
            try {
                  const { data } = await UserService.getList();//this.fetchParams)
                  this.setUsers(data);

            } catch (e) {
                  // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
                  this.error = e.message
                  console.log(e)
            } finally {
             this.loading = false
            }


            }
      },
      mounted () {

            console.log("---------Mounted---------");
      this.fetchData().then(() => {

            console.log("afect fetch");

            });

            console.log("Mounted Farm.vue");

      },
  };
</script>

<style></style>
