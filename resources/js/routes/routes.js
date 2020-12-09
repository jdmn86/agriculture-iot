import { FrontHome, BackHome, Welcome, PasswordReset, Company,NotFound,Users,PermissionRole,Farm,FarmShow,CompanyUser,Terrain,TerrainCreate,FarmCreate,Crop,Plant,CompanyCreate,UserCreate} from "../pages";

// import TopNavBar from "../layouts/TopNavBar";
import TopNavBarUser from "../layouts/TopNavBarUser";

import Store from './../stores'

// import { SidebarMenu } from 'vue-sidebar-menu'

export const routes = [
    {
        name: "welcome",
        path: "/",
        components: {  
                default: Welcome,
                // navTop: TopNavBar,  
            },
    },


    {
        name: "home",
        path: "/front",
        components: { 
                default: FrontHome,
                // nav: SidebarMenu, 
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
                // navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
            },
            
    },   
    {
        name: "farm",
        path: "/front/farm",
        components: { 
                default: Farm,
                // navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
        },
        children: [            
            {
                name: 'farmShow',
                path: ':farmId',
                component: FarmShow,
                meta: {
                    role: 'adminCompany',
                    requireAuth: true,
                },
            },
            {
                name: 'farmCreate',
                path: 'create',
                component: FarmCreate,
                meta: {
                    role: 'adminCompany',
                    requireAuth: true,
                },
            },
            {
                name: 'farmEdit',
                path: 'edit/:farmId',
                component: FarmCreate,
                meta: {
                    role: 'adminCompany',
                    requireAuth: true,
                },
            },
        ]         
    },       
    {
        name: "Terrain",
        path: "/front/terrain",
        components: { 
                default: Terrain,
                // navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
        },
        children: [            
            {
                name: 'terrainCreate',
                path: 'create',
                component: TerrainCreate,
                meta: {
                    role: 'adminCompany',
                    requireAuth: true,
                },
            },
        ]         
    },      
    {
        name: "crop",
        path: "/front/crop",
        components: { 
                default: Crop,
                // navTop: TopNavBarUser, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
        },
        // children: [            
        //     {
        //         name: 'cropCreate',
        //         path: 'create',
        //         component: CropCreate,
        //         meta: {
        //             role: 'adminCompany',
        //             requireAuth: true,
        //         },
        //     },
        // ]         
    },       
    {
        name: "plant",
        path: "/front/plant",
        components: { 
                default: Plant,
                // navTop: TopNavBarUser, 
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
                // navTop: TopNavBarUser, 
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
                children: [
                    {
                        name: "userCreate",
                        path: 'create',
                        component: UserCreate,
                        meta: {
                            role: 'admin',
                            requireAuth: true,
                        },
                    },
                ]
            },
             {
                name: "permissionRole",
                path: 'permissionRole',
                component: PermissionRole,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
            },
           
            {
                path: 'company',
                component: Company,
                meta: {
                    role: 'admin',
                    requireAuth: true,
                },
                children: [
                    {
                        name: "companyCreate",
                        path: 'create',
                        component: CompanyCreate,
                        meta: {
                            role: 'admin',
                            requireAuth: true,
                        },
                    },
                ]
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