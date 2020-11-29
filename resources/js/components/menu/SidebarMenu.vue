<template>
  <div
    class="v-sidebar-menu"
    :class="[!isCollapsed ? 'vsm_expanded' : 'vsm_collapsed', theme ? `vsm_${theme}` : '', rtl ? 'vsm_rtl' : '']"
    :style="[relative ? {'position' : 'relative', 'height' : '100%'} : '', {'width': sidebarWidth}]"
    @mouseleave="onMouseLeave"
  >
    <slot name="header" />
    <div
      class="vsm--list"
    >
      <item
        v-for="(item, index) in menu"
        :key="index"
        :item="item"
        :is-collapsed="isCollapsed"
        :active-show="activeShow"
        :show-one-child="showOneChild"
        :show-child="showChild"
        :rtl="rtl"
        @set-mobile-item="setMobileItem"
        @unset-mobile-item="unsetMobileItem"
      >
        <slot
          slot="dropdown-icon"
          name="dropdown-icon" 
        />
      </item>  
    </div>
    <div
      v-if="isCollapsed"
      :style="[{'position' : 'absolute'}, {'top' : `${mobileItemPos}px`}, rtl ? {'right' : '0px'} : {'left' : '0px'}, {'z-index' : 30}, {'width' : width}]"
    >
      <item
        v-if="mobileItem"
        :item="mobileItem"
        :mobile-item="true"
        :is-collapsed="isCollapsed"
        :show-child="showChild"
        :rtl="rtl"
      >
        <slot
          slot="dropdown-icon" 
          name="dropdown-icon"
        />
      </item>
      <transition name="slide-animation">
        <div
          v-if="mobileItem"
          class="vsm--mobile-bg"
          :style="[{'position' : 'absolute'}, {'left' : '0px'}, {'right' : '0px'}, {'top' : '0px'}, {'height' : `${mobileItemHeight}px`}]"
        />
      </transition>
      <div
        class="vsm--dropdown"
        :style="[{'position' : 'absolute'}, {'top' : `${mobileItemHeight}px`}, {'left' : rtl ? '0px': sidebarWidth}, {'right' : rtl ? sidebarWidth: '0px'}, {'max-height' : `calc(${parentHeight} - ${mobileItemPos + mobileItemHeight}px - ${parentOffset}px)`}, {'overflow-y' : 'auto'}]"
      >
        <transition
          name="expand"
          @enter="expandEnter"
          @afterEnter="expandAfterEnter"
          @beforeLeave="expandBeforeLeave"
        >
          <listItem
            v-if="mobileItem && mobileItem.child"
            :items="mobileItem.child"
            :show-child="showChild"
            :rtl="rtl"
            :is-collapsed="isCollapsed"
          >
            <slot
              slot="dropdown-icon"
              name="dropdown-icon"
            />
          </listItem>
        </transition>
      </div>



    </div>
    <slot name="footer" />
    <button
      v-if="!hideToggle"
      class="vsm--toggle-btn"
      :class="{'vsm--toggle-btn_slot' : $slots['toggle-icon']}"
      @click="onToggleClick"
    >
      <slot name="toggle-icon" />
    </button>
  </div>
</template>

<script>
import Item from './Item.vue'
import ListItem from './ListItem.vue'
import { animationMixin } from './mixin.js'
// import UserCard from "../clients/User/UserCard.vue"

const logoImg = {
    data() {
        return {
            src: '/img/logo3.png'
        }
    },
    template: '<div style="padding-left: 35px; background-color: #f2f2f2;" class="row"> <img width="35px" height="35px" :src="src"> <h3 class="font-weight-bolder" style="color: #4AAD37; padding-top: 5px; padding-left: 5px;">Sada Lab</h3> </div>'
}

export default {
  name: 'SidebarMenu',
  components: {
    Item,ListItem,
  },
  mixins: [animationMixin],
  props: {    
    collapsed: {
      type: Boolean,
      default: false
    },
    width: {
      type: String,
      default: '180px'
    },
    widthCollapsed: {
      type: String,
      default: '50px'
    },
    showChild: {
      type: Boolean,
      default: false
    },    
    showOneChild: {
      type: Boolean,
      default: false
    },
    rtl: {
      type: Boolean,
      default: false
    },
    relative: {
      type: Boolean,
      default: false
    },
    hideToggle: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      isCollapsed: this.collapsed,
      mobileItem: null,
      mobileItemPos: 0,
      mobileItemHeight: 0,
      mobileItemTimeout: null,
      activeShow: null,
      parentHeight: '100vh',
      parentOffset: 0,
      theme:'default-theme',
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
                href: { path:'/front/home'},                
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
                href: { path:'/front/home/company'},                
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
  computed: {
    sidebarWidth () {
      return this.isCollapsed ? this.widthCollapsed : this.width
    }
  },
  watch: {
    collapsed (val) {
      if (this.isCollapsed === this.collapsed) return
      this.isCollapsed = val
      this.unsetMobileItem()
    }
  },
  methods: {
    onMouseLeave () {
      this.unsetMobileItem()
    },
    onToggleClick () {
      this.unsetMobileItem()
      this.isCollapsed = !this.isCollapsed
      this.$emit('toggle-collapse', this.isCollapsed)
    },
    onActiveShow (item) {
      this.activeShow = item
    },
    onItemClick (event, item) {
      this.$emit('item-click', event, item)
    },
    setMobileItem ({ event, item }) {
      let sidebarTop = this.$el.getBoundingClientRect().top
      let pos = event.currentTarget.getBoundingClientRect().top - sidebarTop
      let height = event.currentTarget.offsetHeight
      let parent = this.$el.parentElement
      let parentTop = parent.getBoundingClientRect().top
      let parentHeight = parent.offsetHeight
      this.unsetMobileItem() 
      this.$nextTick(() => {
        if (this.relative) {
          this.parentHeight = `${parentHeight}px`
          this.parentOffset = sidebarTop - parentTop
        } else {
          this.parentOffset = sidebarTop
        }
        this.mobileItem = item
        this.mobileItemPos = pos
        this.mobileItemHeight = height
      })
    },
    unsetMobileItem (touchClick, hasChild) {
      if (!touchClick) {
        this.mobileItem = null
        return
      }
      clearTimeout(this.mobileItemTimeout)
      if (hasChild) return
      this.mobileItemTimeout = setTimeout(() => {
        this.mobileItem = null
      }, 600)
    }
  },
  provide () {
    return {
      emitActiveShow: this.onActiveShow,
      emitItemClick: this.onItemClick
    }
  },
  mounted(){
    console.log("sidebarmenu mounted");
  }
}
</script>

<style lang="scss">
@import './vue-sidebar-menu.scss';
</style>