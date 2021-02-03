<template>

      <div id="demo" :class="[{'collapsed' : collapsed}]" style="background-color:white;">

            <!-- <b-container fluid style="background-color:white; padding-left: 0px; padding-right: 0px; "> -->

                  <WarningFixTop />

                  <TopNavBarUser/>


                  <transition name="slide-fade"> 
                        <router-view ></router-view>
                  </transition> 
                  

                  <sidebar-menu :collapsed="collapsed"
                          :show-one-child="true"
                          @toggle-collapse="onToggleCollapse"
                          @item-click="onItemClick" :menu="menu" :width="'180px'"/>
                        
            <!-- </b-container>  -->

      </div> 

</template>  
  
<script>
      import { SidebarMenu } from 'vue-sidebar-menu'
      import TopNavBarUser from "../../layouts/TopNavBarUser";

      import WarningFixTop from "../../components/WarningFixTop";
 import Auth from '@/models/Auth'

      const logoImg = {
    data() {
        return {
            src: '/img/logo3.png'
        }
    },
    template: '<div style="padding-left: 35px; background-color: white" class="row"> <img width="35px" height="35px" :src="src"> <h3 class="font-weight-bolder" style="color: #4AAD37; padding-top: 5px; padding-left: 5px;">Sada Lab</h3> </div>'
}

export default {
  name: "MainContainerUser",
 components:{
      SidebarMenu,
      TopNavBarUser,
      WarningFixTop,
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

                              href: { path:'/front/farm'},
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
                        href: { path:'/front/terrain'},

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
                        href: { path:'/front/device'},
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
                              href: { path:'/front/employee'},
                              /* with vue-router you can use :to prop
                              href: { path: '/' }
                              you can mark link as external
                              // external: true
                              */

                              title: 'Employees',

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
                               hidden: true,
                              // hiddenOnCollapse: true
                              },
                  {
                        //href: '/front/home',
                        /* with vue-router you can use :to prop
                        href: { path: '/' }
                        you can mark link as external
                        // external: true
                        */
                        href: { path:'/front/crop'},

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
                        // child: [
                        //       {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Cultivo',

                        //             icon: 'fas fa-carrot',
                        //       },
                        //        {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Clima',

                        //             icon: 'fas fa-carrot',
                        //       },
                        //        {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Rega',

                        //             icon: 'fas fa-carrot',
                        //       },
                        //        {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Fertilizacao',

                        //             icon: 'fas fa-carrot',
                        //       },
                        //        {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Fitossanidade',

                        //             icon: 'fas fa-carrot',
                        //       },
                        //        {
                        //             href: { path:'/front/Crop'},

                        //             title: 'Analysis',

                        //             icon: 'fas fa-carrot',
                        //       },
                        // ],
                  
                        // disabled: true
                        // class: ''
                        // attributes: {}
                        // alias: '/path'
                        // hidden: false
                        // hiddenOnCollapse: true
                  },     
                  {
                        href: { path:'/front/plant'},
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
                        href: { path:'/front/plague'},
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
                        href: { path:'/front/product'},
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
                  
                        
                  
                  // component item
                  {
                        //component: componentName
                        // hidden: false
                        // hiddenOnCollapse: true
                  }
                              ]
            }
      },
computed : {
      auth(){
                return Auth.query().first();
            },
      },
methods: {
            
      onToggleCollapse (collapsed) {
            console.log(collapsed)
            this.collapsed = collapsed
      },
      onItemClick (event, item) {
            console.log('onItemClick')

      },

      },
mounted() {
      console.log('Component MainContainerUser mounted.')
},
 created() {
      console.log(' MainContainerUser created.')

        if(this.auth.roles[0].name == 'adminCompany'){
            this.menu[6].hidden = false;
         }
        
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
    /*color: #fff;*/
    background-color: #327927 !important;
}
.v-sidebar-menu .vsm--link_level-1 .vsm--icon {
    background-color: #327927 !important;
}

.v-sidebar-menu .vsm--link_level-1.vsm--link_exact-active, .v-sidebar-menu .vsm--link_level-1.vsm--link_active {
      /*color: red;*/
      /*box-shadow*/
      background-color: #327927 !important;
      box-shadow: 4px 0px 0px 0px #4285f4 inset !important;
}


.v-sidebar-menu .vsm--dropdown .vsm--list { 
    /*color: #fff;*/
    background-color: #4AAD37 !important;
}
</style>  
 




