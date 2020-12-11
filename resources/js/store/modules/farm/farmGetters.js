import farm from ".";

export default {

    farms: state => {
        return state.farms;
    },

    farmById: state => id =>{

        if(state.farms){
            
            const found =state.farms.find(f => {
                return f.id == id;
            });

            if(found){
                return found;
            }else{
                return state.farms[0]
            }
        }else{
            return null;
        } 
        
    },

    farmSelected: state =>{
        
        return state.farmSelected;
        
    }

  
}  
