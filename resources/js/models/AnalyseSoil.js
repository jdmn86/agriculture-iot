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
      matOrgPerLevel: this.attr(null),

      nitrogen: this.attr(null),
      nitrogenLevel: this.attr(null),

      phosphorus: this.attr(null),
      phosphorusLevel: this.attr(null),
      
      potassium: this.attr(null),
      potassiumLevel: this.attr(null),

      Magnesium: this.attr(null),
      MagnesiumLevel: this.attr(null),

      phSoil: this.attr(null),
      phSoilLevel: this.attr(null),

      phBufferIndex: this.attr(null),

      hydrogen: this.attr(null),
      hydrogenLevel: this.attr(null),

      Sulfur: this.attr(null),
      SulfurLevel: this.attr(null),

      zinc: this.attr(null),
      zincLevel: this.attr(null),

      Manganese: this.attr(null),
      ManganeseLevel: this.attr(null),

      Cooper: this.attr(null),
      CooperLevel: this.attr(null),

      Iron: this.attr(null),
      IronLevel: this.attr(null),

      Boron: this.attr(null),
      BoronLevel: this.attr(null),

      Aluminium: this.attr(null),
      AluminiumLevel: this.attr(null),

      excessLime: this.attr(null),
      
      CEC: this.attr(null),

      perCationSatK: this.attr(null),
      perCationSatKLevel: this.attr(null),

      perCationSatMg: this.attr(null),
      perCationSatMgLevel: this.attr(null),

      perCationSatH: this.attr(null),
      perCationSatHLevel: this.attr(null),

      perCationSatCa: this.attr(null),
      perCationSatCaLevel: this.attr(null),

      perCationSatNa: this.attr(null),
      perCationSatNaLevel: this.attr(null),

      Sulfate: this.attr(null),
      SulfateLevel: this.attr(null),

      Chloride: this.attr(null),
      ChlorideLevel: this.attr(null),

      Ece: this.attr(null),
      EceLevel: this.attr(null),

      created_at: this.attr(null),
      
      Obs: this.attr(null),


      terrain: this.belongsTo(Terrain, 'terrain_id'),
      soilType: this.belongsTo(SoilType, 'tipoSolo_id'),
      analysisGuideline: this.belongsTo(AnalyseSoilGuideline, 'analysisGuideline_id'),

    }
  }
}  