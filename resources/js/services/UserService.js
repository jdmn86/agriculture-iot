import { assert } from '../assert'
import { BaseService } from './BaseService'
import { ErrorWrapper, ResponseWrapper } from './util'

export class UserService extends BaseService {
  static get entity () {
    return 'user'
  }

//   static async getPostsByUserId (params = {}) {
//     assert.object(params, { required: true })
//     assert.object(params.filter, { required: true })
//     assert.id(params.filter.userId, { required: true })

//     try {
//       const response = await this.request({ auth: true }).get(`${this.entity}?${this.querystring(params)}`)
//       const data = {
//         content: response.data.data, 
//         total: Number(response.headers['x-total-count'])
//       }
//       return new ResponseWrapper(response, data)
//     } catch (error) {
//       const message = error.response.data ? error.response.data.error : error.response.statusText
//       throw new ErrorWrapper(error, message)
//     }
//   }
}

// import Api from "./Api";

// /**
//  * User service class.
//  */
// class CompanyService {
//     /**
//      * Get all users.
//      */
//     async getAllCompanys() {
//         let response = await Api.get("api/users/list");

//         return response.data;
//     }
// }

// export default new ComapnyService();
