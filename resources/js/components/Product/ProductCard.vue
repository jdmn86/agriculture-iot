<template>
 <div class="card card-flip " style="margin: 5px; height: 180px;">
    <div class="card-front text-white ">

        <b-img :src="product.image" style="height: 180px" fluid-grow alt="tomato"  />

        <p style="position: absolute; top: 35%; left: 50%; transform: translate(-50%, -50%);">{{product.name}}</p>

        <p style="position: absolute; top: 55%; left: 50%; transform: translate(-50%, -50%);">{{product.brand}}</p>

    </div>
    <div class="card-back bg-white">
        <div class="card-body " style="padding: 5px; color: #327927">
            <b-row>

                <b-col>                                                                            
                    <b-row align-h="center" align-v="center" style="margin: 5px">
                        <b-col sm="6">
                            <h6 class="card-text">is_biologic</h6>
                        </b-col>
                        <b-col sm="6">
                            <p class="card-text">{{product.is_biologic}}</p>
                        </b-col>
                    </b-row>

                    <b-row  v-if="product.typeProduct_id" align-h="center" align-v="center" style="margin: 5px">
                        <b-col sm="6">
                            <h6 class="card-text">typeProduct_id :</h6>
                        </b-col>
                        <b-col sm="6">
                            <p class="card-text">{{product.typeProduct_id}}</p>
                        </b-col>
                    </b-row>

                    <b-row align-h="center" ><!-- style="margin: 5px"> -->
                        <b-col sm="7">
                            <b-button @click="$router.push({name:'productShow',params:{productId:product.id}})" variant="outline-light" block style=" border-color: #327927;color: #327927; ">Product Show</b-button>  
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
    name: "ProductCard",
    components: {
      // TerrainsOfFarm,
      // FarmDetails,
      // ModalToDelete,
    },
    props: ['product'],
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
     

      console.log("Created ProductCard");
       
               
    },
    methods: {
   
    },
    mounted () {
      console.log("Mounted ProductCard");


    
      }
  };
  </script>

  <style>
  </style>
