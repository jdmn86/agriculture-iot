<template>

<div id="map" ref="googleMap"  class="card-block" style=" height: 90vh" ></div>

</template>

<script>  
import GoogleMapsApiLoader from 'google-maps-api-loader'

export default {
 props:{
   t: Object,
   terrains: Array,//{type: Array,required: true}, 
   google:Object, 
  },
  components: {
 },
 data(){
  return { 
      // google: null,
      map: null,
      mapConfig:null,
      mapContainer: null,
      drawingManager: null,
      selectedShape: null,
      colors: ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'],
      selectedColor: null,
      colorButtons: {},
      all_overlays: [],
      polygons: [],
      selectedShape: '',
      center: null,   

      farmTerrains: null,
      terrainEdit:null,

      newTerrain: [],
   }
},
watch: {
  
        terrains: function(val) { // watch it
           console.log("terrains watch value :" + JSON.stringify(val));
         // if(val!=this.farmTerrains){
            this.farmTerrains=val;
            this.initializeMap();
          // }

      },

     },
     async mounted () { 

      this.farmTerrains = this.$props.terrains;
      this.terrainEdit = this.$props.t;
       this.initializeMap();

       console.log('Component MapLoader mounted.');

    },
    methods: {
       sendTerrainParent(){
        console.log('Emitting newTerrain'+JSON.stringify(this.newTerrain));
        this.$emit('updateTerrainCords',this.newTerrain)
     },

     initializeMap (){

           let vm = this;

            this.mapContainer = this.$refs.googleMap;
            this.mapConfig =  {
                     zoom: 18,
                     //center: new google.maps.LatLng(-34.397, 150.644),
                     center: null,
                     mapTypeId: 'satellite',
                     streetViewControl: false,
                  };

            this.map = new this.google.maps.Map(this.mapContainer, this.mapConfig);


            const drawingManager = new google.maps.drawing.DrawingManager({
                   // drawingMode: google.maps.drawing.OverlayType.MARKER,
                   drawingControl: false,
                   drawingControlOptions: {
                                 position: google.maps.ControlPosition.TOP_CENTER,
                                 drawingModes: [
                                       // google.maps.drawing.OverlayType.MARKER,
                                         // google.maps.drawing.OverlayType.CIRCLE,
                                       google.maps.drawing.OverlayType.POLYGON,
                                       ]
                                 },
                    markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png',
                    draggable: true},
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

         function CenterControl(controlDiv, map) {

                 // Set CSS for the control border.
                 var controlUIarea = document.createElement('div');
                 controlUIarea.style.backgroundColor = '#fff';
                 controlUIarea.style.border = '2px solid #fff';
                 controlUIarea.style.borderRadius = '3px';
                 controlUIarea.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
                 controlUIarea.style.cursor = 'pointer';
                 controlUIarea.style.marginBottom = '22px';
                 controlUIarea.style.textAlign = 'center';
                 controlUIarea.title = 'Click to add region to the map';

                 controlUIarea.classList.add("column");        

                 controlDiv.appendChild(controlUIarea);

                 // Set CSS for the control interior.
                 var controlTextarea = document.createElement('div');
                 controlTextarea.style.color = 'rgb(25,25,25)';
                 controlTextarea.style.fontFamily = 'Roboto,Arial,sans-serif';
                 controlTextarea.style.fontSize = '16px';
                 controlTextarea.style.lineHeight = '38px';
                 controlTextarea.style.paddingLeft = '5px';
                 controlTextarea.style.paddingRight = '5px';
                 controlTextarea.innerHTML = 'Select region';
                 controlUIarea.appendChild(controlTextarea);


                 // Setup the click event listeners: simply set the map to Chicago.
               controlUIarea.addEventListener('click', function() {
               
                     drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON);
               
               });


                 google.maps.event.addListener(drawingManager, 'polygoncomplete', function (polygon) {
                          //document.getElementById('info').innerHTML += "<b>polygon points:<b>" + "<br><br>";
                         
                          var coords = "{";

                          for (var i = 0; i < polygon.getPath().getLength(); i++) {
                              //document.getElementById('info').innerHTML += "" + polygon.getPath().getAt(i).toUrlValue(6) + ";";
                              if(i == polygon.getPath().getLength() - 1){
                               coords += "" + polygon.getPath().getAt(i).toUrlValue(6) ; 
                            }else{
                               coords += "" + polygon.getPath().getAt(i).toUrlValue(6) + ";"; 
                            }

                         }
                         coords += "}";

                         drawingManager.setDrawingMode(null);

                         vm.newTerrain[0] = JSON.stringify(polygon.getPath().getArray());
                         vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(polygon.getPath())).toFixed(2);

                         vm.sendTerrainParent();

         //                 google.maps.event.addListener(polygon.getPath(), 'set_at', function(index, obj) {
         //                     document.getElementById('info').innerHTML += "<b>polygon points:<b>" + "<br><br>";
         // console.log("set_at");
         //                     for (var i = 0; i < polygon.getPath().getLength(); i++) {
         //                         document.getElementById('info').innerHTML += "" + polygon.getPath().getAt(i).toUrlValue(6) + ";";
         //                      }

         //                      vm.newTerrain[1] = google.maps.geometry.spherical.computeArea(polygon.getPath());
                         
         //                   });
                                    
                        
         //                google.maps.event.addListener(polygon.getPath(), 'insert_at', function(index, obj) {
         //                    document.getElementById('info').innerHTML += "<b>polygon points:<b>" + "<br><br>";
         //      console.log("insert_at");
         //                    for (var i = 0; i < polygon.getPath().getLength(); i++) {
         //                        document.getElementById('info').innerHTML += "" + polygon.getPath().getAt(i).toUrlValue(6) + ";";
         //                     }

         //                   vm.newTerrain[1] = google.maps.geometry.spherical.computeArea(polygon.getPath());
                         
         //                });
                           

         //                google.maps.event.addListener(polygon.getPath(), "remove_at", function(index, obj) {
         //                      document.getElementById('info').innerHTML += "<b>polygon points:<b>" + "<br><br>";
         // console.log("remove_at");
         //                      for (var i = 0; i < polygon.getPath().getLength(); i++) {
         //                             document.getElementById('info').innerHTML += "" + polygon.getPath().getAt(i).toUrlValue(6) + ";";
         //                       }

         //                     vm.newTerrain[1] = google.maps.geometry.spherical.computeArea(polygon.getPath());
                      
         //                });

                });

             var controlUIserver = document.createElement('div');
             controlUIserver.style.backgroundColor = '#fff';
             controlUIserver.style.border = '2px solid #fff';
             controlUIserver.style.borderRadius = '3px';
             controlUIserver.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
             controlUIserver.style.cursor = 'pointer';
             controlUIserver.style.marginBottom = '22px';
             controlUIserver.style.textAlign = 'center';
             controlUIserver.title = 'Click to clear selection';

             controlUIserver.classList.add("column");        

             controlDiv.appendChild(controlUIserver);

              // Set CSS for the control interior.
              var controlTextserver = document.createElement('div');
              controlTextserver.style.color = 'rgb(25,25,25)';
              controlTextserver.style.fontFamily = 'Roboto,Arial,sans-serif';
              controlTextserver.style.fontSize = '16px';
              controlTextserver.style.lineHeight = '38px';
              controlTextserver.style.paddingLeft = '5px';
              controlTextserver.style.paddingRight = '5px';
              controlTextserver.innerHTML = 'CLEAR';
              controlUIserver.appendChild(controlTextserver);

              // Setup the click event listeners: simply set the map to Chicago.
              controlUIserver.addEventListener('click', function() {
                  console.log("click event to clear select");
                  console.log(vm.newTerrain);

                  if(vm.newTerrain[1] ){

                     vm.newTerrain[1].setMap(null);  ///alter
                    vm.newTerrain=null;
                  }

               });

        }

         var centerControlDiv = document.createElement('div');
         var centerControl = new CenterControl(centerControlDiv, map);

         centerControlDiv.index = 1;
         centerControlDiv.classList.add("row");

         this.map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(centerControlDiv);
         drawingManager.setDrawingMode(null);

         drawingManager.setMap(this.map);

         this.HandleTerrains(vm);


      },
      HandleTerrains(vm){

        this.bounds = new google.maps.LatLngBounds();

         if(this.farmTerrains && this.farmTerrains.length>0){
            console.log("with terrains");
             var polygon = null;



             let i = 0;
              console.log("this.farmTerrains :"+this.farmTerrains.length);
              this.farmTerrains.forEach(function(entry) {

                console.log("entry : "+JSON.stringify(entry));
               
                
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

               //Cores
                i++;
                if(i==5){
                  i=0;
                }

                var te = JSON.parse(entry.coords); 

                te.forEach(function(p) {          
                     vm.bounds.extend(p);          
                });
               vm.polygon.setMap(vm.map);

            });

          

           
         }else{
            console.log("without terrains");

            this.$getLocation({})
               .then(position => {
                  console.log("coordinates : "+ JSON.stringify(position));
                  const pos = {
                          lat: position.lat,
                          lng: position.lng,
                       };
                  console.log("geolocation is available 2 pos : "+pos);

                  this.map.setCenter(new google.maps.LatLng(position.lat, position.lng));

               })
               .catch(error => {
                       console.log("error : "+ error);
                       this.map.setCenter(new google.maps.LatLng(38.69220528975787, -9.170523631067772)); 
                   });

         }

this.handleTerrainEdit(vm);

          this.map.fitBounds( this.bounds);

          this.map.panToBounds( this.bounds);

      },
      handleTerrainEdit(vm){
         // console.log("entry : "+JSON.stringify(entry));
                  console.log("this.terrainEdit : "+JSON.stringify(vm.terrainEdit));
                    vm.polygon = new google.maps.Polygon({
                                      fillColor: vm.colors[0],
                                      fillOpacity: 0.4,
                                      strokeWeight: 2,
                                      strokeColor: vm.colors[0],
                                      editable: true,
                                      draggable: false,
                                      paths:  JSON.parse(vm.terrainEdit.coords),
                                      //map: vm.map
                                      terrain: vm.terrainEdit,

                                    });


google.maps.event.addListener(vm.polygon.getPath(), 'set_at', function() {
        // console.log(bermudaTriangle.getPath());

        console.log("set_at 1");//done

        vm.newTerrain[0] = JSON.stringify(vm.polygon.getPath().getArray());
       vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(vm.polygon.getPath())).toFixed(2);

       vm.sendTerrainParent();
    });
                    vm.polygon.getPaths().forEach(function(path, index){

                            google.maps.event.addListener(path, 'insert_at', function(){

                              console.log("insert_at");//done

                               vm.newTerrain[0] = JSON.stringify(vm.polygon.getPath().getArray());
                               vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(vm.polygon.getPath())).toFixed(2);

                               vm.sendTerrainParent();
                            });

                            google.maps.event.addListener(path, 'remove_at', function(){

                              console.log("remove_at");

                               vm.newTerrain[0] = JSON.stringify(vm.polygon.getPath().getArray());
                               vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(vm.polygon.getPath())).toFixed(2);

                               vm.sendTerrainParent();
                            });

                            google.maps.event.addListener(path, 'set_at', function(){

                              console.log("set_at 2");//done

                               vm.newTerrain[0] = JSON.stringify(vm.polygon.getPath().getArray());
                               vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(vm.polygon.getPath())).toFixed(2);

                               vm.sendTerrainParent();
                            });

        });


                    google.maps.event.addListener(vm.polygon, 'click', function () {
                        
                         google.maps.event.addListener(vm.polygon.getPath(), 'set_at', function(index, obj) {

                          console.log("set_at 3");

                             document.getElementById('info').innerHTML += "<b>polygon points:<b>" + "<br><br>";         
                             for (var i = 0; i < vm.polygon.getPath().getLength(); i++) {
                                 document.getElementById('info').innerHTML += "" + vm.polygon.getPath().getAt(i).toUrlValue(6) + ";";
                              }

                              vm.newTerrain[1] = google.maps.geometry.spherical.computeArea(vm.polygon.getPath());
                         
                           });

                         vm.drawingManager.setDrawingMode(null);

                         vm.newTerrain[0] = JSON.stringify(vm.polygon.getPath().getArray());
                         vm.newTerrain[1] = (google.maps.geometry.spherical.computeArea(vm.polygon.getPath())).toFixed(2);

                         vm.sendTerrainParent();
                    });


            vm.polygon.setMap(vm.map);
      }

   }
}

</script>

<style scoped>
#map {
 height: 80vh;
 width: 100%;
}
</style>