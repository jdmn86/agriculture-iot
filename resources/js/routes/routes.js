import { FrontHome, BackHome, Welcome, PasswordReset, Company,NotFound,Users,Permissions,Role,Farm,CompanyUser} from "../pages";

import TopNavBar from "../layouts/TopNavBar";
import TopNavBarUser from "../layouts/TopNavBarUser";

import Store from './../stores'

export const routes = [
    {
        name: "welcome",
        path: "/",
        components: {  
                default: Welcome,
                navTop: TopNavBar,  
            },
    },
    {
        name: "home",
        path: "/front",
        components: { 
                default: FrontHome,
                navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
          },
           
    },       
    {
        name: "company",
        path: "/front/company",
        components: { 
                default: CompanyUser,
                navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
          },
           
    },   
    {
        name: "farm",
        path: "/front/Farms",
        components: { 
                default: Farm,
                navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
          },
           
    },       
    {
        name: "home",
        path: "/backAdmin",
        components: { 
                default: BackHome,
                navTop: TopNavBarUser, 
            },
        meta: {
            role: 'admin',
            requireAuth: true,
          },
          children: [
            {
                path: 'users',
                component: Users,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
            },
            {
                path: 'permissions',
                component: Permissions,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
            },
            {
                path: 'roles',
                component: Role,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
            },
            {
                path: 'companys',
                component: Company,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
            }
        ]
    },    
    {
        path :'*',
        component: NotFound,
    },
    {
        path: "/password/reset/:token",
        component: PasswordReset,
        // meta: {
        //     requiresAuth: true
        // }
    }
];


//  function requireAuth(to, from, next){

//     console.log("requireAuth");

//     const currentUser = Store.getters["auth/currentUser"];
//     const isLoggedIn = Store.getters["auth/isLoggedIn"];
    
//     if (to.meta.requireAuth && isLoggedIn) {
//         axios.defaults.headers.common["Authorization"] = `Bearer ${
//             currentUser.token
//         }`;
//     }
    
//     if (to.meta.requireAuth && !isLoggedIn) {
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


// function procede(to, from, next){

//     const permissions = Store.getters["auth/permissions"];
//     console.log("permission "+permissions);
//     if(to.meta.role.includes(permissions)){
//         console.log(" tem role role");
//     }else{
//         console.log(" NAO NAO role role");
//         console.log("permission "+JSON.stringify(permissions));
//         console.log("to.meta.role "+to.meta.role);
        
//     }
// }