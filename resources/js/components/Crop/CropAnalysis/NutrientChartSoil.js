export const planetChartData = {
  type: 'bar',
  data: {
    labels: ['nitrogen','nitrogen1','nitrogen2','nitrogen3','nitrogen4','nitrogen5','nitrogen5'],
    datasets: [
      { // one line graph
        label: 'datasets 1',
        // barPercentage: 0.5,
        // barThickness: 6,
        // maxBarThickness: 8,
        // minBarLength: 2,
        data: [ 70,125,170,250,320,400,590],//5
        // yAxisID: 'nitrogen-value',
      },
   
      
    ]
  },
  options: {
      scales: {
           yAxes: [{
            // min: 0,
            // max: 600,
              // display: true,
              // scaleLabel: {
              //   show: true
              // },
              // gridLines:{
              //   color:"#ecedef"
              // },

              ticks: {
                beginAtZero:true,
                //stepSize: 10,//120,
                 //autoSkip: true,
                // min: 0,
               // max: 600,
                 // crossAlign: 'far',
                fontColor:"#8f9092", 
                    //steps: 6, /* total/4 shows 0, 25%, 50%, 75%, 100% */             
                    callback: function(value, index, values) {


                      //var v = ((value / 600) * 100) ;
                      console.log("value : " + value);

                      if(value === 600){
                        console.log("VH")
                        return "VH";
                      }else if(value === 350){
                        console.log("H")
                        return "H";
                      }else if(value === 210){
                        console.log("M")
                        return "M";
                      }else if(value === 150){
                        console.log("L")
                        return "L";
                      }else if(value === 100){
                        console.log("VL")
                        return "VL";
                      }else {
                        console.log("else")
                        return "";
                      }

                      
                        
                    }             
                // callback:function(value) { 

                //     if(value < 75){
                //       return "V.L."
                //     }
                //     if(value > 75 && value < 150){
                //       return "L."
                //     }
                //     if(value > 150 && value < 210){
                //       return "M."
                //     }
                //     if(value > 210 && value < 300){
                //       return "H."
                //     }
                //     else{
                //       return "V.H.";  
                //     }
                    
                    
                  
          
                // }
              },
                // afterBuildTicks: function(scale) {
                //   scale.ticks = ticks;
                //   return;
                // },
                // beforeUpdate: function(oScale) {
                //   return;
                // }
            }]
        }
        // scales: {
        //     xAxes: [{
        //         ticks: {
        //             autoSkip: false,
        //             maxRotation: 90,
        //             minRotation: 90
        //         }
        //     }]
        // }
 
  }
}

export default planetChartData;

