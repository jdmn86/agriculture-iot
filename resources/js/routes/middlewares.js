import Store from './../stores'
import { AuthService } from '../services/AuthService'

/**
 * Current user state initialization
 * @WARN Must be always first in middleware chain
 */
// export async function initCurrentUserStateMiddleware (to, from, next) {
//   const currentUserId = $store.state.user.currentUser.id

//   if (AuthService.hasRefreshToken() && !currentUserId) {
//     try {
//       await AuthService.debounceRefreshTokens()
//       await Store.dispatch('user/getCurrent')
//       next() 
//     } catch (e) {
//       console.log(e)
//     }
//   } else {
//     next()
//   }
// }

// /**
//  * Check access permission to auth routes
//  */
// export function checkAccessMiddleware (to, from, next) {
//   const currentUserId = Store.state.user.currentUser.id
//   const isAuthRoute = to.matched.some(item => item.meta.isAuth)

//   if (isAuthRoute && currentUserId) return next()
//   if (isAuthRoute) return next({ name: 'login' })
//   next()
// }

// export function setPageTitleMiddleware (to, from, next) {
//   const pageTitle = to.matched.find(item => item.meta.title)

//   if (pageTitle) window.document.title = pageTitle.meta.title
//   next()
// }


// export function checkAccessMiddleware (to, from, next) {
//     console.log("  router.beforeEach((to, from, next) => {   ");
//     const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

//     const currentUser = Store.getters["auth/currentUser"];
//     const isLoggedIn = Store.getters["auth/isLoggedIn"];
//     console.log("isLoggedIn : " + isLoggedIn);
//     if (isLoggedIn) {
//         axios.defaults.headers.common["Authorization"] = `Bearer ${
//             currentUser.token
//         }`;
//     }

//     if (requiresAuth && !isLoggedIn) {
//         next("/");
//     } 
//     else if (
//         (to.path === "/login" && isLoggedIn) ||
//         (to.path === "/register" && isLoggedIn)
//     ) {
//         next({name: 'home'});
//     } 
//     else {
//         next();
//     }
// }

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



export function checkRouteAccessMiddleware (to, from, next) {
    console.log("checkRouteAccessMiddleware");
    
    
    const roles = Store.getters["auth/roles"];

    // if (roles) {
    if (to.matched.some(record => record.meta.role) && roles){
        // console.log("roles[0].name : "+JSON.stringify(to));
         
        switch( to.meta.role ){
            
            case 'user':                
            if( roles[0].name == 'user' ||  roles[0].name == 'adminCompany'){
                console.log("roles[0].name : "+roles[0].name);
                console.log("roles[0].name == user ||  roles[0].name == adminCompany");
                next();
            }else{
                console.log("NNN roles[0].name"+roles[0].name);
                console.log("NNN roles[0].name == user ||  roles[0].name == adminCompany");
                console.log("go to : /front/home");
                next('/front/home');
            }
            break;
            /*
            If the route that requires authentication is an admin and the permission
            the user has is greater than or equal to 2 (an owner or higher), we allow
            access. Otherwise we redirect back to the cafes.
            */
            case 'adminCompany':
            if( roles[0].name == 'adminCompany'){
                console.log("roles[0].name : "+roles[0].name);
                console.log("roles[0].name == adminCompany");
                next();
            }else{
                console.log("NNN roles[0].name"+roles[0].name);
                console.log("NNN roles[0].name == adminCompany");
                console.log("go to : /front/home");
                next('/front/home');
            }
            break;
            /*
            If the route that requires authentication is a super admin and the permission
            the user has is equal to 3 (a super admin), we allow
            access. Otherwise we redirect back to the cafes.
            */
            case 'admin':
            if( roles[0].name == 'admin'){
                console.log("roles[0].name : "+roles[0].name);
                console.log("roles[0].name == admin");
                next();
            }else{
                console.log("NNN roles[0].name"+roles[0].name);
                console.log("NNN roles[0].name == admin");
                console.log("go to : /backAdmin");
                next('/backAdmin/home');
            }
            break;
        }
    }else{
        console.log(" route access next");
        next();
    }


}