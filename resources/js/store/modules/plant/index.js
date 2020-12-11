import state from './plantState'
import mutations from './plantMutations'
import getters from './plantGetters'
import actions from './plantActions'

export default {
  namespaced: true,
  state,
  mutations,
  getters, 
  actions
}