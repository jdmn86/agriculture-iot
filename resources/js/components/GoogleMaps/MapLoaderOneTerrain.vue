<template >
  	
    <div style=" height: 35vh" id="myMap" ref="myMap" >
		
	</div> 
	

</template>

<script> 
import GoogleMapsApiLoader from 'google-maps-api-loader'
 
export default { 
  props:{
    terrain: Object, 
    google:Object,
    items: Array,
     
  }, 
   components: {
     
   },
  data(){
    return {      
      map: null,
      mapContainer: null,
      mapConfig:null,
      drawingManager: null,
      bounds: null,

    }
  },
  
  async mounted () { // point 3
  
 	await this.initializeMap();

  },
  computed:{
  		
  },
  methods: {
    // select: function(event) {
    //         //targetId = event.currentTarget.id;

    //   //      console.log("selected");
    //   //      console.log(event); // returns 'foo'
    //     },

    async initializeMap (){

let vm = this;


      this.mapContainer = this.$refs.myMap;//this.$el.map;//querySelector('#map'); 
       //       console.log("mapcontaner");
       //       console.log(this.mapContainer);


 this.mapConfig =  {
                  mapTypeId: 'satellite',
                  scrollwheel: false,
                  navigationControl: false,
                  mapTypeControl: false,
                  scaleControl: false,
                  draggable: false,
                  clickableIcons: false,
                  disableDefaultUI: false,    
                  panControl: false,
                  streetViewControl: false,
                };



              this.map =  new this.google.maps.Map(this.mapContainer, this.mapConfig);
                  

                   this.drawingManager =  new this.google.maps.drawing.DrawingManager({
                          //drawingMode: google.maps.drawing.OverlayType.POLYGON,
                          drawingControl: false,
                          markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                           draggable: false},
                          polygonOptions: {
                            fillColor: '#4AAD37',
                            fillOpacity: 0.4,
                            strokeWeight: 2,
                            strokeColor: '#4AAD37',
                            editable: false,
                            draggable: false,
                            zIndex: 1
                          },
                          map: this.map
                           
                        });
    
                //this.drawingManager.setMap(this.map);
/*
console.log("userTerrains");
console.log(this.terrain);
console.log("map");
console.log(this.map);
console.log("parse coords"); */
var c = [];
this.c = JSON.parse(this.terrain.coords);
//console.log(c);
            this.polygon = new google.maps.Polygon({
              fillColor: '#4AAD37',
              fillOpacity: 0.4,
              strokeWeight: 2,
              strokeColor: '#4AAD37',
              editable: false,
              draggable: false,
              paths:  this.c,
              map: this.map,
              zIndex: 1
            });

       //     console.log("2");



this.bounds = new google.maps.LatLngBounds();
for (var t = 0; t < this.c.length; t++) {
  this.bounds.extend(this.c[t]);
}
/*
console.log("bounds");
console.log(this.bounds);

console.log("3"); */
        this.polygon.setMap(this.map);
//console.log("4");



//console.log("5");
this.map.fitBounds( this.bounds);
//console.log("6");
this.map.panToBounds( this.bounds);



      
},


}
}

</script> 

<style scoped>
/*#map {
  height: 80vh;
  width: 100%;
}*/
/*.testimonial-group > .row{
  overflow-x: auto;
  white-space: nowrap;
}
.testimonial-group > .row > .col-sm-4{
  display: inline-block;
  float: none;
}
.card-block {
    min-height: 350px;
}*/
.test {
  padding: 5px; 
  position: relative;
    display: block;
    overflow-y: auto;
    overflow-x: hidden;
}

hr.style-one {
    border: 0;
    height: 2px;
    background: #333;
    background-image: linear-gradient(to right, #ccc, #333, #ccc);
}

</style>