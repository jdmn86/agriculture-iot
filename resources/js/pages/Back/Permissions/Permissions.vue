<template>
    <div>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-6">
                
                <b-row style="margin: 10px; ">
                  <b-col >
                      <h1 style="color: rgb(74, 173, 55);padding-top: 30px " class="font-weight-bolder">Forgot Password</h1>
                  </b-col>
                </b-row>
                
                <div class="card card-default">
                  <div class="card-header">New permission</div>
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
          </div>

        <div v-if="companys" class="item" v-for="item in permissions" :key="item.id">
          {{item.name}}
        </div>
    </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContent from "../../../wrapper/BodyContent"
import {PermissionService} from "../../../services/PermissionService"; 

export default {
name: "Permissions",
data() {
return {
    permissions: [],
    companys: [],
    name: null,
    loading: false,
};
},
components: {
MainContainerAdmin,
HeadContainer,
BodyContent,
},
created() {

},
methods: {
    async createPermission(){
        try {
            console.log("name : "+ JSON.stringify({"name":this.name}))
      const { data } = await PermissionService.create({"name":this.name});//this.fetchParams)
      this.permissions = data.content
      // this.pagination.total = data.total
    } catch (e) {
      // this.$store.commit('toast/NEW', { type: 'error', message: e.message, e })
      this.error = e.message
      console.log(e)
    } finally {
      this.loading = false
    }
    },
async fetchData () {
    this.loading = true

    try {
      const { data } = await PermissionService.getList();//this.fetchParams)
      this.permissions = data.content
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
