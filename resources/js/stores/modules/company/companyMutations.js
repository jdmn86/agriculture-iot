export default {
    setCompanies: (state, list) => {
        state.companies = list;        
    },
    addCompany: (state, c) => {
        if(state.companies == null){
            state.companies = c;
        }else{
            state.companies.push(c);
        }
        
    },
    updateCompany:(state,company) =>{
        const c = state.companies.find(item => item.id == company.id);
        Object.assign(c, company);
    },
    removerCompany: (state, company) =>{
        state.companies.pop(company);
    },
    setCompanySelected:(state,company)=>{
        
        if(company){
            
            state.companySelected = company;
        }else{
            state.companySelected = state.companies[0];
        }
        

    }
}    