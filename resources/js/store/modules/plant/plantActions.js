import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {

  setPlants(context, plants) {
    if(plants.length>=1){
      localStorage.setItem("plants", JSON.stringify(plants));
      context.commit("setPlants", plants);
    }
  },
    addPlant: (context, plant) => {
     context.commit("addPlant",plant)
     context.commit("setPlantSelected",plant)
     
    
  }, 
  updatePlant: (context,plant)=>{
    context.commit("updatePlant",plant);
      
  },
  removePlant: (context, plant) => {
    context.commit("removePlant",plant)
 
  }, 

  //function
  setPlantSelected: (context,plant)=>{
    
    context.commit("setPlantSelected",plant)
  }

} 