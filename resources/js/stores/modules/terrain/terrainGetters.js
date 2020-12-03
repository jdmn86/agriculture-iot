export default {
  	terrains(state) {
        
        return state.terrains;
    },
    
    terrainsByFarm : (state) =>(farm) => { 
        // console.log("state.farmSelected : "+JSON.stringify(farmset))
        if(state.terrains && farm ){
          return state.terrains.filter(item => item.farm_id == farm.id) ;
          
        }
       },
} 
