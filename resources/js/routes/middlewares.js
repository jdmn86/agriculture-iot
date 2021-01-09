// import Store from './../stores'
// import { AuthService } from '../services/AuthService'

import Auth from '@/models/Auth'
 


export function checkAuthMiddleware (to, from, next) {

    let user =  Auth.query().first() || null;
    if(!user){
        user = JSON.parse(localStorage.getItem("auth"))|| null;         
        if (user) {
            Auth.create({data: user});
        }
    }

    if (user) {
        // console.log("user.token :"+user.token);
        axios.defaults.headers.common["Authorization"] = `Bearer ${
             user.token
        }`;
    }

    if (to.meta.requireAuth && !user) {
        console.log("go to : /");
        next("/");
    } else {
        next();
    } 
   
}



export  function checkRoleAccessMiddleware (to, from, next) {

    let user =   Auth.query().first();


    if(to.meta.requireAuth && user && user.roles[0]){
        // console.log("role : "+ user.roles[0].name);

        if(to.meta.role == 'user' || to.meta.role == 'adminCompany'){
            if(user.roles[0].name == 'user' || user.roles[0].name == 'adminCompany'){
                next();
            }else if(user.roles[0].name == 'admin'){
                next('/back');
            }
        }else if(to.meta.role == 'admin' ){
            if(user.roles[0].name == 'admin'){
                next();
            }else if(user.roles[0].name == 'user' || user.roles[0].name == 'adminCompany'){
                next('/front');
            }
        }else{
            next('/');
        }

    }else{
        next();
    }


}