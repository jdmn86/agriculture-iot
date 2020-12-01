<template>
  
  <div class="container">
          
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-6">
                  
                  <b-row style="margin: 10px; ">
                    <b-col >
                        <h1 style="color: rgb(74, 173, 55);padding-top: 30px " class="font-weight-bolder">Forgot Password</h1>
                    </b-col>
                  </b-row>
                  
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
                            <label for="email">New Password</label>
                            <input type="password" id="password" class="form-control" placeholder="" v-model="passReset.password" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Confirm New Password</label>
                            <input type="password" id="password_confirmation" class="form-control" placeholder="" v-model="passReset.password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
            
</template>
<script>
 
import Vue from 'vue';
import {AuthService} from "../../../services/AuthService";
import Form from "../../../services/FormService";
import {mapGetters,mapMutations,mapActions} from 'vuex'


export default {

    props: {
        },
    data() {
      return {
        passReset: {
          token: null,
          email: null,
          password: null,
          password_confirmation: null,
          // has_error: false,
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
        async resetPassword() {
          try {
            console.log("passReset : "+ JSON.stringify(this.passReset));
          await AuthService.passwordReset(this.passReset)
          this.error = ''

          } catch (error) {
            // this.$store.commit('toast/NEW', { type: 'error', message: error.message })
            console.log("error : "+error.message);
            this.error = error.status === 404 ? 'User with same email not found' : error.message
          }
        },

        
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



