import { Model } from '@vuex-orm/core'
import PlantPartsAnatomy from './PlantPartsAnatomy'
import Plague from './Plague'

export default class PlaguePlantsPartsAnatomy extends Model {
  static entity = 'plaguePlantsPartsAnatomys'

  static fields () {
    return {
      	id: this.uid(),
      	plague_id: this.attr(''),
      	part_id: this.attr(''),
     
       	plague: this.belongsTo(Plague, 'plague_id'),
       	part: this.belongsTo(PlantPartsAnatomy, 'part_id')
    }
  }
}