<?php 
	require_once("config.php");

	$id = $_GET['id'];

	$delete = "DELETE FROM fornecedores WHERE Id_Fornecedores = '$id'";

	if (mysqli_query($con, $delete)) {
		echo "Registro excluído com sucesso.";
		//header("location:ListaProdutos.php");
	} else {
		echo "Falha ao excluir o registro: " . mysqli_error($con);
	}

?>


	<a href="ListaFornecedores.php">Voltar</a>
