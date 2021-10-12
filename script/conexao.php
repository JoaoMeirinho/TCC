<?php
	$host = "localhost"; 			
	$user = "root"; 
	$pass = "15244821881"; 
	$banco = "tcc";
		
	$conexao = @mysqli_connect($host, $user, $pass, $banco ) 
	or die ("Problemas com a conexão do Banco de Dados");
	$conexao -> set_charset("utf8");
?>