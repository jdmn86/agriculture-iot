import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  setFarms(context, farms) {
    if(farms.length>=1){
      localStorage.setItem("farms", JSON.stringify(farms));
      context.commit("setFarms", farms);
    }
  },
   addFarm: (context, farm) => {
     context.commit("addFarm",farm)
     context.commit("setFarmSelected",farm)
     
    
  }, 
  updateFarm: (context,farm)=>{
    context.commit("updateFarm",farm);
     
  },
  removeFarm: (context, farm) => {
    context.commit("removerFarm",farm)
 
  }, 

  //function
  setFarmSelected: (context,farm)=>{
    
    context.commit("setFarmSelected",farm)
  }

}
