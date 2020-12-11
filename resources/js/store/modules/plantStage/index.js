import state from './farmState'
import mutations from './farmMutations'
import getters from './farmGetters'
import actions from './farmActions'

export default {
  namespaced: true,
  state,
  mutations,
  getters, 
  actions
}