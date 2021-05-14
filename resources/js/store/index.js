
import Vue from 'vue'
import axios from 'axios'
import Vuex from 'vuex'
import VuexORM from '@vuex-orm/core'
import VuexORMAxios from '@vuex-orm/plugin-axios'
import database from '@/database'

 Vue.use(Vuex)

VuexORM.use(VuexORMAxios, { axios ,   baseURL: 'http://fsadalab.test/api'})

const store = new Vuex.Store({
  plugins: [VuexORM.install(database)],
  strict: process.env.NODE_ENV === 'development'
}) 

export default store