<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

#$municipio = $_POST['municipio'];

$sql = new Sql();

$results = $sql->select("SELECT municipio, lat, lon FROM tb_maps WHERE uf = 'RJ' ");

$countArrayLength = count($results);

?>









<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKIOxiXe3yJB8zxwa_9cIr3BVX1C9g174&callback=initMap"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
    var locations = [
    <?php 
        for($i=0;$i<$countArrayLength;$i++){
          echo "[" . "'" . $results[$i]['municipio'] . "'" . "," . $results[$i]['lat'] . "," . $results[$i]['lon'] . "],";
        } 
        ?>                
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      //center: new google.maps.LatLng(51.530616, -0.123125),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var markers = new Array();

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }

    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
      bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      map.fitBounds(bounds);
    }
    AutoCenter();

  </script> 
</body>
</html>