<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
<h1>Buscar ID</h1>
<br>


<script type="text/javascript">
function valida_campos()
	{
		if(document.getElementById('general_id').value == '')
			{
				alert('Por favor, preencha os campos obrigatórios.');
				document.getElementById('general_id').focus();
				return false;
			}
	}
</script>
<form action="maps_ubicomp.php" method="post" onSubmit="return valida_campos();">
	Busca por ID<br>
    <input type="text" name="general_id" id="general_id" placeholder="Digite o general_id">
	<br><br>
	<input type="submit" value="Buscar" class="but_comando">
</form>
</body>
</html>