<template>
    <div>

        <!-- <div class="container">
            <div class="row justify-content-center">
              <div class="col-6">
                
                <b-row style="margin: 10px; ">
                  <b-col >
                      <h1 style="color: rgb(74, 173, 55);padding-top: 30px " class="font-weight-bolder">Forgot Password</h1>
                  </b-col>
                </b-row>
                
                <div class="card card-default">
                  <div class="card-header">New role</div>
                  <div class="card-body">
                    
                    <form autocomplete="off" @submit.prevent="createPermission" method="post">
                      <div class="form-group">
                          <label for="name">Name :</label>
                          <input type="text" id="name" class="form-control" placeholder="model-create" v-model="name" required>
                      </div>
                     
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

        <div v-if="roles" class="item" v-for="item in roles" :key="item.id">
          {{item.name}}
        </div>
    </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer";
import {RoleService} from "../../../services/RoleService"; 

export default {
name: "Permissions",
data() {
return {
    roles: [],    
    name: null,
    loading: false,
};
},
components: {
MainContainerAdmin,
HeadContainer,
BodyContainer,
},
created() {

},
methods: {
    // async createPermission(){
    //     try {
    //         console.log("name : "+ JSON.stringify({"name":this.name}))
    //   const { data } = await PermissionService.create({"name":this.name});//this.fetchParams)
    //   this.permissions = data.content
    //   // this.pagination.total = data.total
    // } catch (e) {
    //   // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
    //   this.error = e.message
    //   console.log(e)
    // } finally {
    //   this.loading = false
    // }
    // },
async fetchData () {
    this.loading = true

    try {
      const { data } = await RoleService.getList();//this.fetchParams)
      this.roles = data.content
      // this.pagination.total = data.total
    } catch (e) {
      // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
      this.error = e.message
      console.log(e)
    } finally {
      this.loading = false
    }
  }
},
mounted () {
  this.fetchData()
}
};
</script>

<style>
</style>
