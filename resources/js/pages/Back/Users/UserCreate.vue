<template>
    <div>
      <Loading :loading.sync="loading" ></Loading>

      <b-col sm="6"   >
        <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
            <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
              <b-col cols="auto" class="mr-auto p-3">
                <!-- <h4 v-if="farmToEdit">Edit Farm</h4> -->
                <h4 >Add New User</h4>
              </b-col>
              <b-col cols="auto" class="p-3" >
                <a @click="$router.go(-1)">
                  <i class="fas fa-times fa-2x"/>
                </a>
              </b-col>
            </b-row> 
  
           <b-form @submit.prevent="saveCompany" style="margin-top: 40px;margin-left: 25px">
  
                
                    <b-form-group  label="name : " label-for="name"
                      label-cols-sm="5"> 
                      <b-form-input
                          id="name"
                          v-model="user.name"
                          type="text"
                          required
                          placeholder="name"
                          class="w-75 p-3" 
                      ></b-form-input>
                    </b-form-group>
  
                   

                      <b-form-group  label-cols-sm="5" label="email : " label-for="email">
  
                        <b-form-input
                          id="email"
                          v-model="user.email"
                          required
                          type="email"
                          placeholder="email"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group>

                      <!-- <b-form-group  label-cols-sm="5" label="password : " label-for="password">
  
                        <b-form-input
                          id="password"
                          v-model="user.password"
                          required
                          type="password"
                          placeholder="password"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group> -->


                      <b-form-group  label-cols-sm="5" label="company_id : " label-for="company_id">
  
                        <b-form-input
                          id="company_id"
                          v-model="user.company_id"
                          required
                          type="number"
                          placeholder="company_id"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group>
  
             
            </b-form>
            
            <b-row align-h="center" style="margin-top: 20px">
                  <!-- <b-button v-if="farmToEdit" type="submit" btn-block @click="updateFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button> -->
                  <b-button type="submit" btn-block @click="saveCompany" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
                 
            </b-row>
  
        </b-container>
        </b-col>



    </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
// import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer"
// import {UserService} from "../../../services/UserService"; 
import Loading from "../../../components/Loading";

import {mapGetters,mapActions} from 'vuex'

export default {
name: "UserCreate",
data() {
return {
  title: "User Create",
  loading: false,
  user: {
        name: null,
        email: null,
        password: null,
        company_id: null,
    },
};
},
components: {
// MainContainerAdmin,
HeadContainer,
BodyContainer,
Loading,
},
computed : {
    ...mapGetters('user',['users']),
},
created() {

},
methods: {
...mapActions('user',['setUsers','addUser']),
async saveCompany () {
    this.loading = true

    try {
      const { data } = await UserService.create(this.user);//this.fetchParams)
    //   this.company = data.content

      this.addUser(data);
      // this.pagination.total = data.total
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
  
    }
};
</script>

<style>
</style>
