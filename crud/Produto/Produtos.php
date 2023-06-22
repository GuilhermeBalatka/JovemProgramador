<?php
	require_once("config.php");

	$descricao = $_GET['descricao'];
	$valor = $_GET['valor'];
	$botao = $_GET['Enviar'];

	if (isset($botao)) {
		$query = "INSERT INTO produtos (descricao, valor) VALUES ('$descricao', '$valor')";
		header("location:ListaProdutos.php");
	}else {
		echo "Botão não foi clicado";
	}

	if(mysqli_query($con, $query)){
		echo "<h1>Sucesso</h1>";
	}else{
		echo "<h1>Erro </h1>";
	}
?>
