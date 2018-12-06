<?PHP
include('config_busca.php');


# Validar os dados do usuário

function anti_sql_injection($string)
	{
		include('config_busca.php');
		$string = stripslashes($string);
		$string = strip_tags($string);
		$string = mysqli_real_escape_string($conexao,$string);
		return $string;
	}

$sql = mysqli_query($conexao,"select * from tb_maps where municipio='".anti_sql_injection($_POST['municipio'])."' limit 1") or die("Erro");
$linhas = mysqli_num_rows($sql);
if($linhas == '')
	{
		?>
        <div class="msg2 padding20">Município não encontrado.</div>
        <?PHP
	}
else
	{
		echo "Município encontrado";
	}
?>