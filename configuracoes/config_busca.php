﻿<?PHP
# Conexão com o banco de dados
$conexao = mysqli_connect('localhost','root','') or die("Erro de conexão");
$banco = mysqli_select_db($conexao,'dbphp7') or die("Erro ao selecionar o banco de dados");
?>