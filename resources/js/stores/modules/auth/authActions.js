import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {
  // getCurrent ({ commit }) {
  //   return UsersService.getCurrent()
  //     .then(user => commit('SET_CURRENT_USER', user.data))
  //     .catch(error => commit('toast/NEW', { type: 'error', message: error.message }, { root: true }))
  // }


  	setCurrentUser(context, currentUser) {
        localStorage.setItem("currentUser", JSON.stringify(currentUser));
        context.commit("setCurrentUser", currentUser);
    },
 
    fetchCurrentUserFromLocalstorage(context) {
        const currentUser = JSON.parse(localStorage.getItem("currentUser"));
        if (currentUser) {
            context.commit("setCurrentUser", currentUser);
        }
    },
    logout(context,payload){ 
      console.log("In logout 1");
        localStorage.removeItem('currentUser');
        console.log("In logout 2");
        context.commit("removeCurrentUser");
      console.log("In logout 3");
    },

  //   login(context,credentials){
  //   	console.log("in login :"+JSON.stringify(credentials));
  //   	 AuthService.login(credentials)
  //         .then(user => {
  //           // dispatch calls action , commit calls mutations
  //           context.commit("setCurrentUser",user);
  //           // this.$toaster.success("Login successful.");
  //            this.$router.push("/home");
  //         })
  //         .catch(error => {
  //           console.log("resposta erro :"+ JSON.stringify(error));
  //           if (error.response.status === 422) {
  // this.form.record(error.response.data.errors);
  //           } else if (error.response.status === 401) {
  // this.form.record({email: ['The credentials do not match our records.']});
  //           }
  //           // this.$toaster.error("The credentials do not match our records.");
  //         });
  //   }
}

 // async GETFARMS ({commit,state,getters,rootState,rootGetters},payload) {