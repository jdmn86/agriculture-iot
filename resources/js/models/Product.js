import { Model } from '@vuex-orm/core'
import ProductComposition from './ProductComposition'
import ProductType from './ProductType'

export default class Product extends Model {
  static entity = 'products'

  static fields () {
    return {
      id: this.attr(null),
      name: this.attr(null).nullable(),
      brand: this.attr(null),//this.belongsTo(Farm, 'id'),
      is_biologic: this.boolean(false),//this.belongsTo(Farm, 'id'),
      is_liquid: this.boolean(false),
      quantityL: this.number(null),//this.belongsTo(Farm, 'id'),
      quantityKg: this.number(null),
      granulometry: this.number(null).nullable(),
      typeProduct_id: this.number(null),
      solubility: this.attr(null),
      composition_id: this.number(null),      
      activeIngredients: this.attr(null).nullable(),
      ph: this.attr(null),
      description: this.attr(null),
      aplicationRates: this.attr(null),
      directionsForUse: this.attr(null),
      storage: this.attr(null),
      compatibility: this.attr(null),
      warnings: this.attr(null),
      image: this.attr(null),
      
      composition: this.belongsTo(ProductComposition, 'composition_id'),
      typeProduct: this.belongsTo(ProductType, 'typeProduct_id'),
      // farm: this.belongsTo(Farm, 'farm_id')
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}
