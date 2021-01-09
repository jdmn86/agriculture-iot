import { Model } from '@vuex-orm/core'
// import Plague from './Plague'

export default class PlagueType extends Model {
  static entity = 'plagueTypes'

  static fields () {
    return {
      	id: this.uid(),
      	typePlague: this.attr(''),
      	name: this.attr(''),
        created_at: this.attr(''),
     
    }
  }
}