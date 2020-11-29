import Api from "../libs/Api";

/**
 * Class AuthService
 */
class AuthService {
    /**
     * Call the login api.
     * @param {Object} credentials
     */
    async login(credentials) {
        console.log("credenciais1 : "+ JSON.stringify(credentials))
        const response = await Api.post("api/auth/login", credentials);
        console.log("credenciais : "+ JSON.stringify(credentials))
        return response.data;
    }

    /**
     * Call the auth register api.
     * @param {Object} userData
     */
    async register(userData) {
        const response = await Api.post("api/auth/register", userData);

        return response.data;
    }

    async forgotPassword(email){
        const response = await Api.post("api/auth/forgot", email);
        
        return response.data;
    }

    async passwordReset(passwordData){
        const response = await Api.post("api/auth/reset", passwordData);
        
        return response.data;
    }

    async logout(passwordData){
        const response = await Api.delete("api/auth/logout");
        
        return response.data;
    }


}

export default new AuthService();

 