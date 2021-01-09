import { MainContainerUser, MainContainerAdmin,FrontHome, BackHome, Welcome, PasswordReset, AdminCompany,NotFound,Users,PermissionRole,Farm,FarmShow,FarmCreate,FarmEdit,FarmList,Company,CompanyShow,Terrain,TerrainCreate,TerrainEdit,TerrainList,TerrainShow,Crop,CompanyCreate,UserCreate,Account,Plant,PlantList,PlantShow,VarietyCreate,VarietyEdit,Plague,PlagueList,PlagueShow,PlagueEdit,PlagueCreate,Product,ProductList,ProductShow,ProductCreate,ProductEdit} from "../pages";
import Login from "@/components/Login"
import TopNavBarUser from "../layouts/TopNavBarUser";

export const routes = [
    {
        name: "welcome",
        path: "/",
        components: {  
                default: Welcome, 
                // navTop: TopNavBar,  
            },
         children: [
            {
                // name: "login",
                path: "login",
                component:  Login, 
                meta: {
                    role: 'user',
                    requireAuth: false,
                    },
                    
            }, 
        ]  
    },


    {
        // name: "home",
        path: "/front",
        components: { 
                default: MainContainerUser,
                // nav: SidebarMenu, 
            },
        meta: {
            role: 'user',
            requireAuth: true,
          },
        children: [
        {
                name: "home",
                path: "home",
                components: { 
                        default: FrontHome, 
                        // navTop: TopNavBarUser, 
                    },
                meta: {
                    role: 'user',
                    requireAuth: true,
                    },

                    
            },   
         {
                
                path: "company",
                components: { 
                        default: Company, 
                        // navTop: TopNavBarUser, 
                    },
                meta: {
                    role: 'user',
                    requireAuth: true,
                    },
                children: [   
                    {
                        name: "company",
                        path: '',
                        component: CompanyShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },

                    }, 
                 ]   
            },   
            {
                
                path: "farm",
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
                        name: "farm",
                        path: '',
                        component: FarmList,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        // props: route => ({ ...route.query, ...route.params })
                        props: route => ({ ...route.query})

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
                        name: 'farmShow',
                        path: ':farmId/',
                        component: FarmShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        props: route => ({ ...route.query, ...route.params })
                    },
                     {
                        name: 'farmEdit',
                        path: ':farmId/edit',
                        component: FarmEdit,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        props: route => ({ ...route.query, ...route.params })
                    },
                 
                    
                ]         
            },     
             
            {
            
                path: 'terrain',
                component: Terrain,
                meta: {
                    role: 'user',
                    requireAuth: true,
                },
                 children: [   
                    {
                        name: "terrain",
                        path: '',
                        component: TerrainList,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        // props: route => ({ ...route.query, ...route.params })
                        props: route => ({ ...route.query})

                    },      
                   {
                        name: 'terrainCreate',
                        path: 'create',
                        component: TerrainCreate,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                    }, 
                    {
                        name: 'terrainShow',
                        path: ':terrainId/',
                        component: TerrainShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                         props: route => ({ ...route.query, ...route.params })
                    },
                     {
                        name: 'terrainEdit',
                        path: ':terrainId/edit',
                        component: TerrainEdit,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        props: route => ({ ...route.query, ...route.params })
                    },
                 
                    
                ]    
                
            },
            
                     
            {
                name: "crop",
                path: "crop",
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
            
                path: 'plant',
                component: Plant,
                meta: {
                    role: 'user',
                    requireAuth: true,
                },
                 children: [   
                    {
                        name: "plant",
                        path: '',
                        component: PlantList,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        // props: route => ({ ...route.query, ...route.params })
                        props: route => ({ ...route.query})

                    },      
                   
                    {
                        name: 'plantShow',
                        path: ':plantId/',
                        component: PlantShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                         props: route => ({ ...route.query, ...route.params }),

                         children:[
                         {
                        name: 'varietyCreate',
                        path: 'variety/create',
                        component: VarietyCreate,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                            },
                        }, 
                         {
                            name: 'varietyEdit',
                            path: 'variety/edit',
                            component: VarietyEdit,
                            meta: {
                                role: 'adminCompany',
                                requireAuth: true,
                            },
                            props: route => ({ ...route.query, ...route.params })
                            },

                         ]
                    },
                    
                 
                    
                ]    
                
            },  
             {
            
                path: 'plague',
                component: Plague,
                meta: {
                    role: 'user',
                    requireAuth: true,
                },
                 children: [   
                    {
                        name: "plague",
                        path: '',
                        component: PlagueList,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        // props: route => ({ ...route.query, ...route.params })
                        props: route => ({ ...route.query})

                    },    
                     {
                        name: 'plagueCreate',
                        path: 'create',
                        component: PlagueCreate,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                            },
                        },   
                    {
                        name: 'plagueShow',
                        path: ':plagueId/',
                        component: PlagueShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                         props: route => ({ ...route.query, ...route.params }),

                    },
                     {
                        name: 'plagueEdit',
                        path: ':plagueId/edit',
                        component: PlagueEdit,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        props: route => ({ ...route.query, ...route.params })
                     },
                    
                        
                 
                    
                ]    
                
            }, 
            {
            
                path: 'product',
                component: Product,
                meta: {
                    role: 'user',
                    requireAuth: true,
                },
                 children: [   
                    {
                        name: "product",
                        path: '',
                        component: ProductList,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        // props: route => ({ ...route.query, ...route.params })
                        props: route => ({ ...route.query})

                    },    
                     {
                        name: 'productCreate',
                        path: 'create',
                        component: ProductCreate,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                            },
                        },   
                    {
                        name: 'productShow',
                        path: ':productId/',
                        component: ProductShow,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                         props: route => ({ ...route.query, ...route.params }),

                    },
                     {
                        name: 'productEdit',
                        path: ':productId/edit',
                        component: ProductEdit,
                        meta: {
                            role: 'adminCompany',
                            requireAuth: true,
                        },
                        props: route => ({ ...route.query, ...route.params })
                     },
                    
                        
                 
                    
                ]    
                
            },  
            {
                name: "account",
                path: "account",
                components: { 
                        default: Account,
                        // navTop: TopNavBarUser, 
                    },
                meta: {
                    role: 'user',
                    requireAuth: true,
                },
                      
            },       

        ]

    },
   
           


    {
        
        path: "/back",
        components: { 
                default: MainContainerAdmin,
                // navTop: TopNavBarUser, 
            },
        meta: {
            role: 'admin',
            requireAuth: true,
          },
          children: [
          {
                name: "home",
                path: "home",
                components: { 
                        default: BackHome, 
                        // navTop: TopNavBarUser, 
                    },
                meta: {
                    role: 'admin',
                    requireAuth: true,
                    },
                    
            },   
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
                component: AdminCompany,
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
        name: "NotFound",
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