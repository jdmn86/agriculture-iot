import { Model } from '@vuex-orm/core'
import Farm from './Farm'

export default class Terrain extends Model {
  static entity = 'terrains'

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      farm_id: this.number(null).nullable(),//this.belongsTo(Farm, 'id'),
      coords: this.attr(''),
      enabled: this.boolean(true),
      area: this.number(null).nullable(),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}