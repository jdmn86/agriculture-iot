import { Model } from '@vuex-orm/core'

// import PlantStage from './PlantStage'
// import Plague from './Plague'
// import PlantPlague from './PlantPlague'

export default class AnalyseSoilGuideline extends Model {
  static entity = 'analyseSoilGuidelines'

  static fields () {
    return {
      id: this.uid(),

      Lime: this.attr(null),
      nitrogen: this.attr(null),
      phosphorus: this.attr(null),

      potash: this.attr(null),

      Magnesium: this.attr(null),

      zinc: this.attr(null),
      Sulfur: this.attr(null),

      Manganese: this.attr(null),
      Cooper: this.attr(null),

      Iron: this.attr(null),
      Boron: this.attr(null),
      
      created_at: this.attr(null),
      Obs: this.attr(null),

      
    }
  }
}  