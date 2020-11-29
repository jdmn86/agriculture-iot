import Api from "../libs/Api";

/**
 * User service class.
 */
class UserService {
    /**
     * Get all users.
     */
    async getAllUsers() {
        let response = await Api.get("api/users/list");

        return response.data;
    }
}

export default new UserService();
