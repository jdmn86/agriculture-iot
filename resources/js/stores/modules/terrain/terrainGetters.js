export default {
  terrains: state => {
    return state.terrains;
},

terrainById: state => id =>{

    if(state.terrains){
        
        const found =state.terrains.find(t => {
            return t.id == id;
        });

        if(found){
            return found;
        }else{
            return state.terrainss[0]
        }
    }else{
        return null;
    } 
    
},

terrainsSelected: state =>{
    
    return state.terrainsSelected;
    
},
  terrainsByFarm : state => farm => { 
      // console.log("state.farmSelected : "+JSON.stringify(farmset))
      if(state.terrains && farm ){
        return state.terrains.filter(item => item.farm_id == farm.id) ;
        
      }
      },
} 
 