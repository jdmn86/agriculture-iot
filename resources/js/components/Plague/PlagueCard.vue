<template>
 <div class="card card-flip " style="margin: 5px; height: 180px;">
  <div class="card-front text-white ">
      
      <b-img :src="plague.image" style="height: 180px" fluid-grow alt="tomato"  />
      
      <h4 class="font-weight-bolder" style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">{{plague.nome_comum}}</h4>

       <h3 class="font-weight-bolder" style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">{{plague.nome_cientifico}}</h3>

  </div>
  <div class="card-back bg-white">
      <div class="card-body " style="padding: 5px; color: #327927">
         <b-row>
          
          <b-col>

            <b-row  v-if="plague.user_id" align-h="center" align-v="center" style="margin: 5px">
              <b-col sm="6">
                <h6 class="card-text">mine plague :</h6>
              </b-col>
              <b-col sm="6">
                <p class="card-text">{{plague.user_id}}</p>
              </b-col>
            </b-row>

            <b-row align-h="center" ><!-- style="margin: 5px"> -->
              <b-col sm="7">
                <b-button @click="$router.push({name:'plagueShow',params:{plagueId:plague.id}})" variant="outline-light" block style=" border-color: #327927;color: #327927; ">Plague Details</b-button>  
               </b-col>
             </b-row> 


          </b-col>

        </b-row>

       </div>
          
      </div>
</div>

</template>
                
<script>

import Auth from '@/models/Auth'

import  $bus   from '@/app';

  export default {
    name: "PlagueCard",
    components: {
      // TerrainsOfFarm,
      // FarmDetails,
      // ModalToDelete,
    },
    props: ['plague'],
    // {
        // farmSelected: { type: Object, default: null },

    // },
    data() {
      return {
            // title: "Farms",
            // loading: false,
            // google: null,
            // farmSelected: null,
      };
    },
    watch: {

      
    
    },
    computed : {
          
         

            auth(){
                return Auth.query().first();
            },
         
      },
     async created() {
     

      console.log("Created PlagueCard");
       
               
    },
    methods: {
   
    },
    mounted () {
      console.log("Mounted PlagueCard");


    
      }
  };
  </script>

  <style>
  </style>
