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

    userPermissions(state){
        if (state.currentUser === null) {
            return false;
        }
        return state.currentUser.all_permissions;
    },
 
    userRole(state){ 
        if (state.currentUser === null || typeof state.currentUser == 'undefined') {
            return false;
        }
        return state.currentUser.roles[0];
        
    },
    userSettings(state){
        return state.userSettings;
    },
    
    
} 
