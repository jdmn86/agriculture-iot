export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    plants: state => {
        return state.plants;
    },

    masterPlants: state => {
        return state.plants.filter((plant) => {
          if(plant.master_plant_id == null){
            return plant; 
          }          
        });
      }, 
      plantById: state => id => {      
        if(state.plants){
            
            const found =state.plants.find(p => {
                return p.id == id;
            });

            if(found){
                return found;
            }else{
                return state.plants[0]
            }
        }else{
            return null; 
        } 
      }, 
      variedadesOfPlant: state => plantId => {
        return state.plants.filter((p) => {
          if(plantId == p.master_plant_id){
            return p;
          }          
        });  
        
      }, 
       plantSelected: state =>{
        
        return state.plantSelected;
        
    }
  
} 