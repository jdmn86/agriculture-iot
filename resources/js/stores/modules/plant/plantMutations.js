export default {
    plants: (state, list) => {
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
    }
}  


