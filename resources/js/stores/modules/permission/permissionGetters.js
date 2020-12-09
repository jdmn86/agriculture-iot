import farm from ".";

export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    permissions: state => {
        return state.permissions;
    },

    permissionById: state => id =>{

        if(state.permissions){
            
            const found =state.permissions.find(p => {
                return p.id == id;
            });

            if(found){
                return found;
            }else{
                return state.permissions[0]
            }
        }else{
            return null;
        }
        
    },

    permissionSelected: state =>{
        
        return state.permissionSelected;
         
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