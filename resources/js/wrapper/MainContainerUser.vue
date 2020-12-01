<template>
      <div id="demo" :class="[{'collapsed' : collapsed}]">
            <b-container fluid>
      <!--  <div class="py-4 main">
                  <div class="container">
                        <div class="row justify-content-center"> -->
                        <!-- <div class="container-fluid"> -->

                              <slot></slot>

                              

                              <template>
                                    <sidebar-menu :menu="menu" :width="'180px'"/>
                                  </template>
                        <!-- </div> -->
            <!--      </div>
            </div> -->
            </b-container> 
      </div>
</template>

<script>
      import { SidebarMenu } from 'vue-sidebar-menu'

      const logoImg = {
    data() {
        return {
            src: '/img/logo3.png'
        }
    },
    template: '<div style="padding-left: 35px; background-color: #f2f2f2;" class="row"> <img width="35px" height="35px" :src="src"> <h3 class="font-weight-bolder" style="color: #4AAD37; padding-top: 5px; padding-left: 5px;">Sada Lab</h3> </div>'
}

export default {
  name: "MainContainerUser",
 components:{
      SidebarMenu,
 },
 data(){
            return{
                  collapsed: false,
                  menu: [
                              // {
                              //     component: UserCard,
                              //     hidden: false,
                              //     hiddenOnCollapse: true,
                              // },
                              // header item
                              {
                                    header: true,
                                    title: 'Sada Lab',
                                    component: logoImg,
                                    hiddenOnCollapse: true,
                                    // hidden: false
                                    // hiddenOnCollapse: true
                                    // class: ''
                                    // attributes: {}
                              },
                              {
                              href: { path:'/front'},                
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Home',

                              // icon class
                              icon: 'fa fa-user',
                              /* or custom icon
                              icon: {
                                    element: 'span',
                                    class: 'fa fa-user',
                                    // attributes: {}
                                    // text: ''
                              }
                              */

                              /*
                              badge: {
                                    text: 'new',
                                    class: 'vsm--badge_default'
                                    // attributes: {}
                                    // element: 'span'
                              }
                              */

                              // child: []
                              // disabled: true
                              // class: ''
                              // attributes: {}
                              // alias: '/path'
                              // hidden: false
                              // hiddenOnCollapse: true
                              },
                              {
                              href: { path:'/front/company'},                
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Company',

                              // icon class
                              icon: 'fas fa-user',
                              /* or custom icon
                              icon: {
                                    element: 'span',
                                    class: 'fa fa-user',
                                    // attributes: {}
                                    // text: ''
                              }
                              */

                              /*
                              badge: {
                                    text: 'new',
                                    class: 'vsm--badge_default'
                                    // attributes: {}
                                    // element: 'span'
                              }
                              */

                              // child: []
                              // disabled: true
                              // class: ''
                              // attributes: {}
                              // alias: '/path'
                              // hidden: false
                              // hiddenOnCollapse: true
                              },             
                              {
                              href: { path:'/front/Farms'},
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Farms',

                              // icon class
                              icon: 'fas fa-cogs',
                              /* or custom icon
                              icon: {
                                    element: 'span',
                                    class: 'fa fa-user',
                                    // attributes: {}
                                    // text: ''
                              }
                              */

                              /*
                              badge: {
                                    text: 'new',
                                    class: 'vsm--badge_default'
                                    // attributes: {}
                                    // element: 'span'
                              }
                              */

                              // child: []
                              // disabled: true
                              // class: ''
                              // attributes: {}
                              // alias: '/path'
                              // hidden: false
                              // hiddenOnCollapse: true
                              
                              },
                        
                        {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */
                        href: { path:'/front/Terrain/listTerrain'},

                        title: 'Land',

                        // icon class
                        icon: 'fas fa-globe-europe',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },
                  {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */
                        href: { path:'/front/devices/userList'},
                        title: 'Devices',

                        // icon class
                        icon: 'fas fa-solar-panel',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },
                        {
                              href: { path:'/front/Employes'},
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Employes',

                              // icon class
                              icon: 'fas fa-users',
                              /* or custom icon
                              icon: {
                                    element: 'span',
                                    class: 'fa fa-user',
                                    // attributes: {}
                                    // text: ''
                              }
                              */

                              /*
                              badge: {
                                    text: 'new',
                                    class: 'vsm--badge_default'
                                    // attributes: {}
                                    // element: 'span'
                              }
                              */

                              // child: []
                              // disabled: true
                              // class: ''
                              // attributes: {}
                              // alias: '/path'
                              // hidden: false
                              // hiddenOnCollapse: true
                              },
                  {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */
                        href: { path:'/front/Cultivos/listCultivo'},

                        title: 'Crops',

                        // icon class
                        icon: 'fas fa-carrot',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                  
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },     
                  {
                        href: { path:'/front/plants/list'},
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'Plants ',

                        // icon class
                        icon: 'fas fa-seedling',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        // child: []
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                        },
                        {
                        href: { path:'/front/pragas/listPragas'},
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'Diseases / Pests ',

                        // icon class
                        icon: 'fas fa-stethoscope',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        // child: []
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                        },
                        {
                        href: { path:'/front/Products'},
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'Products ',

                        // icon class
                        icon: 'fas fa-prescription-bottle',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        // child: []
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                        },
                        {
                        href: { path:'/front/data'},
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'My Crops History ',

                        // icon class
                        icon: 'fas fa-funnel-dollar',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        // child: []
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                        },
                        {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'Alerts',

                        // icon class
                        icon: 'fas fa-exclamation-triangle',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        child: [  {
                                    href: { path:'/front/Alert/Water'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Water Alert',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },
                              {
                                    href: { path:'/front/data'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Soil Alert',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },
                              {
                                    href: { path:'/front/data'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Diseases/Pests Alert',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },
                              
                              {
                                    href: { path:'/front/data'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Weather Alert',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },

                              ]
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },
                  {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */

                        title: 'Schedule',

                        // icon class
                        icon: 'far fa-calendar-alt',
                        /* or custom icon
                        icon: {
                              element: 'span',
                              class: 'fa fa-user',
                              // attributes: {}
                              // text: ''
                        }
                        */

                        /*
                        badge: {
                              text: 'new',
                              class: 'vsm--badge_default'
                              // attributes: {}
                              // element: 'span'
                        }
                        */

                        child: [  {
                                    href: { path:'/front/data'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Tasks ',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },
                              {
                                    href: { path:'/front/data'},
                                    /* with vue-router you can use :to prop
                                    href: { path: '/' }
                                    you can mark link as external
                                    // external: true
                                    */

                                    title: 'Add Task',

                                    // icon class
                                    icon: 'fa fa-user',
                                    /* or custom icon
                                    icon: {
                                          element: 'span',
                                          class: 'fa fa-user',
                                          // attributes: {}
                                          // text: ''
                                    }
                                    */

                                    /*
                                    badge: {
                                          text: 'new',
                                          class: 'vsm--badge_default'
                                          // attributes: {}
                                          // element: 'span'
                                    }
                                    */

                                    // child: []
                                    // disabled: true
                                    // class: ''
                                    // attributes: {}
                                    // alias: '/path'
                                    // hidden: false
                                    // hiddenOnCollapse: true
                              },

                              ]
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },                                    
                  {
                              href: { path:'/front/Settings'},
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Settings',

                              // icon class
                              icon: 'fas fa-cogs',
                              /* or custom icon
                              icon: {
                                    element: 'span',
                                    class: 'fa fa-user',
                                    // attributes: {}
                                    // text: ''
                              }
                              */

                              /*
                              badge: {
                                    text: 'new',
                                    class: 'vsm--badge_default'
                                    // attributes: {}
                                    // element: 'span'
                              }
                              */

                              // child: []
                              // disabled: true
                              // class: ''
                              // attributes: {}
                              // alias: '/path'
                              // hidden: false
                              // hiddenOnCollapse: true
                              },
                        
                  
                  // component item
                  {
                        //component: componentName
                        // hidden: false
                        // hiddenOnCollapse: true
                  }
                              ]
            }
      },
methods: {
            
            onToggleCollapse (collapsed) {
            console.log(collapsed)
            this.collapsed = collapsed
            },
            onItemClick (event, item) {
            console.log('onItemClick')
            // console.log(event)
            // console.log(item)
            },
      },
      mounted() {
      console.log('Component MainApp mounted.')
      },
}; 
</script>

<style >
 #demo {
  padding-left: 180px;
}
#demo.collapsed {
  padding-left: 50px;
}

.v-sidebar-menu {
    background-color: #4AAD37 !important;
}       
.v-sidebar-menu .vsm--toggle-btn { 
    color: #fff;
    background-color: #327927 !important;
}
.v-sidebar-menu .vsm--link_level-1 .vsm--icon {
    background-color: #327927 !important;
}
</style>  
 




