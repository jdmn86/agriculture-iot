<template>
<!--     <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <router-link class="navbar-brand" to="/">vueBook</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <template v-if="!isLoggedIn">
                        <li>
                            <router-link to="/login" class="nav-link">Login</router-link>
                        </li>
                        <li>
                            <router-link to="/register" class="nav-link">Register</router-link>
                        </li>
                    </template>
                    <template v-else>
                        <li>
                            <router-link to="/users" class="nav-link">Users</router-link>
                        </li>
                        <li>
                            <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                        </li>
                        <li>
                            <a href="#" class="nav-link" @click="logOut">Log Out</a>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav> -->

    <div>
        <!-- <template v-if="isLoggedIn">Login</template> -->
  <b-navbar toggleable="lg" type="dark" style="background-color: #914323;" >

   <!--  <b-navbar-brand href="#">
    <router-link class="navbar-brand" to="/front/home">
      <img src="/img/logo3.png" height="60px" class="d-inline-block align-top"  style="margin-right: 20px; margin-left: 50px">
      Sada Lab
    </router-link>
    </b-navbar-brand> -->

 

    <b-navbar-brand href="#"><router-link class="navbar-brand" to="/front/home"><img src="/img/logo3.png" height="60px" style="margin-right: 20px; margin-left: 50px"><h2>Sada Lab</h2></router-link></b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
      
      <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto"> 
            <template v-if="!currentUser"> 
          
                <b-nav-item href="#what"><h5>What we do</h5></b-nav-item>
                <b-nav-item href="#product"><h5>Products</h5></b-nav-item>
                <b-nav-item href="#for"><h5>For</h5></b-nav-item>
                <b-nav-item href="#who"><h5>Founders</h5></b-nav-item> 
                <b-nav-item href="#contact"><h5>Contact</h5></b-nav-item>

                <!-- <b-nav-item href="" @click.prevent="showModal('LoginModal')"> Login</b-nav-item> -->
                <Login/>
            
            <!-- <b-nav-item right> -->
                <b-nav-item >
                    <b-form-select v-model="$i18n.locale" :options="langs" right></b-form-select>
                </b-nav-item>
                <!-- <div class="mt-3">Lang: <strong>{{ lang }}</strong></div> -->

                <!-- <select class="b-nav-item-dropdown right" v-model="$i18n.locale">
                    <option class="b-dropdown-item" v-for="(lang, i) in langs" :key="`Lang${i}`" :value="lang">{{ lang }}</option>
                </select>       -->
            <!-- </b-nav-item> -->

            </template>
            <template v-else>
                <b-nav-item-dropdown right>
              <!-- Using 'button-content' slot -->
                <template v-slot:button-content>
                    <em>{{ currentUser.name }}</em>
                </template>
                    <b-dropdown-item href="#" @click="home">Home</b-dropdown-item>
                    <b-dropdown-item href="#" @click="logout">Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>

      
            </template>
        </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>

</template> 
<script>
    import {mapGetters} from "vuex";
    import Login from '../components/Login.vue';
    import AuthService from "../services/AuthService";
  export default {
    name: "app-header",
    components: {
        Login
    },
    data() {
            return{
                langs: ['pt', 'en'], 
                // selectedLang: null,
            }
        },
    computed: {
       ...mapGetters("auth", {      
          isLoggedIn: "isLoggedIn",
          currentUser: "currentUser"
        }),
    },
    methods: {
        logout() {
        AuthService.logout()
          .then(response => {
            console.log("before:"+JSON.stringify(response)); 
            // dispatch calls action , commit calls mutations
            this.$store.dispatch("auth/logout");

            console.log("response teste:"+JSON.stringify(response));
            // this.$toaster.success("Login successful.");
            this.$router.push("/");
            // router.push('/front/home');
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.error= error.response.data.errors;
            } else if (error.response.status === 401) {
              this.form.record({email: ['The credentials do not match our records.']});
            }
            // this.$toaster.error("The credentials do not match our records.");
          });

          
        },
        home() {
            //this.$store.commit('logout');
            this.$router.push('/front/home');
        },
      
    }
  };
</script>