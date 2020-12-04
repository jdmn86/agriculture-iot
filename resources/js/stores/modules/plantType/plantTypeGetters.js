export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    plantTypes(state) {
        return state.plantTypes;
    },

    // masterPlants: state => plant => {
    //     return state.plants.filter((plant) => {
    //       if(plant.master_plant_id == null){
    //         return plant; 
    //       }          
    //     });
    //   }, 
    //   plantById: state => id => {      
    //     console.log("id da planta : "+id)
    //     return state.plants.find(obj => {
    //         return obj.id == id;
    //     });
    //   }, 
    //   variedadesOfPlant: state => plantId => {
    //       console.log("IN getVariedadesOfPlant plant : "+ plantId);
    //     return state.plants.filter((p) => {
    //       if(plantId == p.master_plant_id){
    //         console.log("IN getVariedadesOfPlant add : "+ p.id);
    //         return p;
    //       }          
    //     }); 
        
    //   }, 
  
} 