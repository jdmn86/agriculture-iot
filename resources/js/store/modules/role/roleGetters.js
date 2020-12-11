import farm from ".";

export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    roles: state => {
        return state.roles;
    },

    roleById: state => id =>{

        if(state.roles){
            
            const found =state.roles.find(r => {
                return r.id == id;
            });

            if(found){
                return found;
            }else{
                return state.roles[0]
            }
        }else{
            return null;
        }
        
    },

    roleSelected: state =>{
        
        return state.roleSelected;
        
    }

  
}  

// getPlantById: state => id => {      
//     console.log("id da planta : "+id)
//     return state.plantsList.find(obj => {
//         return obj.id == id;
//     });
//   },  

// setFarmSelected({commit},farm){
    
//     commit("setFarmSelected",farm)
//   }
  
// }