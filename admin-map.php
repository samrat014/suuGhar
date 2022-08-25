<!-- admin user  -->


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/css/ol.css" type="text/css">
    <style>
      .map {
        height: 550px;
        width: 100%;
      }
    .admin-header{
  background-color: rgb(59, 59, 255);
  margin-bottom: 10px;

}
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>
  </head>

  <body>      


      
      <div class="admin-header">
          <img src="logo.png" alt="SuuGhar" width="50" height="50">
          <!-- - hello admin {$username} - -->
        </div>
                
      <div id="map" class="map"></div>
      <script type="text/javascript">

      var kathmandu =  ol.proj.fromLonLat([ 85.3240, 27.7172]);
      var map = new ol.Map({
          target: 'map',
          layers: [
              new ol.layer.Tile({
                  source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center:kathmandu,
                zoom: 12.5
            })
        });
        
        
        
        </script>
<?php include('footer.php'); ?>

  </body>
  </html>