import { Model } from '@vuex-orm/core'
import User from './User'
import Crop from './Crop'

export default class Harvest extends Model {
  static entity = 'harvests'

  static fields () {
    return {
      id: this.uid(),
      user_id: this.attr(null),
      crop_id: this.attr(null),
      kg: this.attr(null),
      hectars: this.attr(null),
    
      created_at: this.attr(null),

      crop: this.belongsTo(Crop, 'crop_id'),
      user: this.hasMany(User, 'user_id'),

    }
  }
} 