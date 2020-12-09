export default {
    setPermissions: (state, list) => {
        state.permissions = list;        
    },
    addPermission: (state, f) => {
        if(state.permissions == null){
            state.permissions = f;
        }else{
            state.permissions.push(f);
        }
        
    },
    updatePermission:(state,permission) =>{
        const p = state.permissions.find(item => item.id == permission.id);
        Object.assign(p, permission);
    },
    removerPermission: (state, permission) =>{
        state.permissions.pop(permission);
    },
    setPermissionSelected:(state,permission)=>{
        
        if(permission){
            
            state.permissionSelected = permission;
        }else{
            state.permissionSelected = state.permissions[0];
        }
        

    }
}  

 
 