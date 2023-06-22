<?php 
	require_once("config.php");

	$id = $_GET['id'];

	$delete = "DELETE FROM clientes WHERE Id_Clientes = '$id'";

	if (mysqli_query($con, $delete)) {
		echo "Registro excluído com sucesso.";
		//header("location:ListaProdutos.php");
	} else {
		echo "Falha ao excluir o registro: " . mysqli_error($con);
	}

?>


	<a href="ListaClientes.php">Voltar</a>
