export default {
    setRoles: (state, list) => {
        state.roles = list;        
    },
    addRole: (state, r) => {
        if(state.roles == null){
            state.roles = r;
        }else{
            state.roles.push(r);
        }
        
    },
    updateRole:(state,role) =>{
        const r = state.roles.find(item => item.id == role.id);
        Object.assign(r, role);
    },
    removerRole: (state, role) =>{
        state.roles.pop(role);
    },
    setRoleSelected:(state,role)=>{
        
        if(role){
            
            state.roleSelected = role;
        }else{
            state.roleSelected = state.roles[0];
        }
        

    }
}  

 
 