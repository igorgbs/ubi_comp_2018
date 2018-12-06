<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
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
<form action="maps.php" method="post" onSubmit="return valida_campos();">
	Municipio<br>
    <input type="text" name="municipio" id="municipio" placeholder="Digite o nome do municipio">
	<br><br>
	<input type="submit" value="Buscar" class="but_comando">
</form>
</body>
</html>