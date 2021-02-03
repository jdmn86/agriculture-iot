import { Model } from '@vuex-orm/core'
import Crop from './Crop'
import Plague from './Plague'
import User from './User'


export default class CropPlague extends Model {
  static entity = 'cropPlagues'

  static fields () {
    return {
      	id: this.uid(),
      	plague_id: this.attr(''),
      	crop_id: this.attr(''),
      	user_id: this.attr(''),
     
       	plague: this.belongsTo(Plague, 'plague_id'),
       	crop: this.belongsTo(Crop, 'part_id'),
       	user: this.belongsTo(User, 'user_id')
    }
  }
} 