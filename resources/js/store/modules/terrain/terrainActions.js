import  AuthService  from '../../../services/AuthService'
import  FormService  from '../../../services/FormService'

export default {
  setTerrains(context, terrains) {
     if(terrains.length>=1){
      localStorage.setItem("terrains", JSON.stringify(terrains));
      context.commit("setTerrains", terrains);
     }
  },
  addTerrain: (context, terrain) => {
    context.commit("addTerrain",terrain)
    context.commit("setTerrainSelected",terrain)
    
   
 }, 
 updateTerrain: (context,terrain)=>{
   context.commit("updateTerrain",terrain);
    
 },
 removeTerrain: (context, terrain) => {
   context.commit("removerTerrain",terrain)

 }, 

 //function
 setTerrainSelected: (context,terrain)=>{
   
   context.commit("setTerrainSelected",terrain)
 }
}

 // async GETFARMS ({commit,state,getters,rootState,rootGetters},payload) { 