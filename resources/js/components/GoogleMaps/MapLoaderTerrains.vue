<template >
  	

    <!-- <div  v-if="terrains && google"  >  -->
 
 
		  <div style=" height: 72vh" id="map" ref="googleMap" >
        
			
		</div>   
    

	<!-- </div>  -->
	

</template> 
 
<script>

import GoogleMapsApiLoader from 'google-maps-api-loader'
// import MapProvider from './MapProvider.vue'

import {mapGetters,mapMutations,mapActions} from 'vuex'

export default {
  name: 'MapLoaderTerrains',
  props:{
    terrains: Array,//{type: Array,required: true}, 
    google:Object,
     
  },
   components: {
     
   },
  data(){
    return {
     // cgoogle: null,
     // cterrain: null,
      map: null,
      mapContainer: null,
      mapConfig:null,
      drawingManager: null,
      bounds: null,
      colors: ['#745220','#9c362b','#4AAD37','#374aad','#e6e600'],
      center: null,      
    }
  },
  watch: { 
        terrains: function(newVal, oldVal) { // watch it
          this.initializeMap();
        }
      },
  async mounted () { // point 3
  

    this.initializeMap();  
 	  

  },
  computed:{
  		...mapGetters(['getTerrainsByFarm','FARM_SELECTED','getTerrains']),

  },
  methods: {
    ...mapMutations(['SELECTTERRAIN']),
   // ...mapActions(['']),

    initializeMap (){

console.log("MAP will be initializeMap");

let vm = this;

    
      this.mapContainer = this.$refs.googleMap;
     

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
                    zoom: 13,
                    center: null,
                };

var addListenersOnPolygon = function(polygon) {
  google.maps.event.addListener(polygon, 'click', function (event) {
   //limpa todos os outros polygons 

   //mete cor opaca do selecionado
    vm.SELECTTERRAIN(polygon.terrain);
  });  
}


              this.map =  new this.google.maps.Map(this.mapContainer, this.mapConfig);
                  

                   this.drawingManager =  new google.maps.drawing.DrawingManager({
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
           
           //for     

if(this.$props.terrains.length>0){

  var polygon = null;

  this.bounds = new google.maps.LatLngBounds();

  let i = 0;
    this.$props.terrains.forEach(function(entry) {

  console.log("1 - i : " + vm.colors[0]);

        vm.polygon = new google.maps.Polygon({
            fillColor: vm.colors[i],
            fillOpacity: 0.4,
            strokeWeight: 2,
            strokeColor: vm.colors[i],
            editable: false,
            draggable: false,
            paths:  JSON.parse(entry.coords),
            //map: vm.map
            terrain: entry,
          });

    console.log("2 - i :" + i);
    i++;
    console.log("3 - i :" + i);
    if(i==5){
      i=0;
    }



    



   //console.log("vm.polygon : " + JSON.stringify(vm.polygon));
        
  console.log("1");
        // for (var t = 0; t < this.c.length; t++) {
     //     console.log("polygon.paths :" + JSON.stringify(vm.polygon.paths));

  // console.log("entry.coords : " + JSON.stringify(JSON.parse(entry.coords)));
  var te = JSON.parse(entry.coords); 

      te.forEach(function(p) {
          // this.bounds.extend(this.c[t]);
          vm.bounds.extend(p);
          //console.log("2");
        // }
        });
  // console.log("3");
      vm.polygon.setMap(vm.map);
  addListenersOnPolygon(vm.polygon);
      // console.log("4");
    });




  this.map.fitBounds( this.bounds);

  this.map.panToBounds( this.bounds);
}else{
  console.log("without terrains");

    this.$getLocation({})
      .then(position => {
        // this.center = coordinates;
        console.log("coordinates : "+ JSON.stringify(position));
        //  this.map.setCenter(this.center, 10);
         const pos = {
            lat: position.lat,
            lng: position.lng,
          };
          console.log("geolocation is available 2 pos : "+pos);
          // this.$refs.googleMap.setPosition(pos);
          // this.$refs.googleMap.setContent("Location found.");
          // this.$refs.googleMap.open(this.map);
          this.map.setCenter(new google.maps.LatLng(position.lat, position.lng));
          
         
      })
      .catch(error => console.log("error : "+ error));
    
      //  navigator.geolocation.getCurrentPosition(
      //   position => {
      //     const pos = {
      //       lat: position.coords.latitude,
      //       lng: position.coords.longitude,
      //     };
      //     console.log("geolocation is available 2");
      //     this.$refs.googleMap.setPosition(pos);
      //     this.$refs.googleMap.setContent("Location found.");
      //     this.$refs.googleMap.open(this.map);
      //     this.map.setCenter(pos);
      //   },
      //   () => {
      //     console.log("error 1");
      //   }
      // );


 
   
}


      
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

<!-- USING -->