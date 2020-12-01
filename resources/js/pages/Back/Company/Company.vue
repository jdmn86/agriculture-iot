<template>
      <div>
          <div v-if="companys" class="item" v-for="item in companys" :key="item.id">
            {{item.name}}
          </div>
      </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContent from "../../../wrapper/BodyContent"
import {CompanyService} from "../../../services/CompanyService"; 

export default {
name: "Company",
data() {
  return {
    companys: [],
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
  async fetchData () {
      this.loading = true

      try {
        const { data } = await CompanyService.getList();//this.fetchParams)
        this.companys = data.content
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
