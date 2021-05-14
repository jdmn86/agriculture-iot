import { Model } from '@vuex-orm/core'
// import SoilType from './SoilType'
import Terrain from './Terrain'
// import AnalyseSoilGuideline from './AnalyseSoilGuideline'

export default class AnalyseWater extends Model {
  static entity = 'analyseWaters'

  static fields () {
    return {
      id: this.uid(),

      terrain_id: this.attr(null),

      date: this.attr(null),

      ph: this.attr(null),

      nitrateAsNitrogen: this.attr(null),
      nitrateAsNo3: this.attr(null),

      totalColiform: this.attr(null),
      eColi: this.attr(null),

      hardnessCaCo3: this.attr(null),
      totalDissolvedSolids: this.attr(null),
      
      chloride: this.attr(null),
      sulfates: this.attr(null),

      calcium: this.attr(null),
      phosphorus: this.attr(null),

      magnesium: this.attr(null),
      potassium: this.attr(null),

      iron: this.attr(null),

      manganese: this.attr(null),

      zinc: this.attr(null),
      copper: this.attr(null),

      sulfateSulfur: this.attr(null),
      alkalinity: this.attr(null),

      molybdenum: this.attr(null),
      selenium: this.attr(null),

      boron: this.attr(null),

      terrain: this.belongsTo(Terrain, 'terrain_id'),
    }
  }
}  