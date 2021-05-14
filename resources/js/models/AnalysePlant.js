import { Model } from '@vuex-orm/core'
import Crop from './Crop'
// import Terrain from './Terrain'
// import AnalyseSoilGuideline from './AnalyseSoilGuideline'

export default class AnalysePlant extends Model {
  static entity = 'analysePlants'

  static fields () {
    return {
      id: this.uid(),

      crop_id: this.attr(null),

      date: this.attr(null),

      nitrogen: this.attr(null),

      nitrateNitrogen: this.attr(null),
      sulfur: this.attr(null),

      phosphorus: this.attr(null),
      potassium: this.attr(null),

      magnesium: this.attr(null),
      calcium: this.attr(null),
      
      sodium: this.attr(null),
      boron: this.attr(null),

      zinc: this.attr(null),
      manganese: this.attr(null),

      iron: this.attr(null),
      copper: this.attr(null),

      aluminium: this.attr(null),

      chloride: this.attr(null),
      

      crop: this.belongsTo(Crop, 'crop_id'),
      // soilType: this.belongsTo(SoilType, 'tipoSolo_id'),
      // analysisGuideline: this.belongsTo(AnalyseSoilGuideline, 'analysisGuideline_id'),

    }
  }
}  