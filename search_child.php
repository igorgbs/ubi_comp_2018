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

<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3482c9;
    color: white;
}

.forms {
    display: block;
}
.forms > form {
    display: inline-block;
    width: 500px;
}

</style>


<title>Search Child</title>
</head>

<body>

<br>


<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('child_id').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('child_id').focus();
				return false;
			}

		if(document.getElementById('adult_id').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('adult_id').focus();
				return false;
			}		

	}
</script>

<div class="forms">




<form style="width:400px" action="search_child.php" method="post" onSubmit="return valida_campos();" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin">

<h2 class="w3-center">Ver histórico da criança</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input style="width:120px" class="w3-input w3-border" name="child_id" type="text" placeholder="ID CRIANÇA">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input style="width:120px" class="w3-input w3-border" name="adult_id" type="text" placeholder="ID ADULTO">
    </div>
</div>

<button style="width:180px" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Buscar</button>

</form>





<form style="width:400px" action="child_maps.php" method="post" onSubmit="return valida_campos();" class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" target="_blank">

<h2 class="w3-center">Localizar criança no mapa</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input style="width:120px" class="w3-input w3-border" name="child_id_maps" type="text" placeholder="ID CRIANÇA">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input style="width:120px" class="w3-input w3-border" name="adult_id_maps" type="text" placeholder="ID ADULTO">
    </div>
</div>

<button style="width:180px" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Buscar</button>

</form>

</div>



<!--PHP-->
<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');


if(isset($_POST['child_id']) || isset($_POST['adult_id']) )
{
	
	$child_id = $_POST['child_id'];
	$adult_id = $_POST['adult_id'];

?>





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

<?PHP
}
else{}

 ?>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</body>
</html>