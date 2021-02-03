import { Model } from '@vuex-orm/core'
import Terrain from './Terrain'
import Crop from './Crop'
import Device from './Device'

export default class SoilData extends Model {
  static entity = 'soilDatas'

  static fields () {
    return {
      id: this.uid(),

      device_id: this.attr(null),
      crop_id: this.attr(null),//this.belongsTo(Farm, 'id'),
      terrain_id: this.attr(null),//this.belongsTo(Farm, 'id'),

      date: this.attr(null),

      temp20: this.attr(null),
      temp40: this.attr(null),//this.belongsTo(Farm, 'id'),

      humidade20: this.attr(null),      
      humidade40: this.attr(null),

      lat: this.attr(null),
      lng: this.attr(null),

      device: this.belongsTo(Device, 'device_id'),
      crop: this.belongsTo(Crop, 'crop_id'),
      terrain: this.belongsTo(Terrain, 'terrain_id'),
      // farm: this.belongsTo(Farm, 'farm_id')
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}
 