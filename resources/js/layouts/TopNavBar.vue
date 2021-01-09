<template>


    <div>
        <!-- <template v-if="isLoggedIn">Login</template> -->
  <b-navbar toggleable="lg" type="dark" style="background-color: #914323;" >

    <b-navbar-brand href="#" style="padding: 0px;"><router-link class="navbar-brand" to="/front/home" style="padding: 0px;"><b-row align-v="end"><img src="/img/logo3.png" height="50px" style="margin-right: 20px; margin-left: 40px"><h2>Sada Lab</h2></b-row></router-link></b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
      
      <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto align-items-end"> 
            <template v-if="!auth"> 
          
                <b-nav-item href="#what"><h5>What we do</h5></b-nav-item> 
                <b-nav-item href="#product"><h5>Products</h5></b-nav-item>
                <b-nav-item href="#for"><h5>For</h5></b-nav-item> 
                <b-nav-item href="#who"><h5>Founders</h5></b-nav-item> 
                <b-nav-item href="#contact"><h5>Contact</h5></b-nav-item>

                <!-- <b-nav-item href="" @click.prevent="showModal('LoginModal')"> Login</b-nav-item> -->


                <!-- <Login/> -->
                 <b-nav-item :to="{path: '/login'}"><h5>Login</h5></b-nav-item>


        <transition  name="slide-fade">
            <router-view ></router-view>
        </transition>


              <!--   <router-link class="dropdown-item" :to="{name: 'login'}">Account</router-link>   -->
             
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
                    <em>{{ auth.name }}</em>
                </template>
                    <router-link class="dropdown-item" :to="{name: 'home'}">Home</router-link>                    
                    <b-dropdown-item  @click="logout">Sign Out</b-dropdown-item>
                </b-nav-item-dropdown>

      
            </template>
        </b-navbar-nav>
    </b-collapse>
  </b-navbar> 
</div>

</template> 
<script>
    // import {mapGetters,mapMutations,mapActions} from 'vuex'
    import Login from '../components/Login.vue';
    // import {AuthService} from "../services/AuthService";

    import Auth from '@/models/Auth'

  export default {
    name: 'TopNavBar',
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
       // ...mapGetters("auth", {      
       //    isLoggedIn: "isLoggedIn",
       //    currentUser: "currentUser"
       //  }),
        auth () {
            return Auth.query().first();
        }
    },
    methods: {
        // ...mapGetters('auth',['logout']), 
        async logout() {
            try {
               await Auth.api().delete('/auth/logout',{delete: this.auth.id});
               
               // Auth.deleteAll();

                localStorage.removeItem('auth');

                this.$router.push('/');
              
            } catch (error) {
            // this.$store.commit('toast/NEW', { type: 'error', message: error.message })
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }

          
        },
        // home() {
        //     //this.$store.commit('logout');
        //     this.$router.push('/front/home');
        // },
      
    }
  };
</script>