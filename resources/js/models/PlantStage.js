import { Model } from '@vuex-orm/core'
// import Plant from './Plant'

export default class PlantStage extends Model {
  static entity = 'plantStages'

  static fields () { 
    return {
      id: this.uid(),
      plant_id: this.attr(''),
      faseNumber: this.attr(''),
      startDayCropFase: this.attr(''),
      stopDayCropFase: this.attr(''),
      GrowthStageName: this.attr(''),
      daysOfFase: this.attr(null),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}