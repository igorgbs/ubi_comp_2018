<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

$municipio = $_POST['municipio'];

$sql = new Sql();

$results = $sql->select("SELECT lat, lon FROM tb_maps WHERE municipio = '$municipio' LIMIT 1");

$countArrayLength = count($results);


    for($i=0;$i<$countArrayLength;$i++){
        echo "".$results[$i]['lat'] ."";
      
        echo " ".$results[$i]['lon'] ."";
    } 
?>