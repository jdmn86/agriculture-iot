export const route = (name, params = []) => {
    // console.log("helpers index 1"+JSON.stringify(name));
    if (!apiRoutes.hasOwnProperty(name)) {
        // console.log("helpers index 2  ERRORRR");
        throw Error(`Route ${name} not defined.`);
    }

    let url = apiRoutes[name];
    // console.log("helpers index 3"+JSON.stringify(url));
    if (params.length === 0) {
        // console.log("return 0 params");
        return url;
    }
    // console.log("helpers index 4"+JSON.stringify(params));
    params.map(value => {
        url = url.replace(/{[A-Za-z0-9_?]+}/, value);
    });
    // console.log("helpers index url"+JSON.stringify(url));
    return url;
};
