export default {
    setPlants: (state, list) => {
        state.plants = list;        
    },
    addPlant: (state, plant) => {
        state.plants.push(plant);
    },
    updatePlant:(state,plant) =>{
        const p = state.plants.find(item => item.id == plant.id);
        Object.assign(p, plant);
    },
    removerplant: (state, plant) =>{
        state.plants.pop(plant);
    },
    setPlantSelected:(state,plant)=>{
                
        if(state.plants){
            state.plantSelected = plant;
           
        }
    }
}  


 