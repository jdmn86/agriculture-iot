import http from "axios";

class Api {
    async get(url, params = {}) {
        const options = {
            params
        };

        const response = await http.get(url, options);

        return response;
    }

    /**
     *
     * @param {String} url
     * @param {*} data
     * @param {*} header
     */
    async post(url, data, header = {}) {
        console.log("here");
        const options = {
            header
        };
        console.log("url :"+ JSON.stringify(url));
        const response = await http.post(url, data, options);
        // console.log("here2 :"+ JSON.stringify(response));
        return response;
    }
    async delete(url, data, header = {}) {
        console.log("here delete");
        const options = {
            header
        };
        
        const response = await http.delete(url, data, options);
        // console.log("here2 :"+ JSON.stringify(response));
        return response;
    }
}

export default new Api();
 