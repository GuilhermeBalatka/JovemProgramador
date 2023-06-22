<?php
	require_once("config.php");

	if(isset($_GET['Consultar'])){
		$select = "SELECT * FROM produtos";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Produtos'];
			$teste = "<li>Descricao: " . $row['descricao'] . " Valor: " . $row['valor'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}

		echo '<a href="Produtos.html">Voltar</a>';
	} else {
		$select = "SELECT * FROM produtos";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Produtos'];
			$teste = "<li>Descricao: " . $row['descricao'] . " Valor: " . $row['valor'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}
		echo '<a href="Produtos.html">Voltar</a>';

		
	}
?>
