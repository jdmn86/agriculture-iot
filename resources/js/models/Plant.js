import { Model } from '@vuex-orm/core'
import PlantType from './PlantType'
import PlantStage from './PlantStage'
import Plague from './Plague'
import PlantPlague from './PlantPlague'
import PlantUptake from './PlantUptake'

export default class Plant extends Model {
  static entity = 'plants'

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      master_plant_id: this.attr(null),
      nome_variedade: this.attr(null),
      name_cientifico: this.attr(null),
      tipo_planta_id: this.attr(null),
      fracao_esgotamento_agua_solo_conforto_hidrico: this.attr(null),
      ph_min: this.attr(null),
      ph_max: this.attr(null),
      compasso_plantas: this.attr(null),
      compasso_linhas: this.attr(null),
      fotoperiodo: this.attr(null),
      image: this.attr(null),
      water_consumption: this.attr(null),
      created_at: this.attr(null),

      plantType: this.belongsTo(PlantType, 'tipo_planta_id'),
      plantStages: this.hasMany(PlantStage, 'plant_id'),
      company_id: this.attr(null),

 
      plagues: this.belongsToMany(Plague,PlantPlague,'plant_id', 'plague_id'),
      plantUptake: this.hasMany(PlantUptake,'plant_id'),
    }
  }
}    