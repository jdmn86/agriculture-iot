export default {
    farms: (state, farms) => {
        state.farms = farms;        
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


