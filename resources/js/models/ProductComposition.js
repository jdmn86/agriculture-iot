import { Model } from '@vuex-orm/core'
import Product from './Product'

export default class ProductComposition extends Model {
  static entity = 'productCompositions'

  static fields () {
    return {
      id: this.attr(null),
      nitrogenTotal: this.attr(null),
      nitrateNitrogen: this.attr(null),//this.belongsTo(Farm, 'id'),
      amoniacalNitrogen: this.attr(null),//this.belongsTo(Farm, 'id'),
      otherNitrogen: this.attr(null),
      P2O5: this.attr(null),//this.belongsTo(Farm, 'id'),
      K2O: this.attr(null),
      CaO: this.attr(null),
      MgO: this.attr(null),
      SO3: this.attr(null),
      Ca: this.attr(null),      
      B: this.attr(null),
      Cu: this.attr(null),
      Fe: this.attr(null),
      Mn: this.attr(null),
      Mo: this.attr(null),
      Zn: this.attr(null),
      OrganicMatter: this.attr(null),

      
      // composition: this.belongsTo(ProductComposition, 'composition_id'),
      // farm: this.belongsTo(Farm, 'farm_id')
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}
