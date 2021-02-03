import { Model } from '@vuex-orm/core'
import Company from './Company'
import DeviceType from './DeviceType'
import SoilData from './SoilData'

export default class Device extends Model {
  static entity = 'devices'

  static fields () {
    return {
      id: this.uid(),
      device_type_id: this.attr(null),
      ref: this.attr(null),//this.belongsTo(Farm, 'id'),      
      lat: this.attr(null),//this.belongsTo(Farm, 'id'),
      lng: this.attr(null),
      uptime: this.attr(null),
      battery_status: this.number(false), 
      num_reads: this.number(null).nullable(),
      enabled: this.boolean(false), 
      company_id: this.attr(null), 
      created_at: this.attr(null),
      
      company: this.belongsTo(Company, 'company_id'),
      deviceType: this.belongsTo(DeviceType, 'device_type_id'),
      soilDatas: this.hasMany(SoilData,'device_id'),
      // todos: this.hasMany(Todo, 'user_id')
    }
  }
}
