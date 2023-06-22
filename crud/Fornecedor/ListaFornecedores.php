<?php
	require_once("config.php");

	if(isset($_GET['Consultar'])){
		$select = "SELECT * FROM fornecedores";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Fornecedores'];
			$teste = "<li>Nome: " . $row['Nome'] . " Cnpj: " . $row['Cnpj'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}

		echo '<a href="Fornecedores.html">Voltar</a>';
	} else {
		$select = "SELECT * FROM fornecedores";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Fornecedores'];
			$teste = "<li>Nome: " . $row['Nome'] . " Cnpj: " . $row['Cnpj'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}
		echo '<a href="Fornecedores.html">Voltar</a>';

		
	}
?>
