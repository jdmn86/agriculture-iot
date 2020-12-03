import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {
  saveTerrains(context, terrains) {
    if(terrains.length>=1){
      localStorage.setItem("terrains", JSON.stringify(terrains));
      context.commit("terrains", terrains);
    }
  },
}

 // async GETFARMS ({commit,state,getters,rootState,rootGetters},payload) {