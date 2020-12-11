// import Vue from 'vue'
// import Vuex from 'vuex'
// import modules from './modules'

// Vue.use(Vuex)

// export default new Vuex.Store({
//   modules,
//   strict: process.env.NODE_ENV === 'development'
// }) 



import Vue from 'vue'
import Vuex from 'vuex'
import VuexORM from '@vuex-orm/core'
import database from '@/database'

Vue.use(Vuex)

const store = new Vuex.Store({
  plugins: [VuexORM.install(database)],
  strict: process.env.NODE_ENV === 'development'
})

export default store