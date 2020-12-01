// Register a global custom directive called `v-focus`
Vue.directive('can', {
    // When the bound element is inserted into the DOM...
    bind: function (el, binding, vnode) {

        if( this.$store.getters.auth.userPermissions.indexOf(el.binding.value) !== -1){
            
        }else{
            el.style.visibility = "hidden" ;
        }       
        
    }
  })

