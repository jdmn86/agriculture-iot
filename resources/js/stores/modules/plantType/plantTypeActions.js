import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  savePlantTypes(context, plantType) {
    if(plantType.length>=1){
      localStorage.setItem("plantTypes", JSON.stringify(plantType));
      context.commit("plantTypes", plantType);
    }
  },
//    addplant: (context, farm) => {
//      context.commit("addplant",plants)
    
// },

}