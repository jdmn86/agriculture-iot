import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {
  // getCurrent ({ commit }) {
  //   return UsersService.getCurrent()
  //     .then(user => commit('SET_CURRENT_USER', user.data))
  //     .catch(error => commit('toast/NEW', { type: 'error', message: error.message }, { root: true }))
  // }
  setCompanies(context, companies) {
    if(companies.length>=1){
      localStorage.setItem("companies", JSON.stringify(companies));
      context.commit("setCompanies", companies);
    }
  }, 
   addCompany: (context, company) => {
     context.commit("addCompany",company)
     
    
  }, 
  updateCompany: (context,company)=>{
    context.commit("updateCompany",company);
    
  },
  removeCompany: (context, company) => { 
    context.commit("removerCompany",company)
 
  }, 

  //function
  setCompanySelected: (context,company)=>{
    
    context.commit("setCompanySelected",company)
  }


} 