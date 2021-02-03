import { Model } from '@vuex-orm/core'
import Farm from './Farm'

export default class CurrentWeather extends Model {
  static entity = 'currentWeather'

  static fields () {
    return {
        id: this.uid(),
        id_farm: this.attr(null),
        date: this.attr(null),//this.belongsTo(Farm, 'id'),
        weekDay: this.attr(null),//this.belongsTo(Farm, 'id'),
        icon: this.attr(null),
        clouds: this.attr(null),//this.belongsTo(Farm, 'id'),
        weather_type: this.attr(null),
        temp: this.attr(null),
        feels_like: this.attr(null),
        dew_point: this.attr(null),
        humidity: this.attr(null),
        pressure: this.attr(null),
        wind_speed: this.attr(null),
        wind_gust: this.attr(null),
        wind_deg: this.attr(null),
        uvi: this.attr(null),
        visibility: this.attr(null),
        wetleaf: this.attr(null),
        rain: this.attr(null), 
        rain_hour: this.attr(null),
        snow: this.attr(null),
        snow_hour: this.attr(null),

        farm: this.belongsTo(Farm, 'id_farm'),
    }
  }
}
 

