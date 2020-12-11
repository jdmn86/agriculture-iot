<template>
  <div>
    
    <b-nav-item href="" @click.prevent="modalShow = !modalShow"> <h5>Login</h5></b-nav-item>

    <b-modal

      v-model="modalShow"
      id="modal-Login"
      ref="modal"      
      title="Login"
      hide-footer 
      header-class="backcolor"      
    >

 
   <form @submit.prevent="handleLogin">
  
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model="credentials.email"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('email')}"
                                       name="email" autofocus
                                       autocomplete="off"
                                       @change="updateCredentialsOnlyEmail"
                                >
                                <span v-if="form.hasError('email')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('email') }}</strong>
                                </span>
                            </div> 
                        </div> 

                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="credentials.password"
                                       :class="{'form-control': true, 'is-invalid': form.hasError('email')}"
                                       name="password"
                                       autocomplete="off"
                                >
                                <span v-if="form.hasError('password')" class="invalid-feedback" role="alert">
                                    <strong>{{ form.getError('password') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                    </form>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button  @click="handleLogin" class="btn btn-primary">
                                Login
                            </button>

                             <button @click="forgottenPassword" class="btn btn-primary">
                                Forgot
                            </button>

                        </div>
                    </div>

    </b-modal>
  </div>
</template>

<script>
  
// import {mapGetters,mapActions,mapMutations} from 'vuex'
import {AuthService} from "../services/AuthService";
import {RoleService} from "../services/RoleService";
import {PermissionService} from "../services/PermissionService";
import Form from "../services/FormService";

import store from '@/store'
import Auth from '@/models/Auth'

  export default {
    name: `Login`,
       data() {
      return {
        modalShow: false,
        credentials: {
          email: "", 
          password: ""
        },
        credentialsOnlyEmail: {
          email: "",
        },
        error: null,
        form: new Form(),
      };
    },

    computed : {
          // ...mapGetters('auth',[
          //   'userRole']),         
            
           },

    methods: {
        // ...mapMutations([]),           
        // ...mapActions(['']),
        updateCredentialsOnlyEmail(){
          this.credentialsOnlyEmail.email = this.credentials.email;
        },
        async handleLogin(){
          try {

            await AuthService.login(this.credentials)

            // const {data} = await RoleService.getList();
            // Role.insert({data: data});

            // const {data2} = await PermissionService.getList();
            // Permission.insert({data: data2});

            this.error = ''
            
           
            
          } catch (error) {
            // this.$store.commit('toast/NEW', { type: 'error', message: error.message })
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }
        },
      
        async forgottenPassword(){
          console.log("this.credentialsOnlyEmail : " + JSON.stringify(this.credentialsOnlyEmail))
          try{
            await AuthService.forgotPassword(this.credentialsOnlyEmail);

            this.error = ''

          } catch(error){
            // this.$store.commit('toast/NEW', { type: 'error', message: error.message })
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }
          
          
        }

    },

  }
</script>

<style  scoped>

 /deep/ .backcolor {
  background: #914323 ;
  color: white;
}



</style>