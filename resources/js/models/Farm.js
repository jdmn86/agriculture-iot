import { Model } from '@vuex-orm/core'
import Company from './Company'

export default class Farm extends Model {
  static entity = 'farm'

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      farm_company: this.number(null).nullable(),
      areaTotal: this.number(null).nullable(),
      localizacao: this.string(''),
      enabled: this.boolean(true),
      
    }
  }
} 
 