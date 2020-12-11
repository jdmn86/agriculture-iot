export default {
    setTerrains: (state, list) => {
        state.terrains = list;
    },
    addTerrain: (state, terrain) => {
        state.terrains.push(terrain);
    },
    updateTerrain:(state,terrain) =>{
        const t = state.terrains.find(item => item.id == terrain.id);
        Object.assign(t, terrain);
    },
    removerTerrain: (state, terrain) =>{
        state.terrains.pop(terrain);
    },
    setTerrainSelected:(state,terrain)=>{
        
        if(state.terrains){
            state.terrainSelected = terrain;
            
        }
    }
}    