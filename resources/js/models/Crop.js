import { Model } from '@vuex-orm/core'
import Terrain from './Terrain'

export default class Crop extends Model {
  static entity = 'crops'

  static fields () {
    return {
      id: this.attr(null),
      num_plantas: this.number(null).nullable(),
      id_plant: this.attr(null),//this.belongsTo(Farm, 'id'),
      id_terrain: this.attr(null),//this.belongsTo(Farm, 'id'),
      densidade_distribuicao_terreno: this.attr(''),
      cropStage_id: this.attr(null),//this.belongsTo(Farm, 'id'),
      created_at: this.attr(null),
      expectedProduction: this.number(null).nullable(),
      start_crop_date: this.attr(null),
      finish_crop_date: this.attr(null),
      isSeed: this.boolean(true),      
      crop_day: this.number(null).nullable(),
      enabled: this.boolean(true),
      
      terrains: this.belongsTo(Terrain, 'id_terrain'),
      // farm: this.belongsTo(Farm, 'farm_id')
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}
