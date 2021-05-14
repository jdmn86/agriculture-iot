import { Model } from '@vuex-orm/core'
import Plant from './Plant'
import PlantStage from './PlantStage'
import Company from './Company'

export default class PlantUptake extends Model {
  static entity = 'plantUptakes'

  static fields () {
    return {
      id: this.uid(),
      plantStage_id: this.attr(null),
      plant_id: this.attr(null),
      company_id: this.attr(null),

      expectedProductionByHa: this.attr(null),

      nitrogen_total: this.attr(null),
      phosphorus_total: this.attr(null),
      potassium_total: this.attr(null),
      Magnesium_total: this.attr(null),
      Calcium_total: this.attr(null),
      Sulfur_total: this.attr(null),
      Sodium_total: this.attr(null), 
      Boron_total: this.attr(null),
      zinc_total: this.attr(null),
      Manganese_total: this.attr(null),
      Cooper_total: this.attr(null),
      Iron_total: this.attr(null),
      Aluminium_total: this.attr(null),

      plantStage: this.belongsTo(PlantStage, 'plantStage_id'),
      plant: this.belongsTo(Plant, 'plant_id'),

      company: this.belongsTo(Company,"company_id"),

    }
  }
}   
