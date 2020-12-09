import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  setPermissions(context, permissions) {
    if(permissions.length>=1){
      localStorage.setItem("permissions", JSON.stringify(permissions));
      context.commit("setPermissions", permissions);
    }
  },
   addPermission: (context, permission) => {
     context.commit("addPermission",permission)
     
    
  }, 
  updatePermission: (context,permission)=>{
    context.commit("updatePermission",permission);
     
  },
  removePermission: (context, permission) => {
    context.commit("removePermission",permission)
 
  }, 

  //function
  setPermissionSelected: (context,permission)=>{
    
    context.commit("setPermissionSelected",permission)
  }

}

// farmById: state => id =>{

//   if(state.farms){
//       return state.farms.find(f => {
//           return f.id == id;
//       });
//   }else{
//       return null;
//   }
  
// },

