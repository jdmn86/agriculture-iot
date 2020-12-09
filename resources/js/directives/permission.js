import Vue from 'vue'
import Store from './../stores'

export default Vue.directive('can', {

    bind: function (el, binding, vnode) {
        if( Store.getters["auth/userPermissions"].indexOf(binding.value) !== -1){
            //Store
        }else{
            el.style.visibility = "hidden" ;
        }       
        
    }
   })

