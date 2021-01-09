<template>

   <b-col cols="5" style=" background-color: #f8f9fa;margin: 10px"  >

      <!--   <b-row style="margin: 0px" >

            <b-col > -->

                <b-row align-h="start" align-v="center" style="background-color: #4AAD37; padding: 10px;" class="text-white ">

                    <h4>{{company.name}}</h4>

                </b-row>

                <b-row align-h="center" style="padding: 5px;" >

                    <b-col style="margin: 5px">
                        <div class="d-flex justify-content-between">
                            <div> 
                                <h4>Company</h4>
                            </div>
                            <div>
                                <h4>{{company.company_name}}</h4>
                            </div>
                        </div>
                    </b-col>

                </b-row>

                <b-row align-h="center" style="padding: 5px;" >

                    <b-col style="margin: 5px">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Company nif</h4>
                            </div>
                            <div>
                                <h4>{{company.nif}}</h4>
                            </div>
                        </div>
                    </b-col>

                </b-row>

                <b-row align-h="center" style="padding: 5px;">

                    <b-col style="margin: 5px">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Email Customers</h4>
                            </div>
                            <div>
                                <h4>{{company.email}}</h4>
                            </div>
                        </div>
                    </b-col>

                </b-row>

                <b-row align-h="center" style="padding: 5px; ">

                    <b-col style="margin: 5px">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4>Email notifications</h4>
                            </div>
                            <div>
                                <h4>{{company.email_notifications}}</h4>
                            </div>
                        </div>
                    </b-col>

                </b-row>

       <!--      </b-col>

        </b-row> -->
    </b-col>
</template>


<script>

import Auth from '@/models/Auth'

export default {
    name: "CompanyDetails",
    components: {  
    },
    props: {
        company: { type: Object, default: null },
    },
    data() {
        return {        
        
        };
    },
    computed : {
        auth(){
            return Auth.query().first();
        },
    
    },
    created() {
    },
    methods: {

    },
    mounted () {
        console.log("Mounted FarmDetails");
    }
};
</script>

<style>
</style>
      