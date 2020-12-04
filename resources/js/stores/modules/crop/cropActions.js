import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  saveCrops(context, list) {
    if(list.length>=1){
      localStorage.setItem("crops", JSON.stringify(list));
      context.commit("crops", list);
    }
  },
   addFarm: (context, farm) => {
     context.commit("addFarm",farm)
    
},

}