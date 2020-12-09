export default {
//   setCurrentUser: (state, currentUser) => {
//   	console.log("in setCurrent user mutation");
//         state.currentUser = currentUser;
//         state.isLoggedIn = true;
//     },
//     removeCurrentUser: state => {
//         state.currentUser = null;
//         state.isLoggedIn = false;
//     }
    setUsers: (state, list) => {
        state.users = list;        
    },
    addUser: (state, u) => {
        if(state.users == null){
            state.users = u;
        }else{
            state.users.push(u);
        }
        
    },
    updateUser:(state,user) =>{
        const u = state.users.find(item => item.id == user.id);
        Object.assign(user, user);
    },
    removerUser: (state, user) =>{
        state.users.pop(user);
    },
}   