import state from './companyState'
import mutations from './companyMutations'
import getters from './companyGetters'
import actions from './companyActions'

export default {
  namespaced: true,
  state,
  mutations,
  getters, 
  actions
}