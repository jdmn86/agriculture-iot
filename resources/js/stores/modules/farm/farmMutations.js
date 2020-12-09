export default {
    setFarms: (state, list) => {
        state.farms = list;        
    },
    addFarm: (state, f) => {
        if(state.farms == null){
            state.farms = f;
        }else{
            state.farms.push(f);
        }
        
    },
    updateFarm:(state,farm) =>{
        const f = state.farms.find(item => item.id == farm.id);
        Object.assign(f, farm);
    },
    removerFarm: (state, farm) =>{
        state.farms.pop(farm);
    },
    setFarmSelected:(state,farm)=>{
                
        if(state.farms){
            state.farmSelected = farm;
           
        }
    }
}  

 
