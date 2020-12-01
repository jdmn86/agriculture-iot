export default {
    setUserCompany: (state, userCompany) => {
        state.userCompany = userCompany;        
    },
    removeUserCompany: state => {
        state.userCompany = null;
    }
}  