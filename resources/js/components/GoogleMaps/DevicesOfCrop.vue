<template>
  <div>
    <!-- add terrain -->
        <div id="myMap"  ref="myMap" style=" height: 60vh" ></div>
        <!-- <template v-if="!!this.google && !!this.map">
                <slot
                  :google="google"
                  :map="map"
                />
          
        </template> -->
      
 
     </div>

  </div>

</template>

<script>
import GoogleMapsApiLoader from 'google-maps-api-loader'
// import MapProvider from './MapProvider.vue'
// import ChildMarker from './ChildMarker.vue'

export default { 
  props:{
    google: Object,
    // mapConfig: Object,  
    // apiKey: String,
    // mapIsFor: String,
    // terrainCoords: JSON,
    // userTerrains: Array,
    // terrainToAddDevice: Object,
    // credentials: Object,
    // markers:Array,
    devices: Array,
  },
   components: {
     // MapProvider,ChildMarker
   },
  data(){
    return { 
      // google: null,
      map: null,
      mapConfig: null,
      mapContainer: null,
      drawingManager: null,
      selectedShape: null,
      colors: ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'],
      selectedColor: null,
      colorButtons: {},
      all_overlays: [],
      polygons: [],
      selectedShape: '',
      selectedterrain: [],
      msgPost:{
        lat: null,
        lng: null,
        mac: null,
      },
      marker:null,
      markerAux: [],
      circlesAux: [],
      // selectedDevice: null,
    }
  },
  
  async mounted () { // point 3
    // const googleMapApi = await GoogleMapsApiLoader({
    //   apiKey: "AIzaSyDGqrxG_MOLgoZ3mA9ZZQrRMRQe_k5QOPo"
    // });
    // this.google = googleMapApi;
    await this.initializeMap();
    
    console.log('Component MapLoader markers mounted.');
    
    
   // console.log(this.userTerrains);
  },
  methods: {
   
     initializeMap (){

let vm = this;

this.mapContainer = this.$refs.myMap;

 this.mapConfig = {
                  // zoom: 15,
                  //center: new google.maps.LatLng(-34.397, 150.644),
                   // center: { lat: 39.7576232, lng: -8.7914497 },
                  mapTypeId: 'satellite',
                  streetViewControl: false,
              };

        console.log("initializeMap for add device to terrain marker");

              //this.mapContainer = this.$el.querySelector('#map'); // point 1
        this.map = new this.google.maps.Map(this.mapContainer, this.mapConfig);
      
console.log("2");

        this.drawingManager =  new this.google.maps.drawing.DrawingManager({
              // drawingMode: google.maps.drawing.OverlayType.MARKER,
              drawingControl: false,
              drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [
                  // google.maps.drawing.OverlayType.MARKER,
                
                ]
              },
              markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
               draggable: false},
              polygonOptions: {
                fillColor: '#ffff00',
                fillOpacity: 0.45,
                strokeWeight: 1,
                clickable: false,
                editable: true,
                zIndex: 1
              },
              map: this.map
               
            });
  
// console.log("MapLoaderMarkers drawingManager: "+ JSON.stringify(this.drawingManager));

 console.log("this.devices : "+ JSON.stringify(this.devices));

for (var i =0; i < this.devices.length ; i++) {
  
  console.log("this.devices2 : "+ JSON.stringify(this.devices));

  var myLatLng = {lat: parseFloat(this.devices[i].lat), lng: parseFloat(this.devices[i].lng)};

  var c = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 1,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: this.map,
            center: myLatLng,//citymap[city].center,
            radius: 20 //meters
          });

 var c2 = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.3,
            //strokeWeight: 1,
            fillColor: '#FF0000',
            fillOpacity: 0.25,
            map: this.map,
            center: myLatLng,//citymap[city].center,
            radius: 30 //meters
          });

  var m = new this.google.maps.Marker({
      position: myLatLng,
      map: this.map,
      title: 'Hello World!',
      device: this.devices[i],
    })

  // m.addListener("click", (d) => {
  //   console.log("click d :"+JSON.stringify(this.devices[i]) )
  //   console.log("click d :"+JSON.stringify(d) )
  //   this.$emit('selectDevice',d.device)

  // });

     /*
   * Create a new infowindow object
   */
   var infowindow = new google.maps.InfoWindow({
      content: "The first marker"
   });

   // Attach it to the marker we've just added
   this.google.maps.event.addListener(m, 'click', function() {
     console.log("click d :"+JSON.stringify(m.device) )
      infowindow.open(this.map,m);
       vm.$emit('selectDevice',m.device)
   });


    console.log("aqui");
    this.markerAux.push(m);  
    console.log("aqui");
    this.circlesAux.push(c);
    this.circlesAux.push(c2);  
}

console.log("here");
this.bounds = new google.maps.LatLngBounds();
for (var t = 0; t < this.markerAux.length; t++) {
  this.bounds.extend(this.markerAux[t].getPosition());
}

//console.log("5");
this.map.fitBounds( this.bounds);
//console.log("6");
this.map.panToBounds( this.bounds);

//     google.maps.event.addListener(drawingManager, 'markercomplete', function(marker) {
//    // placeMarkerAndPanTo(e.latLng, map);
//     console.log("Markers add");
//     console.log(marker);

//     console.log("lat");
//     console.log(marker.getPosition().lat().toFixed(4) );
//     vm.msgPost.lat = marker.getPosition().lat().toFixed(4);
//     console.log("lng");
//     console.log(marker.getPosition().lng().toFixed(4) );
//     vm.msgPost.lng = marker.getPosition().lng().toFixed(4);

// console.log("Credentials");
//     console.log(JSON.stringify(vm.credentials));

//     vm.msgPost.mac = vm.credentials.mac;
//     vm.updateDevice();
//   });

  

},


}
}

</script>

<style scoped>
#map {
  height: 65vh;
  width: 100%;
}
</style>