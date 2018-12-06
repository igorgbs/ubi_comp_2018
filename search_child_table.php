<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=0.1" charset="utf-8">

<!--LINKS STYLES-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" href="wally.png" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


<title>Search Child</title>
</head>

<body>

<br>

<div class="container">
	<div class="table-responsive">

	 <table class="table table-striped table-bordered table-hover">
      <thead>		
      <tr>
      	
		<th><center>TEMPO</center></th>
		<th><center>CHILD_ID</center></th>
		<th><center>CHILD_name</center></th>
		<th><center>ADULT_ID</center></th>
		<th><center>ADULT_NAME</center></th>
		<th><center>RSSI_LEVEL</center></th>	
		<th><center>ADDRESS</center></th>
		<th><center>ADULT_LATITUDE</center></th>
		<th><center>ADULT_LONGITUDE</center></th>
		<th><center>DISTÂNCIA PARA VOCÊ</center></th>
      </tr>
  	  </thead>
    
    </div>

</div>



<!--PHP-->
<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

	
	$child_id = $_POST['child_id'];
	$adult_id = $_POST['adult_id'];

	$sql = new Sql();

	$results = $sql->select("CALL find_child('$child_id','$adult_id')");

	$countArrayLength = count($results);

	foreach ($results as $row) {
		
				//Para cada linha, atribua as $key(nome das colunas da referida tabela) com seus respectivos $value(valores destas colunas)
				

							
					echo'<tr>';
				
				echo '<td>'.'<center>'.date('d/m/Y - H:i:s', strtotime($row["tempo"])).'</center>'.'</td>';
				echo '<td>'.'<center>'.$row["child_id"].'</center>'.'</td>';
				echo '<td>'.'<center>'.$row["child_name"].'</center>'.'</td>';
				echo '<td>'.'<center>' . $row["adult_id"]. '</center>'.'</td>';
				echo '<td>'.'<center>'.$row["adult_name"].'</center>'.'</td>';
				echo '<td>'.'<center>'.$row["RSSI_level"].'</center>'.'</td>';	
				echo '<td>'.'<center>' . $row["address"]. '</center>'.'</td>';
				echo '<td>'.'<center>' . $row["adult_lat"]. '</center>'.'</td>';
				echo '<td>'.'<center>' . $row["adult_lon"]. '</center>'.'</td>';
				echo '<td>'.'<center>' . $row["distancia_km_for_you"]. '</center>'.'</td>';
					echo'</tr>';

		}

		if ($countArrayLength == '') {
			echo '<h2 class="w3-center">ID da criança ou do responsável não existe!</h2>';
			}


?>	
<!--PHP END-->


	</table>





<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>
</html>