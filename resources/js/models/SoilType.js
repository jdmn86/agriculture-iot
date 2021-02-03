import { Model } from '@vuex-orm/core'
// import PlantType from './PlantType'

export default class SoilType extends Model {
  static entity = 'soilTypes'

  static fields () {
    return {
      id: this.uid(),
      nome_solo: this.attr(null),
      argila_percentagem: this.attr(null),
      silte_percentagem: this.attr(null),
      areia_percentagem: this.attr(null),
      capacidade_campo: this.attr(null),
      capacidade_emurchecimento: this.attr(null),
      massa_volumica_aparente: this.attr(null),
      agua_disponivel_total: this.attr(null),
      created_at: this.attr(null),
    
    }
  }
}  