export default {
  setCurrentUser: (state, currentUser) => {
  	console.log("in setCurrent user mutation");
        state.currentUser = currentUser;
        state.isLoggedIn = true;
    },
    removeCurrentUser: state => {
        state.currentUser = null;
        state.isLoggedIn = false;
    }
}  