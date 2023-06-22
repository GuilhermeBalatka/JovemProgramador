<?php
	require_once("config.php");

	$nome = $_GET['nome'];
	$whatsapp = $_GET['whatsapp'];
	$botao = $_GET['Enviar'];

	if (isset($botao)) {
		$query = "INSERT INTO clientes (Nome, Whatsapp) VALUES ('$nome', '$whatsapp')";
		header("location:ListaClientes.php");
	}else {
		echo "Botão não foi clicado";
	}

	if(mysqli_query($con, $query)){
		echo "<h1>Sucesso</h1>";
	}else{
		echo "<h1>Erro </h1>";
	}
?>
