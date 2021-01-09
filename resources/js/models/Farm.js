import { Model } from '@vuex-orm/core'
import Company from './Company'
import Terrain from './Terrain'

export default class Farm extends Model {
  static entity = 'farms'

  // static primaryKey = "id";

  static fields () {
    return {
      id: this.uid(),
      name: this.string(''),
      farm_company: this.number(null),
      areaTotal: this.number(null).nullable(),
      localizacao: this.string(''),
      enabled: this.boolean(true),

      terrains: this.hasMany(Terrain,'farm_id'),
    

    }
  }
} 
  