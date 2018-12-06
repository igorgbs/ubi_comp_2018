<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

$child_id_maps = $_POST['child_id_maps'];
$adult_id_maps = $_POST['adult_id_maps'];

$sql = new Sql();

$results = $sql->select("CALL find_child_maps('$child_id_maps','$adult_id_maps')");

$countArrayLength = count($results);

?>



<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/maps/documentation/javascript/cgc/demos.css">
<link rel="shortcut icon" href="map.png" type="image/x-icon" />
  <head>
    <title>Ubi-Comp 2018</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">

    <div> 

      FUNCIONOU!

    </div>
    
    <br><br>

    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    

    <div id="map"></div>
    
    <script>
      
      var a = 1;
      // First, create an object containing LatLng and population for each city.
      var child_point = {
        child_area: {
          center: {

          lat: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adult_lat'] ."";
          } 
?>,
          lng: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adult_lon'] ."";
          } 
?>},
          
        } 
        
      };

      function initMap() {
        // Create the map.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adult_lat'] ."";
          } 
?>
, lng: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adult_lon'] ."";
          } 
?>},
          mapTypeId: 'terrain'
        });

        // Construct the circle for each value in citymap.
        // Note: We scale the area of the circle based on the population.
        for (var point in child_point) {
          // Add the circle for this city to the map.
          var cityCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: child_point[point].center,
            radius: Math.sqrt(a) * 100,
            title: 'Search'
          });
        }
      }


    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKIOxiXe3yJB8zxwa_9cIr3BVX1C9g174&callback=initMap"
    async defer></script>
   
  </body>
</html>