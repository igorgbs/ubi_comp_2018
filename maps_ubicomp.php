<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

$general_id = $_POST['general_id'];

$sql = new Sql();

$results = $sql->select("SELECT adults_lat, adults_lon FROM tb_ubicomp WHERE general_id = '$general_id' LIMIT 1");

$countArrayLength = count($results);

?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="/maps/documentation/javascript/cgc/demos.css">
  <head>
    <title>Ubi-Comp 2019</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
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

    <?PHP
      if ($countArrayLength == '') {
        echo "ID NÃO EXISTE";
      }
      ?>

    <div id="map"></div>
    <script>
      function initMap() {
        var myLatLng = 

        {lat: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adults_lat'] ."";
          } 
?>, 
        lng: <?php 
        for($i=0;$i<$countArrayLength;$i++){
              echo "".$results[$i]['adults_lon'] ."";
          } 
?>};

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 16
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'My Home'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKIOxiXe3yJB8zxwa_9cIr3BVX1C9g174&callback=initMap"
    async defer></script>
  </body>
</html>







