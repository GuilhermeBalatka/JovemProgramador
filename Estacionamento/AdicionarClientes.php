<?php
	require_once("config.php");

	$nome = $_POST['nome'];
	$idade = $_POST['idade'];
	$cpf = $_POST['cpf'];
	$botao = $_POST['enviar'];
	

	if (isset($botao)) {
		$query = "INSERT INTO cliente (nome, idade, cpf) VALUES ('$nome', '$idade', '$cpf')";
		header("location:menu.html");
	}else {
		echo "Botão não foi clicado";
	}

	if(mysqli_query($con, $query)){
		echo "<h1>Sucesso</h1>";
	}else{
		echo "<h1>Erro </h1>";
	}

	
	
	
?>
