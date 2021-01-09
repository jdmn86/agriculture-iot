import { Model } from '@vuex-orm/core'
// import Plant from './Plant'

export default class PlantPartsAnatomy extends Model {
  static entity = 'plantPartsAnatomys'

  static fields () {
    return {
      id: this.uid(),
      part: this.attr(''),
     
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}