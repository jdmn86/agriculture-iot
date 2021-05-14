<template>


  <b-col  style="margin: 10px; background-color: #f8f9fa;">

            <b-row v-if="crop.plant" align-h="start" align-v="center" style="background-color: #4AAD37;padding: 10px; " class="text-white ">
               <h4 >Balance Nutrients {{crop.plant.name}}</h4>
    
            </b-row> 

            <b-row  style="padding: 10px; " align-h="between" align-v="center">
                <b-col >
                   
                    <b-table hover :items="items" head-variant="light"></b-table>

                </b-col>

            </b-row>

        </b-col>



<!-- 

  <b-col v-if="crop.plant">

    <p>Total Nutrients needs for {{crop.plant.name}}</p>
    
    <table class="table">
  <thead>
    <tr class="table-primary"> 
      <th scope="col">expectedProductionByHa</th>     
      <th scope="col">nitrogen</th>
      <th scope="col">phosphorus</th>
      <th scope="col">potassium</th>
      <th scope="col">Magnesium</th>
      <th scope="col">Calcium</th>
      <th scope="col">Sulfur</th>
      <th scope="col">Sodium</th>
      <th scope="col">Boron</th>
      <th scope="col">zinc</th>
      <th scope="col">Manganese</th>
      <th scope="col">Cooper</th>
      <th scope="col">Iron</th>
      <th scope="col">Aluminium</th>      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{crop.expectedProductionByHa}}</th>
      <td>{{nitrogenTotal}}</td>
      <td>{{phosphorusTotal}}</td>
      <td>{{potassiumTotal}}</td> 
      <td>{{MagnesiumTotal}}</td>
      <td>{{CalciumTotal}}</td>
      <td>{{SulfurTotal}}</td>
      <td>{{SodiumTotal}}</td>
      <td>{{BoronTotal}}</td>
      <td>{{zincTotal}}</td>
      <td>{{ManganeseTotal}}</td>
      <td>{{CooperTotal}}</td>
      <td>{{IronTotal}}</td> 
      <td>{{AluminiumTotal}}</td>

    </tr>   
  </tbody>
</table>


 
</b-col> -->





</template>

<script>

import Plant from '@/models/Plant'
import PlantUptake from '@/models/PlantUptake'

    export default {
        name: 'BalanceNutrients',
        components:{},
        props:{            
          crop: { type: Object, default: null },
          plantUptakes : { type: Array },
        },
        data() {
            return {
                 items: [
                    { 
                        nitrogen: null,
                        phosphorus: null,
                        potassium: null,
                        Magnesium: null,
                        Calcium: null,
                        Sulfur: null,
                        Sodium: null,
                        Boron: null,
                        zinc: null,
                        Manganese: null,
                        Cooper: null,
                        Iron: null,
                        Aluminium: null,
                    },
                ],
              
            } 
        }, 
        watch: {
          
        //     farm(newValue) {
        //         this.$store.commit('SET_TERRAINSBYFARM', newValue);
        //     }
    
        },
        computed: {
            
               
             
          },
        methods: { 


            getTotals(){
                //terreno area get heactares * rationProduction
var hectar = Number(this.crop.terrain.area * 0.0001);            

console.log("hectar :" + hectar);


             var ratioProduction= Number(this.crop.expectedProductionByHa / this.plantUptakes[0].expectedProductionByHa * hectar );

console.log("ratioProduction :"+ratioProduction)

            //       = this.get_nutrientUptakeAllFases[1].expectedProductionByHa;


             for (var i = 0; i < this.plantUptakes.length; i++) {

              var days =Number(this.plantUptakes[i].plantStage.stopDayCropFase - this.plantUptakes[i].plantStage.startDayCropFase);

              console.log("days :"+days)

               this.items[0].nitrogen += Number(this.plantUptakes[i].nitrogen) * days * ratioProduction ;

               this.items[0].phosphorus += Number(this.plantUptakes[i].phosphorus) * days * ratioProduction ;

               this.items[0].potassium += Number(this.plantUptakes[i].potassium) * days * ratioProduction ;

               this.items[0].Magnesium += Number(this.plantUptakes[i].Magnesium) * days * ratioProduction ;

               this.items[0].Calcium += Number(this.plantUptakes[i].Calcium) * days * ratioProduction ;

               this.items[0].Sulfur += Number(this.plantUptakes[i].Sulfur) * days * ratioProduction ;

               this.items[0].Sodium += Number(this.plantUptakes[i].Sodium) * days * ratioProduction ;

               this.items[0].Boron += Number(this.plantUptakes[i].Boron) * days * ratioProduction;

               this.items[0].zinc += Number(this.plantUptakes[i].zinc) * days * ratioProduction ;

               this.items[0].Manganese += Number(this.plantUptakes[i].Manganese) * days * ratioProduction;

               this.items[0].Cooper += Number(this.plantUptakes[i].Cooper) * days * ratioProduction ;

               this.items[0].Iron += Number(this.plantUptakes[i].Iron) * days * ratioProduction ;

               this.items[0].Aluminium += Number(this.plantUptakes[i].Aluminium) * days * ratioProduction ;


             }

             this.items[0].nitrogen = this.items[0].nitrogen.toFixed(2);
             this.items[0].phosphorus = this.items[0].phosphorus.toFixed(2);
             this.items[0].potassium = this.items[0].potassium.toFixed(2);
             this.items[0].Magnesium = this.items[0].Magnesium.toFixed(2);
             this.items[0].Calcium = this.items[0].Calcium.toFixed(2);
             this.items[0].Sulfur = this.items[0].Sulfur.toFixed(2);
             this.items[0].Sodium = this.items[0].Sodium.toFixed(2);
             this.items[0].Boron = this.items[0].Boron.toFixed(2);
             this.items[0].zinc = this.items[0].zinc.toFixed(2);
             this.items[0].Manganese = this.items[0].Manganese.toFixed(2);
             this.items[0].Cooper = this.items[0].Cooper.toFixed(2);
             this.items[0].Iron = this.items[0].Iron.toFixed(2);
             this.items[0].Aluminium = this.items[0].Aluminium.toFixed(2);

            
            },
            
              },
         created(){
          console.log('Component  BalanceNutrients created.');
             
           

         },
          mounted () { 

            console.log('Component  BalanceNutrients mounted.');

            if(this.plantUptakes.length){
                console.log("in if more than 1")
                this.getTotals();
            }
         },

     }
</script>

<style scoped>




</style>

