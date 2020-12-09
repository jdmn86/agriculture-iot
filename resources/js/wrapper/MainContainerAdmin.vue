<template>
    <main> 
      <div id="demo" :class="[{'collapsed' : collapsed}]">
            <!-- <b-container fluid> -->
      <!--  <div class="py-4 main">
                  <div class="container">
                        <div class="row justify-content-center"> -->
                        <!-- <div class="container-fluid"> -->

                            <TopNavBarUser/>

                              <slot></slot>

                              

                              <template> 
                                   <sidebar-menu :collapsed="collapsed"
                                    :show-one-child="true"
                                    @toggle-collapse="onToggleCollapse"
                                    @item-click="onItemClick" :menu="menu" :width="'180px'"/>
                                  </template>

                              <!-- <SidebarMenu :collapsed="collapsed"
                              :show-one-child="true"
                              @toggle-collapse="onToggleCollapse"
                              @item-click="onItemClick"
                              :menu="menu"/> -->
                        <!-- </div> -->
            <!--      </div>
            </div> -->
            <!-- </b-container> -->
      </div>
    </main> 
</template>

<script>
      import { SidebarMenu } from 'vue-sidebar-menu';
      import TopNavBarUser from "../layouts/TopNavBarUser";
export default {
  name: "MainContainerAdmin",
 components:{
      SidebarMenu,
      TopNavBarUser
 },
 data(){
            return{
                  collapsed: false,
                  menu: [
                    {
                        header: true,
                        title: 'Admin',
                        hiddenOnCollapse: true
                    },
                    {
                        href: '/backAdmin/users',
                        title: 'Users',
                        icon: 'fa fa-user'
                    },
                    {
                        href: '/backAdmin/permissionRole',
                        title: 'permissionRole',
                        icon: 'fa fa-user'
                    },
                    {
                        href: '/backAdmin/roles',
                        title: 'roles',
                        icon: 'fa fa-user'
                    },
                    {
                        href: '/backAdmin/companys',
                        title: 'Companys',
                        icon: 'fa fa-chart-area',                       
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

<style scoped>
 #demo {
  padding-left: 180px;
}
#demo.collapsed {
  padding-left: 50px;
}

/* .v-sidebar-menu {
    background-color: #4AAD37 ;
}       
.v-sidebar-menu .vsm--toggle-btn {
    color: #fff;
    background-color: #327927 ;
}
.v-sidebar-menu .vsm--link_level-1 .vsm--icon {
    background-color: #327927 ;
} */
</style> 
 





