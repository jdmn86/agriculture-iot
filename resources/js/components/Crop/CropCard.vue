<template>
 <div class="card card-flip " style="margin: 5px; height: 180px;">
  <div class="card-front text-white ">
      
      <b-img :src="crop.plant.image" style="height: 180px" fluid-grow alt="tomato"  />
      
      <h4 v-if="crop.plant" class="font-weight-bolder" style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">{{crop.plant.name}}</h4>

       <h3 v-if="crop.plant" class="font-weight-bolder" style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">{{crop.plant.nome_variedade}}</h3>

  </div>
  <div class="card-back bg-white">
      <div class="card-body " style="padding: 5px; color: #327927">
         <b-row>
          
          <b-col>

            <b-row  v-if="crop.stage" align-h="center" align-v="center" style="margin: 5px">
              <b-col sm="6">
                <h6 class="card-text">Crop Stage :</h6>
              </b-col>
              <b-col sm="6">
                <p class="card-text">{{crop.stage.GrowthStageName}}</p>
              </b-col>
            </b-row>

             <b-row   align-h="center" align-v="center" style="margin: 5px">
              <b-col sm="6">
                <h6 class="card-text">Crop day:</h6>
              </b-col>
              <b-col sm="6">
                <p class="card-text">{{crop.crop_day}}</p>
              </b-col>
            </b-row>

            <b-row align-h="center" ><!-- style="margin: 5px"> -->
              <b-col sm="7">
                <b-button @click="$router.push({name:'overall',params:{cropId:crop.id}})" variant="outline-light" block style=" border-color: #327927;color: #327927; ">Crop Details</b-button>  
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
    name: "CropCard",
    components: {
      // TerrainsOfFarm,
      // FarmDetails,
      // ModalToDelete,
    },
    props: ['crop'],
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
     

      console.log("Created CropCard");
       
               
    },
    methods: {
   
    },
    mounted () {
      console.log("Mounted CropCard");


    
      }
  };
  </script >

  <style scoped>
    nav > .nav.nav-tabs{
    
    border: none;
      color:#fff;
      background:#28a745;
      border-radius:0;
  
  }
  nav > div a.nav-item.nav-link,
  nav > div a.nav-item.nav-link.active
  {
    border: none;
      padding: 18px 25px;
      color:#fff;
      background:#28a745;
      border-radius:0;
  }
  
  nav > div a.nav-item.nav-link.active:after
   {
    content: "";
    position: relative;
    bottom: -60px;
    left: -10%;
    border: 15px solid transparent;
    border-top-color: #832E00 ;
  }
  .tab-content{
    background: #fdfdfd;
      line-height: 25px;
      /*border: 1px solid #ddd;*/
      border-top:5px solid #832E00;
      /*border-bottom:5px solid #832E00;*/
      /*padding:30px 25px;*/
  }
  
  nav > div a.nav-item.nav-link:hover,
  nav > div a.nav-item.nav-link:focus
  {
    border: none;
      background: #832E00;
      color:#fff;
      border-radius:0;
      transition:background 0.20s linear;
  }
  
  .card-flip > div {
    backface-visibility: hidden;
    transition: transform 300ms;
    transition-timing-function: linear;
    width: 100%;
    height: 100%;
    margin: 0;
    display: flex;
  }
  
  .card-front {
    transform: rotateY(0deg);
  }
  
  .card-back {
    transform: rotateY(180deg);
    position: absolute;
    top: 0;
  }
  
  .card-flip:hover .card-front {
    transform: rotateY(-180deg);
  }
    
  .card-flip:hover .card-back {
    transform: rotateY(0deg);
  }
  </style>
