import { Model } from '@vuex-orm/core'
import Terrain from './Terrain'
import Crop from './Crop'
import Device from './Device'

export default class AirData extends Model {
  static entity = 'airDatas'

  static fields () {
    return {
      id: this.uid(),
      device_id: this.attr(null),
      crop_id: this.attr(null),//this.belongsTo(Farm, 'id'),
      terrain_id: this.attr(null),//this.belongsTo(Farm, 'id'),

      date: this.attr(null),

      height: this.attr(null),
      temp: this.attr(null),//this.belongsTo(Farm, 'id'),

      precipitation: this.attr(null),
      
      humidity: this.attr(null),
      dew_point: this.attr(null),
      heat_index: this.attr(null),
      pressure: this.attr(null),      

      radiation: this.attr(null),
      wetleaf: this.attr(null),
      evpt: this.attr(null),
      created_at: this.attr(null),

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
 