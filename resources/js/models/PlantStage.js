import { Model } from '@vuex-orm/core'
// import Plant from './Plant'
import Company from './Company'

export default class PlantStage extends Model {
  static entity = 'plantStages'

  static fields () { 
    return {
      id: this.uid(),
      plant_id: this.attr(''),
      company_id: this.attr(null),
      faseNumber: this.attr(''),
      startDayCropFase: this.attr(''),
      stopDayCropFase: this.attr(''),
      GrowthStageName: this.attr(''),
      daysOfFase: this.attr(null),

      nitrogen_per_phase: this.attr(null),
      phosphorus_per_phase: this.attr(null),
      potassium_per_phase: this.attr(null),
      Magnesium_per_phase: this.attr(null),
      Calcium_per_phase: this.attr(null),
      Sulfur_per_phase: this.attr(null),
      Sodium_per_phase: this.attr(null),
      Boron_per_phase: this.attr(null),
      zinc_per_phase: this.attr(null),
      Manganese_per_phase: this.attr(null),
      Cooper_per_phase: this.attr(null),
      Iron_per_phase: this.attr(null),
      Aluminium_per_phase: this.attr(null),
      // todos: this.hasMany(Todo, 'user_id')

      company: this.belongsTo(Company,"company_id"),
    }
  }
} 