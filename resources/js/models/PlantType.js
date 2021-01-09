import { Model } from '@vuex-orm/core'
// import Plant from './Plant'

export default class PlantType extends Model {
  static entity = 'plantTypes'

  static fields () {
    return {
      id: this.uid(),
      typePlant: this.attr(''),
      name: this.attr(''),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}