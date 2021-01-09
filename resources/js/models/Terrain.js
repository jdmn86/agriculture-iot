import { Model } from '@vuex-orm/core'
import Farm from './Farm'
import Crop from './Crop'


export default class Terrain extends Model {
  static entity = 'terrains'

   // static primaryKey = "id";

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      farm_id: this.attr(''),//this.belongsTo(Farm, 'id'),
      coords: this.attr(''),
      enabled: this.boolean(true),
      area: this.number(null).nullable(),

      farm: this.belongsTo(Farm,"farm_id"),
      crops: this.hasMany(Crop, 'id_terrain'),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}


