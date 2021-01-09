import { Model } from '@vuex-orm/core'
// import Plant from './Plant'

export default class ProductType extends Model {
  static entity = 'productTypes'

  static fields () {
    return {
      id: this.uid(),
      typeProduct: this.attr(''),
      name: this.attr(''),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}