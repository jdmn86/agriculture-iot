import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  savePlants(context, plants) {
    if(plants.length>=1){
      localStorage.setItem("plants", JSON.stringify(plants));
      context.commit("plants", plants);
    }
  },
//    addplant: (context, farm) => {
//      context.commit("addplant",plants)
    
// },

}