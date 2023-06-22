<?php
	require_once("config.php");

	$nome = $_GET['nome'];
	$cnjp = $_GET['cnjp'];
	$botao = $_GET['Enviar'];

	if (isset($botao)) {
		$query = "INSERT INTO fornecedores (Nome, Cnpj) VALUES ('$nome', '$cnjp')";
		header("location:ListaFornecedores.php");
	}else {
		echo "Botão não foi clicado";
	}

	if(mysqli_query($con, $query)){
		echo "<h1>Sucesso</h1>";
	}else{
		echo "<h1>Erro </h1>";
	}
?>
