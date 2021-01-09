<template>
  <div>
    
   <!--  <b-nav-item href="" @click.prevent="modalShow = !modalShow"> <h5>Login</h5></b-nav-item> -->

    <b-modal

      v-model="modalShow"
      id="modal-Login"
      ref="modalLogin"      
      title="Login"
      hide-footer 
      header-class="backcolor"     
    > 

    <validation-observer ref="observer" v-slot="{ handleSubmit }">

   <form @submit.prevent="handleSubmit(login)"> 
  

                     <ValidationProvider  
                            name="email" 
                            rules="required|email" 
                            v-slot=" validationContext ">
                              <b-form-group  id="input-group-email" label="Email" label-for="input-email" style="margin:20px"> 
                                <b-form-input
                                    id="input-email" 
                                    name="input-email"
                                    v-model="credentials.email"
                                    :state="getValidationState(validationContext)"
                                    aria-describedby="input-email-live-feedback"
                                     @change="updateCredentialsOnlyEmail"
                                ></b-form-input>

                        <b-form-invalid-feedback id="input-email-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                  
                                  </b-form-group>
                    </ValidationProvider>


                       <!--  <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" v-model="credentials.email"
                                       name="email" autofocus
                                       autocomplete="off"
                                       @change="updateCredentialsOnlyEmail"
                                >
                                
                            </div> 
                        </div>  -->


                        <ValidationProvider 
                            name="password" 
                            rules="required|min:3" 
                            v-slot=" validationContext ">
                              <b-form-group  id="input-group-password" label="Password" label-for="input-password" style="margin:20px"> 
                                <b-form-input
                                    id="input-password"
                                    name="input-password"
                                    v-model="credentials.password"
                                    :state="getValidationState(validationContext)"
                                    aria-describedby="input-password-live-feedback"
                                    type="password"
                                ></b-form-input>

                        <b-form-invalid-feedback id="input-password-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                  
                                  </b-form-group>
                    </ValidationProvider>


                       <!--  <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" v-model="credentials.password"
                                       name="password"
                                       autocomplete="off"
                                >
                               
                            </div>
                        </div> -->

                      <!--   <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <b-row align-h="end" style="margin-bottom: 10px">

                            <b-col cols="4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>

                            </b-col>
                        </b-row>
                        
                    </form>
</validation-observer>

                     <b-row align-h="around" style="margin: 15px">

                        <b-col>
                            <b-button  type="submit" block @click="forgottenPassword" variant="primary" style="padding: 8px">Forgot Password</b-button>
                        </b-col>
                        <b-col>
                            <b-button  type="submit" block @click="login" variant="success" style="padding: 8px">Login</b-button>
                        </b-col>
                       

                      </b-row>


                  <!--   <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button  @click="handleLogin" class="btn btn-primary">
                                Login
                            </button>

                             <button @click="forgottenPassword" class="btn btn-primary">
                                Forgot
                            </button>

                        </div>
                    </div> -->

    </b-modal>
  </div>
</template>

<script>
  
import {AuthService} from "@/services/AuthService";
// import {RoleService} from "../services/RoleService";
// // import {PermissionService} from "../services/PermissionService";
// // import Form from "../services/FormService";

// import store from '@/store'
// import User from '@/models/User'
import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: `Login`,
       data() {
      return {
        modalShow: true,
        credentials: {
          email: "", 
          password: ""
        },
        credentialsOnlyEmail: {
          email: "",
        },
        error: null,
        // form: new Form(),
      };
    },

    computed : {
          
           },

    methods: {
        getValidationState({ dirty, validated, valid = null }) {
            return dirty || validated ? valid : null;
        },

        
        updateCredentialsOnlyEmail(){
          this.credentialsOnlyEmail.email = this.credentials.email;
        },
        async login(){
          try {

            // await AuthService.login(this.credentials)

            
            const result = await Auth.api().post('auth/login',this.credentials);

  // console.log("response of login :"+JSON.stringify(response.data));
              // await Store.dispatch("auth/setCurrentUser", response.data);
              // Auth.insert({data: response.data});

              localStorage.setItem("auth", JSON.stringify(result.response.data));

              this.modalShow = false;
              this.$router.push({name:"home"});




           

            // this.error = ''
            
           
            
          } catch (error) {
            this.$bus.$emit('warningFixTop', error.message);
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
            this.$bus.$emit('warningFixTop', error.message);
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }
          
          
        },

      doSomethingOnHidden(){
        console.log("doSomethingOnHidden");
      //do something
          this.modalShow = false;
          this.$router.push({name:"welcome"});
      }

    },
     created () {
      console.log("created Login");

    
      },
     mounted () {
      console.log("Mounted Login");

       // this.$refs.modalLogin.$on('bv::modal::hide', this.doSomethingOnHidden);

    //   this.$root.$on('bv::modal::hide', (bvEvent, modalId) => {
    //   console.log('Modal is about to be shown', bvEvent, modalId)
    // })

 this.$refs.modalLogin.$on('hidden', this.doSomethingOnHidden )

       // $(this.$refs.modalLogin).on("bv::modal::hidden", this.doSomethingOnHidden)
      }

  }
</script>

<style  scoped>

 /deep/ .backcolor {
  background: #914323 ;
  color: white;
}

/deep/ .modal-backdrop
{
    opacity:0.8 !important;
}



</style>