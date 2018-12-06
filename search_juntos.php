<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>TABLE_MAPS</title>
	</head>
	<body>

		<h1>Buscar Municipio</h1>
<br>


<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('municipio').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('municipio').focus();
				return false;
			}
	}
</script>
<form action="search_juntos.php" method="post" onSubmit="return valida_campos();">
	Municipio<br>
    <input type="text" name="municipio" id="municipio" placeholder="Digite o nome do municipio">
	<br><br>
	<input type="submit" value="Buscar" class="but_comando">
</form>
</body>

<br>



		<h1>TABELA DE MUNICIPIOS</h1>
		
		<table width="500" border="1" cellspacing="2" cellpadding="5" align=left>
		
		
		<tr>
			<td><b><center>ID</center></b></td>
			<td><b><center>TEMPO</center></b></td>
			<td><b><center>LATITUDE</center></b></td>
			<td><b><center>LONGITUDE</center></b></td>
			<td><b><center>MUNICIPIO</center></b></td>
			<td><b><center>UF</center></b></td>
		</tr>
		
<?php

	include('configuracoes/config_busca.php');

	$municipio = $_POST['municipio'];

	$results = mysqli_query($conexao,"SELECT * FROM tb_maps WHERE municipio = '$municipio' LIMIT 1 ") or die("Erro");	

	
		//Para cada results(array com valores do banco) atribua as row(linhas da tabela no banco)
		foreach ($results as $row) {
	
			//Para cada linha, atribua as $key(nome das colunas da referida tabela) com seus respectivos $value(valores destas colunas)
			
		
				echo'<tr>';
			echo '<td>'.'<center>'.$row["id"].'</center>'.'</td>';
			echo '<td>'.'<center>'.date('d/m/Y - H:i:s', strtotime($row["tempo"])).'</center>'.'</td>';
			echo '<td>'.'<center>'.$row["lat"].'</center>'.'</td>';
			echo '<td>'.'<center>' . $row["lon"]. '</center>'.'</td>';
			echo '<td>'.'<center>'.$row["municipio"].'</center>'.'</td>';
			echo '<td>'.'<center>' . $row["uf"]. '</center>'.'</td>';
				echo'</tr>';
	

}
	
	
			
?>
		
		</table>
		
	</body>
<html>