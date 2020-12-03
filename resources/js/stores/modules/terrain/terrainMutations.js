export default {
    terrains: (state, terrains) => {
        state.terrains = terrains;
    },
    addFarm: (state, farm) => {
        state.farms.push(farm);
    },
    updateFarm:(state,farm) =>{
        const f = state.farms.find(item => item.id == farm.id);
        Object.assign(f, farm);
    },
    removerFarm: (state, farm) =>{
        state.farms.pop(farm);
    }
}   