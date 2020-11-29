<template>
  <div>
    
    <b-nav-item href="" @click.prevent="modalShow = !modalShow"> <h5>Login</h5></b-nav-item>

    <b-modal

      v-model="modalShow"
      id="modal-Login"
      ref="modal"      
      title="Login"
      hide-footer       
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

                            <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a> -->
                        </div>
                    </div>

    <!-- <div class="d-block text-center">

      <b-form @submit.prevent="LOGIN(form)">
          <b-form-group 
            id="email"
            label="Email : " 
            label-for="email"
            label-cols-sm="4"
          >
            <b-form-input
              id="input-1" 
              v-model="form.email"
              type="email"
              required
              placeholder="Enter email"
              class="w-75 p-3" 
            ></b-form-input>
          </b-form-group>

          <b-form-group id="password" label-cols-sm="4" label="Password : " label-for="password">
            <b-form-input
              id="password"
              v-model="form.password"
              required
              type="password"
              placeholder="Enter password"
              class="w-75 p-3"
            ></b-form-input>
          </b-form-group>

          <b-button type="submit" @click="forgottenPassword"  style="background-color: #914323; border-color: #914323">Forgotten password</b-button>

          <b-button type="submit" style="background-color: #914323; border-color: #914323">Login</b-button>
          
          <div v-if="ERROR">{{ERROR}}</div>

        </b-form>
      </div> -->

    </b-modal>
  </div>
</template>

<script>
  
import {mapGetters,mapActions,mapMutations} from 'vuex'
import AuthService from "../services/AuthService";
import Form from "../services/FormService";

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
          ...mapGetters(['auth/currentUser','auth/isLoggedIn']),          
            
          },

    methods: {
        ...mapMutations([]),           
        ...mapActions(['']),
        updateCredentialsOnlyEmail(){
          this.credentialsOnlyEmail.email = this.credentials.email;
        },
        handleLogin() {

          AuthService.login(this.credentials)
          .then(user => {
            // dispatch calls action , commit calls mutations
            this.$store.dispatch("auth/setCurrentUser", user);
            // this.$toaster.success("Login successful.");
            this.$router.push("/front/home");
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
        forgottenPassword(){
            console.log("credentialsOnlyEmail : "+ JSON.stringify(this.credentialsOnlyEmail));
          AuthService.forgotPassword(this.credentialsOnlyEmail)
          .then(response => {
              console.log("response : "+JSONstringify(response))
            // dispatch calls action , commit calls mutations
            // this.$store.dispatch("global/setCurrentUser", user);
            // this.$toaster.success("Login successful.");
            // this.$router.push("/dashboard");
          })
          .catch(error => {
            console.log("resposta erro :"+ JSON.stringify(error));
            if (error.response.status === 422) {
              this.form.record(error.response.data.errors);
            } else if (error.response.status === 401) {
              this.form.record({email: ['The credentials do not match our records.']});
            }
            this.form.record({email: ['The credentials do not match our records.']});
          });
        }

    },

  }
</script>

<style scoped lang="scss">

.color-bg {
  
  background-color: #914323;
  
}


</style>