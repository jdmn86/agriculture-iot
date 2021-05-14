<script>
  import { Line , Bar ,mixins} from 'vue-chartjs'
  const { reactiveProp } = mixins
import 'chartjs-plugin-annotation';

  export default {
    extends: Line,Bar,
    mixins: [reactiveProp],
    // props: [ "chartData","soilLast","plant"],
    props: ['chartData','capacidade_campo','PMPcultural'],
    data () { 
      return {

           options: {
            backgroundRules: [{
                        backgroundColor: 'rgba(255,0,0,0.8)', 
                        yAxisSegement: 3,
                    }, {
                        backgroundColor: 'transparent',
                        yAxisSegement: 5,
                    }, {
                        backgroundColor: 'rgba(0,0,255,0.8)',
                        yAxisSegement: Infinity
                    }],

          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: -1
              },
               
              gridLines: {
                display: false 
              }
            }, {
                id: 'evpt-value',
                display: false,
                stacked: false,
                scaleLabel: {
                  display: false,
                  labelString: 'evpt_value Amount'
                },
                ticks: {
                  beginAtZero: true,
                }
              },
               {
                id: 'precipitation-value',
                display: false,
                stacked: false,
                scaleLabel: {
                  display: false,
                  labelString: 'precipitation_value Amount'
                },
                ticks: {
                  beginAtZero: true,
                }
              }
            ],
            xAxes: [ {
              gridLines: {
                display: false 
              }
            }]
          }, 
          legend: {
            display: false
          },
          responsive: true,
          maintainAspectRatio: false,
          annotation: {
              annotations: [{
                type: 'line',
                mode: 'horizontal',
                scaleID: 'y-axis-0',
                value: 8,
                borderColor: 'rgb(0, 0, 0)',
                borderWidth: 0,//5
                label: {
                  enabled: true,
                  content: 'Test label'
                }
              }],
              drawTime: "afterDraw",
            }

        },
      
        
      }
    },
     watch: {
    // chartData: function() {
    //     console.log("watch chart");
    //   this._chart.destroy();
    //   //this.renderChart(this.data, this.options);
    //   this.renderChart(this.chartData, this.options);
    // }
  },
    // watch: {
    //   chartData: {
    //         handler: function(newValue) {
    //            console.log("watch chart");
    //          this.$data._chart.update()
    //          // this.renderChart(newValue, this.options);
    //         },
    //         deep: true
    //     }
    
    // },
    mounted () {

      console.log("start mounting chart")

        this.addPlugin({
        id: 'my-plugin',
        beforeDraw: function (chart) {
            var ctx = chart.chart.ctx;
            var ruleIndex = 0;
            var rules = chart.chart.options.backgroundRules;

            var yaxis = chart.chart.scales["y-axis-0"];
            var xaxis = chart.chart.scales["x-axis-0"];
            var partPercentage = 1 / (yaxis.ticksAsNumbers.length - 1); 
            
            for (var i = yaxis.ticksAsNumbers.length - 1; i > 0; i--) { //10
                
                if (yaxis.ticksAsNumbers[i] < rules[ruleIndex].yAxisSegement) {

                    ctx.fillStyle = rules[ruleIndex].backgroundColor;
                    ctx.fillRect(xaxis.left, yaxis.top + ((i - 1) * (yaxis.height * partPercentage)), xaxis.width, yaxis.height * partPercentage);
                } else {

                        ruleIndex++;    
      
                    i++;
                }
            }
        }
      })


// var DTA=this.$props.soilLast.capacidade_emurchecimento - this.$props.soilLast.capacidade_campo;

// var CAD = DTA * this.$props.plant.fracao_esgotamento_agua_solo_conforto_hidrico;

// var diff = DTA - CAD;

// var PMPcultural = this.$props.soilLast.capacidade_emurchecimento + diff;

    this.options.backgroundRules[0].yAxisSegement = this.PMPcultural;

    this.options.backgroundRules[1].yAxisSegement = this.capacidade_campo;

       this.renderChart(this.chartData, this.options)
     }
  }
</script>