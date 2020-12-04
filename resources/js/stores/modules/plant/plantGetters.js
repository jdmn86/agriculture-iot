export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    get_plants(state) {
        return state.plants;
    },

    get_masterPlants: state => {
        return state.plants.filter((plant) => {
          if(plant.master_plant_id == null){
            return plant; 
          }          
        });
      }, 
      get_plantById: state => id => {      
        console.log("id da planta : "+id)
        return state.plants.find(obj => {
            return obj.id == id;
        });
      }, 
      get_variedadesOfPlant: state => plantId => {
          console.log("IN getVariedadesOfPlant plant : "+ plantId);
        return state.plants.filter((p) => {
          if(plantId == p.master_plant_id){
            console.log("IN getVariedadesOfPlant add : "+ p.id);
            return p;
          }          
        }); 
        
      }, 
  
} 