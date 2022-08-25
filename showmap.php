
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <style>
      .map {
        height: 550px;
        width: 100%;
      }

    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
  </head>
  <body>
    <div id="map" class="map" ondblclick=(showtoilet()) ></div>
    <div id="marker" title="Marker"></div>  



<script type="text/javascript">
      var kathmandu =  ol.proj.fromLonLat([ 85.3220, 27.7000]); //long , lat
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center:kathmandu,
          zoom: 13
        })
      });
      
      
      
      var layer = new ol.layer.Vector({
        source: new ol.source.Vector({
          features: [
            new ol.Feature({
                 geometry: new ol.geom.Point(ol.proj.fromLonLat([85.332661 , 27.703849]))

                })
              ]
     })
    });
    
    map.addLayer(layer);
    
    
    
  // var marker_el = document.getElementById('marker');
  // var marker = new ol.Overlay({
  //   position: pos,
  //   positioning: 'center-center',
  //   element: marker_el,
  //   stopEvent: false,
  //   dragging: false
  // });
  // map.addOverlay(marker);
  
  // // popup
  // var popup = new ol.Overlay.Popup();
  
  
  // // drag action
  // var dragPan;
  // map.getInteractions().forEach(function(interaction){
  // 	if (interaction instanceof ol.interaction.DragPan) {
  // 		dragPan = interaction;  
  //   }
  // });
  
  // var latlng = [16.3725, 48.208889];
  // popup.show(pos,'Latitude :'+ latlng[0]+', Longitude :'+ latlng[1]);
  // map.addOverlay(popup);
  
  // // drag pin
  // marker_el.addEventListener('mousedown', function(evt) {
  //   dragPan.setActive(false);
  //   marker.set('dragging', true);
  //   console.info('start dragging');
  // });
  
  // map.on('pointermove', function(evt) {
  // 	if (marker.get('dragging') === true) {
  //   	marker.setPosition(evt.coordinate);
  //   }
  // });
  
  // map.on('pointerup', function(evt) {
  // 	if (marker.get('dragging') === true) {
  //     console.info('stop dragging, coordinate' + evt.coordinate);
  //     dragPan.setActive(true);
  //     marker.set('dragging', false);
  //     popup.show(evt.coordinate,'Latitude :'+evt.coordinate[0]+', Longitude :'+ evt.coordinate[1]);
  //   }
  // });
  
  // // onclick ma
  // map.on('click', function(evt){
  //   popup.show(evt.coordinate,'Latitude :'+evt.coordinate[0]+', Longitude :'+ evt.coordinate[1]);
  //    marker.setPosition(evt.coordinate);
  //    marker.set('dragging', false);
  // });
  
// function showtoilet(){

//   (header:"showtoilets.php");
// }



    </script>
  </body>
</html>