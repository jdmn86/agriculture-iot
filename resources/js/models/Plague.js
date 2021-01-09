import { Model } from '@vuex-orm/core'
import Plant from './Plant'
import PlantPlague from './PlantPlague'
import PlagueType from './PlagueType'
import PlantPartsAnatomy from './PlantPartsAnatomy'
import PlaguePlantsPartsAnatomy from './PlaguePlantsPartsAnatomy'

export default class Plague extends Model {
  static entity = 'plagues'

  static fields () {
    return {
      id: this.uid(),
      nome_comum: this.attr(''),
      nome_cientifico: this.attr(''),
      plagueType_id: this.attr(''),
      cause: this.attr(''),
      comments: this.attr(''),
      management: this.attr(''),
      symptoms: this.attr(''),
      image: this.attr(''),
      language: this.attr(''),
      company_id: this.attr(''),


      plants: this.belongsToMany(Plant,PlantPlague, 'plant_id','plague_id'),
      plagueType: this.belongsTo(PlagueType,'plagueType_id'),


// (Plague,PlantPlague,'plant_id', 'plague_id')
      parts: this.belongsToMany(PlantPartsAnatomy,PlaguePlantsPartsAnatomy,'plague_id','part_id')
    }
  }
}