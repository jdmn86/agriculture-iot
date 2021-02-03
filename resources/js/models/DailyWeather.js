import { Model } from '@vuex-orm/core'
import Farm from './Farm'


export default class DailyWeather extends Model {
  static entity = 'dailyWeather'

  static fields () {
    return {
      id: this.uid(),
      id_farm: this.attr(null),
      date: this.attr(null),//this.belongsTo(Farm, 'id'),
      weekDay: this.attr(null),//this.belongsTo(Farm, 'id'),
      icon: this.attr(null),
      weather_type: this.attr(null),//this.belongsTo(Farm, 'id'),
      sunrise: this.attr(null),
      sunset: this.attr(null),
      temp_min: this.attr(null),
      temp_max: this.attr(null),
      dew_point: this.attr(null),      
      humidity: this.attr(null),
      pressure: this.attr(null),
      wind_speed: this.attr(null),
      wind_gust: this.attr(null),
      wind_deg: this.attr(null),
      uvi: this.attr(null),
      clouds: this.attr(null),
      pop: this.attr(null),
      rain: this.attr(null),
      snow: this.attr(null),

      farm: this.belongsTo(Farm, 'id_farm'),

    }
  }
}
 