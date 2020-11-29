<script>
  import Store from './../stores';
  export default {
    methods: {
      $can(permissionName) {
        return Store.getters["auth/permissions"].indexOf(permissionName) !== -1;
      },
    },
  };
</script>