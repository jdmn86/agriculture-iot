<script>
  import { Line } from 'vue-chartjs'
  export default {
    extends: Line,
    props: {
      chartData: {
        type: Array | Object,
        required: false
      },
      chartLabels: {
        type: Array,
        required: true
      }
    },
    data () { 
      return {
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              },
              gridLines: {
                display: true 
              }
            }],
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
          maintainAspectRatio: false
        }
      }
    },
    mounted () {
      console.log("mount labels");
      console.log(this.chartLabels);
      console.log("mount datasets");
      console.log(this.chartData);

      this.renderChart({
        labels: this.chartLabels,
        datasets: this.chartData
      }, this.options)
    }
  }
</script>