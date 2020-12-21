import { Model } from '@vuex-orm/core'
import Company from './Company'


export default class User extends Model {
  static entity = 'user'

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      email: this.string(''),      
      company_id: this.number(null).nullable(),//this.number(null).nullable(),

        //roles:  this.belongsToMany(Role, RoleUser, 'user_id', 'role_id')



     // permissions: this.belongsToMany(Permission, PermissionUser, 'user_id', 'permission_id'),
    }
  }
}    