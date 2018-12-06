<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<h1>Distância entre dois pontos</h1>
<br>


<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('lat_1').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('lat_1').focus();
				return false;
			}

		if(document.getElementById('lon_1').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('lon_1').focus();
				return false;
			}	

		if(document.getElementById('lat_2').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('lat_2').focus();
				return false;
			}	
			
		if(document.getElementById('lon_2').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('lon_2').focus();
				return false;
			}			

	}
</script>
<form action="search_ubicomp_table.php" method="post" onSubmit="return valida_campos();">
	Calcular distância entre dois pontos<br>
    
    <input type="text" name="lat_1" id="lat_1" placeholder="Digite a Latitude 1">
	<br><br>
	

	<input type="text" name="lon_1" id="lon_1" placeholder="Digite a Longitude 1">
	<br><br>
	

	<input type="text" name="lat_2" id="lat_2" placeholder="Digite a Latitude 2">
	<br><br>
	

	<input type="text" name="lon_2" id="lon_2" placeholder="Digite a Longitude 2">
	<br><br>
	<input type="submit" value="Calcular" class="but_comando">

</form>




<h1><center>TABELA DE MUNICIPIOS</center></h1>
		
		<table width="500" border="1" cellspacing="2" cellpadding="5" align=center>
		
		
		<tr>
			<td><b><center>GENERAL_ID</center></b></td>
			<td><b><center>TEMPO</center></b></td>
			<td><b><center>CHILD_ID</center></b></td>
			<td><b><center>CHILD_name</center></b></td>
			<td><b><center>ADULT_ID</center></b></td>
			<td><b><center>ADULT_NAME</center></b></td>
			<td><b><center>RSSI_LEVEL</center></b></td>
			<td><b><center>STATE</center></b></td>
			<td><b><center>CITY</center></b></td>
			<td><b><center>ADDRESS</center></b></td>
			<td><b><center>adult_LAT</center></b></td>
			<td><b><center>adult_LON</center></b></td>
			<td><b><center>DISTÂNCIA_KM</center></b></td>
			
		</tr>

<?php 

require_once("configuracoes/config.php");
include('configuracoes/config_busca.php');

$lat_1 = $_POST['lat_1'];
$lon_1 = $_POST['lon_1'];
$lat_2 = $_POST['lat_2'];
$lon_2 = $_POST['lon_2'];

$sql = new Sql();

$results = $sql->select("CALL calcula_dist('$lat_1','$lat_2','$lon_1','$lon_2')");

$countArrayLength = count($results);



foreach ($results as $row) {
	
			//Para cada linha, atribua as $key(nome das colunas da referida tabela) com seus respectivos $value(valores destas colunas)
			
		
				echo'<tr>';
			echo '<td>'.'<center>'.$row["general_id"].'</center>'.'</td>';
			echo '<td>'.'<center>'.date('d/m/Y - H:i:s', strtotime($row["tempo"])).'</center>'.'</td>';
			echo '<td>'.'<center>'.$row["child_id"].'</center>'.'</td>';
			echo '<td>'.'<center>'.$row["child_name"].'</center>'.'</td>';
			echo '<td>'.'<center>' . $row["adult_id"]. '</center>'.'</td>';
			echo '<td>'.'<center>'.$row["adult_name"].'</center>'.'</td>';
			echo '<td>'.'<center>'.$row["RSSI_level"].'</center>'.'</td>';
			echo '<td>'.'<center>' . $row["state"]. '</center>'.'</td>';
			echo '<td>'.'<center>' . $row["city"]. '</center>'.'</td>';
			echo '<td>'.'<center>' . $row["address"]. '</center>'.'</td>';
			echo '<td>'.'<center>' . $row["adult_lat"]. '</center>'.'</td>';
			echo '<td>'.'<center>' . $row["adult_lon"]. '</center>'.'</td>';
			echo '<td>'.'<center>' . $row["distancia_km"]. '</center>'.'</td>';
				echo'</tr>';

	}

if ($countArrayLength == '') {
	echo "ID NÃO EXISTE";
	}	

?>	

	</table>

</body>
</html>