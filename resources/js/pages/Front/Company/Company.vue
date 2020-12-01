<template>
  <MainContainerUser>
    <div class="col-md-12">
          <HeadContainer>
                <template slot="top">Company</template>
                <template slot="search">searche</template>
          </HeadContainer>

          <BodyContent v-if="campanys">
                <template slot="body"> 
                        <h1>{{company}}</h1>
                </template> 
                 
          </BodyContent>

          <BodyNoContent v-else>
                  <template slot="body"> 
                        <h1>Sem dados</h1>
                </template> 
          </BodyNoContent>
          

           <router-view></router-view>
           <!-- <slot></slot> -->
    </div>

  <transition name="slide-fade">
    <Sidebar/>
  </transition>
  
</MainContainerUser>
          
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContent from "../../../wrapper/BodyContent";
import BodyNoContent from "../../../wrapper/BodyNoContent";

import {CompanyService} from "../../../services/CompanyService"; 
import {mapGetters,mapMutations,mapActions} from 'vuex'

export default {
  name: "CompanyUser",
  data() {
    return {
      campanys: []
    };
  },
  components: {
      MainContainerUser,
    HeadContainer,
    BodyContent,
    BodyNoContent
  },
  computed : {
      ...mapGetters('auth',['currentUser']),   
           
},
  created() {
    
  },
  methods: {
      async fetchData () {
      this.loading = true

      try {
        const { data } = await CompanyService.getList(this.currentUser.id);//this.fetchParams)
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
