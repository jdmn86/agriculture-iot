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

  static apiConfig = {
    actions: {
      changePassword (credentials) {
        console.log("credentials :"+JSON.stringify(credentials));
        return this.post('/auth/changePassword',credentials)
      }
    }
  }



}



// post(url: string, data: any = {}, config: Config = {}): Promise<Response>

