import Store from './../stores'
import { AuthService } from '../services/AuthService'


export function checkAccessMiddleware (to, from, next) {
    console.log("checkAccessMiddleware");

    const currentUser = Store.getters["auth/currentUser"];
    const isLoggedIn = Store.getters["auth/isLoggedIn"];

    if (isLoggedIn) {
        axios.defaults.headers.common["Authorization"] = `Bearer ${
            currentUser.token
        }`;
    }

    if (to.meta.requireAuth && !isLoggedIn) {
        console.log("go to : /");
        next("/");
    } else {
        next();
    }
    // else if (
    //     (to.path === "/login" && isLoggedIn) ||
    //     (to.path === "/register" && isLoggedIn)
    // ) {
    //     console.log("go to : name home");
    //     next({name: 'home'});
    // } else {
    //     next();
        
    // }
}



export  function checkRoleAccessMiddleware (to, from, next) {
    console.log("checkRoleAccessMiddleware");
    
    const role =  Store.getters["auth/userRole"];
    const isLoggedIn = Store.getters["auth/isLoggedIn"];
    
    if(to.meta.requireAuth && isLoggedIn && role){
        console.log("role : "+ role.name);
        // const role = Store.getters["auth/role"];

        if(to.meta.role == 'user' || to.meta.role == 'adminCompany'){
            if(role.name == 'user' || role.name == 'adminCompany'){
                next();
            }else if(role.name == 'admin'){
                next('/backAdmin');
            }
        }else if(to.meta.role == 'admin' ){
            if(role.name == 'admin'){
                next();
            }else if(role.name == 'user' || role.name == 'adminCompany'){
                next('/front');
            }
        }else{
            next('/');
        }

    }else{
        next();
    }


}