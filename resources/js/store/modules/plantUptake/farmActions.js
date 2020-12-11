import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  saveFarms(context, farms) {
    if(farms.length>=1){
      localStorage.setItem("farms", JSON.stringify(farms));
      context.commit("farms", farms);
    }
  },
   addFarm: (context, farm) => {
     context.commit("addFarm",farm)
    
},

}
