<template>
  <MainContainerUser>
    <!-- <div class="col-md-12"> -->
      <div>
          <HeadContainer :title="title">
                <template slot="search"></template>
          </HeadContainer>

          <BodyContainer  >
                <template slot="body"> 
                        
                  <b-container v-if="userCompany" fluid  style=" background-color: #f8f9fa; margin: 0px; ">

                        <b-row   style="padding:10px;" >

                              <b-col sm="4"  style=" border-radius: 4px; color: black; padding: 0px"  
                                 >                    
                                  
                                  <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                                       
              
                                        <b-col sm="4" style="  padding: 0px">
              
                                          <b-row style="padding: 0px; margin: 5px" align-h="center"  >
                                              
                                                <h3>{{userCompany.name}}</h3>
                                            
                                          </b-row>
                                          
                                          <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                                             
              
                                              <b-col v-if="userCompany">
                                                  <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5>Company</h5>
                                                        </div>
                                                        <div>
                                                            <p>{{userCompany.company_name}}</p>
                                                        </div>
                                                   </div>
                                              </b-col>
                                     
                                          </b-row> 

                                          <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                                             
              
                                                <b-col v-if="userCompany">
                                                    <div class="d-flex justify-content-between">
                                                          <div>
                                                              <h5>Company</h5>
                                                          </div>
                                                          <div>
                                                              <p>{{userCompany.nif}}</p>
                                                          </div>
                                                     </div>
                                                </b-col>
                                       
                                            </b-row> 

                                            <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                                             
              
                                                <b-col v-if="userCompany">
                                                    <div class="d-flex justify-content-between">
                                                          <div>
                                                              <h5>Email Customers</h5>
                                                          </div>
                                                          <div>
                                                              <p>{{userCompany.email}}</p>
                                                          </div>
                                                     </div>
                                                </b-col>
                                       
                                            </b-row> 

                                            <b-row align-h="center" style="padding: 0px; margin: 5px"> 
                                             
              
                                                <b-col v-if="userCompany">
                                                    <div class="d-flex justify-content-between">
                                                          <div>
                                                              <h5>Email notifications</h5>
                                                          </div>
                                                          <div>
                                                              <p>{{userCompany.email_notifications}}</p>
                                                          </div>
                                                     </div>
                                                </b-col>
                                       
                                            </b-row> 
              
                                          <!-- <b-row   align-h="center" style="padding: 0px; margin: 5px">
                                                  <b-button   @click="goTodetail(t)" variant="light" class=" col"  style=" border-color: #4AAD37;color: #4AAD37; margin: 5px">Cultivo</b-button>
                                           </b-row>

                                           <b-row v-if="EDITMODE" align-h="center" style="padding: 0px; margin: 5px">
                                                  <b-button    @click="editTerrainBtn(t)" variant="light" class=" col"  style=" border-color: #795427;color: #795427; margin: 5px">Edit</b-button>
                                            </b-row>
              
                                          <b-row  v-if="EDITMODE" align-h="center" style="padding: 0px; margin: 5px">
                                                  <b-button v-b-modal.my-modal-delete-terrain @click="confirmDelete(t)" variant="light"  block style=" border-color: #ff0000;color: #ff0000; margin: 5px">Delete</b-button>
                                          </b-row>                              -->
              
                                        </b-col>
                                        
              
                                  </b-row>
                              </b-col>

                              <b-col style=" border-radius: 4px; color: black; padding: 0px" >
                                    <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                                          <h1>lista dos colegas</h1>
                                          <b-row v-for="user in userCompany.all_users" :key="id">
                                                <h1>{{user.name}}</h1>
                                          </b-row>
                                    </b-row>
                              </b-col>
                        </b-row>

                        <b-row align-h="around"  class="border border-gray-100 align-items-center" style="margin: 5px; background-color: white;">
                              <h1>chat direto colega</h1>
                                  
                        </b-row>

                  </b-container>

                  <b-container v-else fluid  style=" background-color: #f8f9fa; margin: 0px; ">
                        <NoDataContainer  :title="title">

                              <template slot="button">
                                    <b-button variant="primary" href="/front/Terrain/addTerrain">Add Terrain</b-button>
                              </template>

                        </NoDataContainer>
                  </b-container>

                </template> 
                 
          </BodyContainer>
                  

           <!-- <router-view></router-view> -->
           <!-- <slot></slot> -->
    </div>

  
</MainContainerUser>
          
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerUser from "../../../wrapper/MainContainerUser";
import BodyContainer from "../../../wrapper/BodyContainer";
import NoDataContainer from "../../../components/NoDataContainer";
import {CompanyService} from "../../../services/CompanyService"; 
import {mapGetters,mapMutations,mapActions} from 'vuex'


export default {
  name: "CompanyUser",
  data() {
    return {
      company: null,
      title: "Company",

      
}
  },
  components: {
      MainContainerUser,
    HeadContainer,
    BodyContainer,
  },
  computed : {
      ...mapGetters('auth',['currentUser']),   
      ...mapGetters('company',['userCompany']), 
},
  created() {
      this.fetchData()
  },
  methods: {
      ...mapMutations('company',['setUserCompany']),
    
      async fetchData () {
      this.loading = true

      try {
        const { data } = await CompanyService.getById(this.currentUser.company_id);//this.fetchParams)
        this.setUserCompany(data);
        this.company = data;
        console.log("company :"+ JSON.stringify(this.company))
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
    
  }
};
</script>

<style>
</style>
