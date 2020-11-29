export default {
  	isLoggedIn(state) {
        if (state.currentUser === null) {
            return false;
        }
        return state.currentUser.token !== "";
    },
    /**
     * Get the current user.
     * @param {Object} state
     */
    currentUser(state) {
        return state.currentUser;
    },

    permissions(state){
        return state.currentUser.all_permissions;
    },

    roles(state){
        if(state.currentUser){
            return state.currentUser.roles;
        }else{
            return false;
        }
        
    }
} 