import { Model } from '@vuex-orm/core'
import SoilType from './SoilType'
import Terrain from './Terrain'
import AnalyseSoilGuideline from './AnalyseSoilGuideline'

export default class AnalyseSoil extends Model {
  static entity = 'analyseSoils'

  static fields () {
    return {
      id: this.uid(),

      terrain_id: this.attr(null),
      tipoSolo_id: this.attr(null),
      analysisGuideline_id: this.attr(null),

      date: this.attr(null),

      soilDepth: this.attr(null),

      matOrgPer: this.attr(null),

      nitrogen: this.attr(null),

      phosphorus: this.attr(null),
      
      potassium: this.attr(null),

      Magnesium: this.attr(null),

      Calcium: this.attr(null),

      Sodium: this.attr(null),

      phSoil: this.attr(null),

      phBufferIndex: this.attr(null),

      hydrogen: this.attr(null),

      Sulfur: this.attr(null),

      zinc: this.attr(null),

      Manganese: this.attr(null),

      Cooper: this.attr(null),




      Iron: this.attr(null),

      Boron: this.attr(null),

      Aluminium: this.attr(null),

      excessLime: this.attr(null),
      
      CEC: this.attr(null),

      perCationSatK: this.attr(null),

      perCationSatMg: this.attr(null),

      perCationSatH: this.attr(null),

      perCationSatCa: this.attr(null),

      perCationSatNa: this.attr(null),

      Sulfate: this.attr(null),

      Chloride: this.attr(null),

      Ece: this.attr(null),

      created_at: this.attr(null),
      
      Obs: this.attr(null),


      terrain: this.belongsTo(Terrain, 'terrain_id'),
      soilType: this.belongsTo(SoilType, 'tipoSolo_id'),
      analysis_guideline: this.belongsTo(AnalyseSoilGuideline, 'analysisGuideline_id'),
// analysis_guideline
    }
  }
}  