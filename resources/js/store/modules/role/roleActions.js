import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  setRoles(context, roles) {
    if(roles.length>=1){
      localStorage.setItem("roles", JSON.stringify(roles));
      context.commit("setRoles", roles);
    }
  },
  addRole: (context, role) => {
     context.commit("addRole",role)
     
    
  }, 
  updateRole: (context,role)=>{
    context.commit("updateRole",role);
    
  },
  removerRole: (context, role) => {
    context.commit("removerRole",role)
 
  }, 

  //function
  setRoleSelected: (context,role)=>{
    
    context.commit("setRoleSelected",role)
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

