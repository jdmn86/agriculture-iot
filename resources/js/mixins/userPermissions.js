import Store from './../stores'; 
  export default {
    
    methods: {
      $can(permissionName) {
        console.log("PERMISSIONS");
        return this.$store.getters["auth/userPermissions"].indexOf(permissionName) !== -1;
        // return Store.getters["auth/permissions"].indexOf(permissionName) !== -1;
      },
    },
  };

 

 