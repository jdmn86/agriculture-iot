export default {

    /**
     * Get the current user.
     * @param {Object} state
     */
    companies: state => {
        return state.companies;
    }, 

    companyById: state => id =>{

        if(state.companies){
            
            const found =state.companies.find(c => {
                return c.id == id;
            });

            if(found){
                return found;
            }else{
                return state.companies[0]
            }
        }else{
            return null;
        }
        
    },

    companySelected: state =>{
        
        return state.companySelected;
        
    }

  
}   