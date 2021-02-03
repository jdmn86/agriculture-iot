import { Model } from '@vuex-orm/core'

export default class DeviceType extends Model {
  static entity = 'deviceTypes'

  static fields () {
    return {
      id: this.uid(),
      typeDevice: this.attr(null),
      name: this.attr(null),//this.belongsTo(Farm, 'id'),      
      
    }
  }
}
