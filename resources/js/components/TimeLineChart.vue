<template>


<div  >

	  <GChart
	  	:settings="{ packages: ['corechart', 'table','timeline'] }"
	    type="Timeline"
	    :data="chartData"
	    :options="chartOptions"
	    :createChart="(el, google, type) => { return new google.visualization[type](el)}"
	    @ready="onChartReady"
	  />


</div>


</template> 
 
<script>
import Vue from 'vue';
import { GChart } from 'vue-google-charts';

    export default {
	   name: 'TimeLineChart',
	   components:{GChart},
	   props: {
		crop: Object,
	   },
	   data() {
		  return{ 
		  	dataInicioCultivo: null,
		  	cultivoD: null,

	  		  	chartData: [ 
	  		  	 [
			          { type: "string", label: "name" },
			          { type: "date", label: "start" },
			          { type: "date", label: "end" }
			        ],
		           //[ 'Washington', new Date(1789, 3, 30), new Date(1797, 2, 4) ],
		          // [ 'Adams',      new Date(1797, 2, 4),  new Date(1801, 2, 4) ],
		          // [ 'Jefferson',  new Date(1801, 2, 4),  new Date(1809, 2, 4) ]
		          ],
			      chartOptions: {
			      	 timeline: { showRowLabels: true },
			      	 hAxis: {
						    format: "MMM/dd",
						  	 minValue: new Date(2019, 5, 31),
    							maxValue: new Date(2020, 0, 4),
							         
						},
					  
			        chart: {
			          title: 'Company Performance',
			          subtitle: 'Sales, Expenses, and Profit: 2014-2017',
			        }
			      }
		    }
	   },
	    watch: {
		    // terrainSelected: function() {
		    //     this.getCultivos();
		    // }
		},
	   methods: {
	   	onChartReady(chart, google){
	   		console.log("chart ready");
	   	},
		criarData(){
			//ir ao cultivo buscar o created_at

		//this.chartData.push();
			//ir a planta buscar os dias de germinação e os dias de transplantação e os de crescimento
			 var dateInit= new Date(this.cultivoD.created_at.valueOf());

			var totalCultivoDias = parseInt(this.cultivoD.plant.dias_germinacao) +parseInt(this.cultivoD.plant.dias_transplantacao) +parseInt(this.cultivoD.plant.dias_crescimento); 
			
			var dataFim= new Date();

			 dataFim.setDate(dateInit.getDate() + totalCultivoDias);
			//se não for semeada ir buscar só dias de transplantação e os de crescimento

			this.chartData.push(['cultivo',dateInit,dataFim]);

			//if semeado get dias germinação if fim_germinação ainda não existir


// a1 = [1,2,3,4,5];
// a2 = [21,22];

// newArray - a1.insertAt(2,a2) -> [1,2, 21,22, 3,4,5];

		}			 

		},
	   computed: {
		  user(){
 
			 // return this.$store.getters.currentUser
		  }
	   },
	   mounted() {
		  //this.currentUser = this.$store.getters.currentUser;
		  this.currentUser = JSON.parse(localStorage.getItem("user"));

		  this.cultivoD = this.$props.cultivo;  
		  console.log("prop cultivo : "+JSON.stringify(this.$props.cultivo));

		  this.criarData();

		  console.log('Component TimeLine mounted.')
	   },
    }
</script>

<style scoped lang="scss">
	@import url("https://fonts.googleapis.com/css?family=Roboto:100,400,700");
body,
html {
	font-family: "Roboto", sans-serif;
	background-color: #cddade;
	height: 100%;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}
.header {
	color: #202125;
	margin-bottom: 40px;
	h2 {
		font-weight: 600;
	}
	p {
		font-weight: 300;
	}
}
$red: #ff6252;

.wrapper {
	max-width: 1200px;
	min-width: 700px;
	margin: 0 auto;
	padding: 40px;
}
.gantt {
	display: grid;
	border: 0;
	border-radius: 12px;
	position: relative;
	overflow: hidden;
	box-sizing: border-box;
	box-shadow: 0 75px 125px -57px #7e8f94;
	
	&__row {
		display: grid;
		grid-template-columns: 150px 1fr;
		background-color: #fff;
		&:nth-child(odd) {
			background-color: #f5f5f5;
			.gantt__row-first {
				background-color: #f5f5f5;
			}
		}
		&:nth-child(3) {
			.gantt__row-bars {
				border-top: 0;
			}
			.gantt__row-first {
				border-top: 0;
			}
		}
		&--empty {
			background-color: lighten($red, 25%) !important;
			z-index: 1;
			.gantt__row-first {
				border-width: 1px 1px 0 0;
			}
		}
		&--lines {
			position: absolute;
			height: 100%;
			width: 100%;
			background-color: transparent;
			grid-template-columns: 150px repeat(12, 1fr);
			span {
				display: block;
				border-right: 1px solid rgba(0, 0, 0, 0.1);
				&.marker {
					background-color: rgba(10, 52, 68, 0.13);
					z-index: 2;
				}
			}
			&:after {
				grid-row: 1;
				grid-column: 0;
				background-color: #1688b345;
				z-index: 2;
				height: 100%;
			}
		}
		&--months {
			color: #fff;
			background-color: #0a3444 !important;
			border-bottom: 1px solid rgba(0, 0, 0, 0.1);
			grid-template-columns: 150px repeat(12, 1fr);
			.gantt__row-first {
				border-top: 0 !important;
			  background-color: #0a3444 !important;
			}
			span {
				text-align: center;
				font-size: 13px;
				align-self: center;
				font-weight: bold;
				padding: 20px 0;
			}
		}
		&-first {
			background-color: #fff;
			border-width: 1px 0 0 0;
			border-color: rgba(0, 0, 0, 0.1);
			border-style: solid;
			padding: 15px 0;
			font-size: 13px;
			font-weight: bold;
			text-align: center;
		}
		&-bars {
			list-style: none;
			display: grid;
			padding: 9px 0;
			margin: 0;
			grid-template-columns: repeat(12, 1fr);
			grid-gap: 8px 0;
			border-top: 1px solid rgba(221, 221, 221, 0.8);
			li {
				font-weight: 500;
				text-align: left;
				font-size: 14px;
				min-height: 15px;
				background-color: #55de84;
				padding: 5px 12px;
				color: #fff;
				overflow: hidden;
				position: relative;
				cursor: pointer;
				border-radius: 20px;
				
				&.stripes {
					background-image: repeating-linear-gradient(45deg, transparent, transparent 5px, rgba(255,255,255,.1) 5px, rgba(255,255,255,.1) 12px);
				}
				
				&:before,
				&:after {
					content: "";
					height: 100%;
					top: 0;
					z-index: 4;
					position: absolute;
					background-color: rgba(0, 0, 0, 0.3);
				}
				&:before {
					left: 0;
				}
				&:after {
					right: 0;
				}
			}
		}
	}
}

</style>