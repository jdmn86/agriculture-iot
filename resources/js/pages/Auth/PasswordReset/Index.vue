<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">New Password</div>
          <div class="card-body">
            <!-- <ul v-if="errors">
              <li v-for="error in errors" v-bind:key="error">{{ msg }}</li>
            </ul> -->
            <form autocomplete="off" @submit.prevent="resetPassword" method="post">
              <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="passReset.email" required>
              </div>
              <div class="form-group">
                  <label for="email">Password</label>
                  <input type="password" id="password" class="form-control" placeholder="" v-model="passReset.password" required>
              </div>
              <div class="form-group">
                  <label for="email">Confirm Password</label>
                  <input type="password" id="password_confirmation" class="form-control" placeholder="" v-model="passReset.password_confirmation" required>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
 
import Vue from 'vue';
import AuthService from "../../../services/AuthService";
import Form from "../../../services/FormService";
import {mapGetters,mapMutations,mapActions} from 'vuex'

export default {
   components:{},
    props: {
        },
    data() {
      return {
        passReset: {
          token: null,
          email: null,
          password: null,
          password_confirmation: null,
          has_error: false,
        },
        form: new Form()
      }   
    },
    watch: {
              
      },
    computed: {
        ...mapGetters([]),
        
        },
    methods: { 
        ...mapMutations([]),           
        ...mapActions([]),
        resetPassword() {
            console.log("credentialsOnlyEmail : "+ JSON.stringify(this.passReset));
          AuthService.passwordReset(this.passReset)
          .then(response => {
              console.log("response : "+JSON.stringify(response))
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
    async mounted() {
        console.log("params route : " + JSON.stringify(this.$route.params));
        this.passReset.token = this.$route.params.token;
        console.log('Component ResetPasswordForm mounted.');
    },
}
</script>

<style scoped type="text/css">
 
</style>



