import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {
  
  	// setCurrentUser(context, currentUser) {
    //     localStorage.setItem("currentUser", JSON.stringify(currentUser));
    //     context.commit("setCurrentUser", currentUser);
    // },

    // fetchCurrentUserFromLocalstorage(context) {
    //     const currentUser = JSON.parse(localStorage.getItem("currentUser")); 
    //     if (currentUser) {
    //         context.commit("setCurrentUser", currentUser);
    //     }
    // },
    // logout(context,payload){
    //   console.log("In logout 1");
    //     localStorage.removeItem('currentUser');
    //     console.log("In logout 2");
    //     context.commit("removeCurrentUser");
    //   console.log("In logout 3");
    // },

    setUsers(context, users) {
      if(users.length>=1){
        localStorage.setItem("users", JSON.stringify(users));
        context.commit("setUsers", users);
      }
    },
     addUser: (context, user) => {
       context.commit("addUser",user)
       
      
    }, 
    updateUser: (context,user)=>{
      context.commit("updateUser",user);
      
    },
    removeUser: (context, user) => {
      context.commit("removeUser",user)
   
    }, 

}

 // async GETFARMS ({commit,state,getters,rootState,rootGetters},payload) {