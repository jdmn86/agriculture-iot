import { Model } from '@vuex-orm/core'
import User from './User'

export default class Auth extends User {
  static entity = 'auth'

  // static baseEntity = 'user' 

  static fields () {
    return {
      ...super.fields(),
     
      token: this.string(''),      
      mode: this.boolean(false),     
      roles: this.attr(null),
      all_permissions: this.attr(null),
     
    }
  }
}