import { Model } from '@vuex-orm/core'
import Plant from './Plant'
import Plague from './Plague'

export default class PlantPlague extends Model {
  static entity = 'plantPlague'

  static primaryKey = ['plant_id', 'plague_id']
  
  static fields () {
    return {
      // id: this.uid(),
      plant_id: this.attr(''),
      plague_id: this.attr(''),
     
      // plants: this.hasMany(Plant, 'plant_id'),
      // plagues: this.hasMany(Plague, 'plague_id'),
      
    }
  }
}