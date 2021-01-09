<template>
      <div>
        <Loading :loading.sync="loading" ></Loading>

          <div v-if="companies" class="item" v-for="item in companies" :key="item.id">
            <h1>{{item.name}}</h1>
          </div>

          <b-button   @click="$router.push({name:'companyCreate'})" variant="light"   style=" border-color: #4AAD37 ;color: #4AAD37;margin-bottom: 10px ">Add Company</b-button>

          <router-view></router-view>

      </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
// import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer"
// import {CompanyService} from "../../../services/CompanyService"; 
import Loading from "../../../components/Loading";

// import {mapGetters,mapActions} from 'vuex'

export default {
name: "Company",
data() {
  return {
    title: "Company",
    loading: false,
  };
},
components: {
  // MainContainerAdmin,
  HeadContainer,
  BodyContainer,
  Loading,
},
computed : {
      // ...mapGetters('company',['companies']),
},
created() {
  
},
methods: {
  // ...mapActions('company',['setCompanies','addCompany']),
  async fetchData () {
      this.loading = true

      try {
        const { data } = await CompanyService.getList();//this.fetchParams)
        
        this.setCompanies(data);
        console.log("companies :"+JSON.stringify(data));
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
