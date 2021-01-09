<template>

    <!-- <div> -->
    <b-navbar toggleable="lg" type="light" style="background-color: #f2f2f2; height: 42px">
        <b-collapse id="nav-collapse" is-nav>
          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
                <img src="/img/bell-regular.svg" height="20px" style="margin-right: 20px; margin-left: 60px; margin-top: 10px">

   <!--          <b-nav-item-dropdown text="Lang" right>
              <b-dropdown-item href="#">EN</b-dropdown-item>
              <b-dropdown-item href="#">PT</b-dropdown-item>
            </b-nav-item-dropdown> -->

            <b-nav-item-dropdown right> 
              <!-- Using 'button-content' slot -->
              <template v-slot:button-content> 
                <em>{{auth.name}}</em>
              </template>
              <router-link class="dropdown-item" :to="{name: 'account'}">Account</router-link>   
              <!-- <b-dropdown-item to="/front/account"> Account</b-dropdown-item> -->
              <!-- <b-dropdown-item  @click="account">Account</b-dropdown-item> -->
              <b-dropdown-item @click="logout">Sign Out</b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    <!-- </div> -->
 
<!-- <nav class="container-fluid"  style="background-color: #f5f5f5; height: 50px">
   
      <div class="row">
        <div class="col-12 col-md-9">
          
        </div>
        <div class="col-3 col-md-1">
          <img src="/img/bell-regular.svg" height="20px" style="margin-right: 20px; margin-left: 60px; margin-top: 10px">
        </div>
      </div> -->
        
        


<!-- </nav> -->



</template>

<script>
import Vue from 'vue';
// import {mapGetters,mapMutations,mapActions} from 'vuex'
// import {AuthService} from "../services/AuthService";

import Auth from '@/models/Auth'

    export default {
        name: 'TopNavBarUser', 
        components:{},
        props: {
        
        },
        data() {
            return{
             

            }
        },
        computed : {
          // ...mapGetters("auth", {      
          //   isLoggedIn: "isLoggedIn",
          //   currentUser: "currentUser"
          // }),
          auth () {
            return Auth.query().first();
        }
          },
  
        methods: {          
          // ...mapActions('auth',['logout']),          
          // account(){
          //   this.$router.push('/front/Account');
          // },
          async logout(){
            try {
              // console.log("this.auth :"+JSON.stringify(this.auth))
                await Auth.api().delete('/auth/logout',{delete: this.auth.id});

                // Auth.deleteAll();
                
                localStorage.removeItem('auth');

                this.$router.push('/');
                 // await AuthService.logout(this.auth)
                // this.logout();
              
            } catch (error) {
            // this.$store.commit('toast/NEW', { type: 'error', message: error.message })
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }
          },
        },

        mounted() {
            //this.currentUser = this.$store.getters.currentUser;
            //this.currentUser = JSON.parse(localStorage.getItem("user"));
 
              // const user_data = JSON.parse(localStorage.getItem('user'));
              //   if(user_data){
              //     this.$store.commit('SET_USER',user_data);
                  
              //   }
              
            

          // this.getUserTerrains();
            //this.changeNav();
            console.log('Component TopNavBar mounted.')
            
        },
    }
</script>

<style>


</style>
