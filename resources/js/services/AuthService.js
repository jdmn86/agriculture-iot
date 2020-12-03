import { Http } from './Api'
import axios from 'axios'

import Store from './../stores'
import router from './../routes'

import { ResponseWrapper, ErrorWrapper } from './util'
/**
 * Class AuthService
 */
export class AuthService {
    /**
     * Call the login api.
     * @param {Object} credentials
     */
    static async login(credentials) { 
        
        try {
              const response = await axios.post('api/auth/login',
              credentials);

              await Store.dispatch("auth/setCurrentUser", response.data);
 
              // console.log("Store.getters.userRole.name" + await Store.getters.userRole.name);

              // if(Store.getters.userRole.name == 'admin'){
              //   router.push("/backHome");
              // }else{
              //    router.push("/front");
              // }
              router.push("/front");

              return new ResponseWrapper(response, response.data.data)
            } catch (error) {
              throw new ErrorWrapper(error)
            }
    }
    

    /**
     * Call the auth register api.
     * @param {Object} userData
     */
    // async register(userData) {
    //     const response = await .post("api/auth/register", userData);

    //     return response.data;
    // }

    static async forgotPassword(email){
      try {
        
        const response =  await new Http().post('/auth/forgot', email,   )
      
        // console.log("here in static async login(credentials) ");
        //   const response = await Http.post('/api/auth/forgot',
        //   email);
          
          return new ResponseWrapper(response, response.data.data)
        } catch (error) {
          throw new ErrorWrapper(error)
        }

        // const response = await Http.post("api/auth/forgot", email);
        
        // return response.data;
    }

    static async passwordReset(passwordData){
      try {
        console.log("jhvj");
        const response = await new Http().post("/auth/reset", passwordData,);
        
        //tem de fazer login a seguir
        if(Store.getters.userRole.name == 'admin'){
          router.push("/backHome");
        }else{
           router.push("/front");
        }

        return new ResponseWrapper(response, response.data.data)
      } catch (error) {
        throw new ErrorWrapper(error)
      }

    }

    // async logout(passwordData){
    //     const response = await Http.delete("api/auth/logout");
        
    //     return response.data;
    // }

    static async logout(credentials) { 
        
        try {
        
            console.log("here in static async login(credentials) ");
              // const response = await axios.delete('/auth/logout',credentials);
              const response = await new Http().delete("/auth/logout", credentials,);
              
              router.push('/');

              return new ResponseWrapper(response, response.data.data)
            } catch (error) {
              throw new ErrorWrapper(error)
            }

    }


}

 