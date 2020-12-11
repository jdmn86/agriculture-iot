import { Model } from '@vuex-orm/core'
import User from './User'

export default class Company extends Model {
  static entity = 'companies'

  static fields () {
    return {
      id: this.uid(),
      is_company: this.boolean(true),
      name: this.string(''),
      company_name: this.string(''),
      nif: this.number(null).nullable(),
      email: this.attr(''),
      email_notifications: this.attr(''),
      users: this.hasMany(User, 'company_id')
    } 
  }
} 

  