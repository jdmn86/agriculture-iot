import Vue from 'vue'
import Store from '@/store'
import Auth from '@/models/Auth'

export default Vue.directive('can', {

    bind: function (el, binding, vnode) {

    	const userPermissions = Auth.query().first();
        // if( store.getters["auth/userPermissions"].indexOf(binding.value) !== -1){
        if( userPermissions.all_permissions.indexOf(binding.value) !== -1){
            //Store
        }else{
            el.style.visibility = "hidden" ;
        }       
        
    }
   })

