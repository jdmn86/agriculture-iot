<template>
    <div>
      <Loading :loading.sync="loading" ></Loading>

      <b-col sm="6"   >
        <b-container fluid  style=" background-color: #f8f9fa; margin: 0px; ">
            <b-row align-h="center" style="background-color: #4AAD37;" class="text-white">
              <b-col cols="auto" class="mr-auto p-3">
                <!-- <h4 v-if="farmToEdit">Edit Farm</h4> -->
                <h4 >Add New Farm</h4>
              </b-col>
              <b-col cols="auto" class="p-3" >
                <a @click="$router.go(-1)">
                  <i class="fas fa-times fa-2x"/>
                </a>
              </b-col>
            </b-row> 
  
           <b-form @submit.prevent="saveCompany" style="margin-top: 40px;margin-left: 25px">
  
                <b-form-group  label-cols-sm="5" label="Company Or private : " label-for="is_company">

                <b-form-checkbox
                      id="is_company"
                      v-model="company.is_company"
                      name="is_company"
                
                    >
                    </b-form-checkbox>   
                </b-form-group>

                    <b-form-group  label="name : " label-for="name"
                      label-cols-sm="5"> 
                      <b-form-input
                          id="name"
                          v-model="company.name"
                          type="text"
                          required
                          placeholder="name"
                          class="w-75 p-3" 
                      ></b-form-input>
                    </b-form-group>
  
                    <b-form-group  label-cols-sm="5" label="company_name : " label-for="company_name">
  
                      <b-form-input
                        id="company_name"
                        v-model="company.company_name"
                        required
                        type="text"
                        placeholder="company_name"
                        class="w-75 p-3"
                      ></b-form-input>
                    </b-form-group>

                    <b-form-group  label-cols-sm="5" label="nif : " label-for="nif">
  
                        <b-form-input
                          id="nif"
                          v-model="company.nif"
                          required
                          type="number"
                          placeholder="nif"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group>

                      <b-form-group  label-cols-sm="5" label="email : " label-for="email">
  
                        <b-form-input
                          id="email"
                          v-model="company.email"
                          required
                          type="email"
                          placeholder="email"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group>

                      <b-form-group  label-cols-sm="5" label="email_notifications : " label-for="email_notifications">
  
                        <b-form-input
                          id="email_notifications"
                          v-model="company.email_notifications"
                          required
                          type="email"
                          placeholder="email_notifications"
                          class="w-75 p-3"
                        ></b-form-input>
                      </b-form-group>
  
             
            </b-form>
            
            <b-row align-h="center" style="margin-top: 20px">
                  <!-- <b-button v-if="farmToEdit" type="submit" btn-block @click="updateFarm" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Update Farm</b-button> -->
                  <b-button type="submit" btn-block @click="saveCompany" variant="light" class="text-white"  style=" background-color: #4AAD37; padding: 10px; margin:10px">Save Farm</b-button>
                 
            </b-row>
  
        </b-container>
        </b-col>



    </div>                
</template>

<script>
import HeadContainer from "../../../wrapper/HeadContainer";
import MainContainerAdmin from "../../../wrapper/MainContainerAdmin";
import BodyContainer from "../../../wrapper/BodyContainer"
import {CompanyService} from "../../../services/CompanyService"; 
import Loading from "../../../components/Loading";

import {mapGetters,mapActions} from 'vuex'

export default {
name: "CompanyCreate",
data() {
return {
  title: "Company Create",
  loading: false,
  company: {
        is_company: null,
        name: null,
        company_name: null,
        nif: null,
        email: null,
        email_notifications: null,
    },
};
},
components: {
MainContainerAdmin,
HeadContainer,
BodyContainer,
Loading,
},
computed : {
    ...mapGetters('company',['companies']),
},
created() {

},
methods: {
...mapActions('company',['setCompanies','addCompany']),
async saveCompany () {
    this.loading = true

    try {
      const { data } = await CompanyService.create(this.company);//this.fetchParams)
    //   this.company = data.content

      this.addCompany(data);
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
