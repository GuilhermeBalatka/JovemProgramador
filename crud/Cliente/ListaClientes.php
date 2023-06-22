<?php
	require_once("config.php");

	if(isset($_GET['Consultar'])){
		$select = "SELECT * FROM clientes";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Clientes'];
			$teste = "<li>Nome: " . $row['Nome'] . " WhatsApp: " . $row['Whatsapp'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}

		echo '<a href="Clientes.html">Voltar</a>';
	} else {
		$select = "SELECT * FROM clientes";
		$result = mysqli_query($con, $select);

		while ($row = mysqli_fetch_array($result)) {
			$id = $row['Id_Clientes'];
			$teste = "<li>Nome: " . $row['Nome'] . " WhatsApp: " . $row['Whatsapp'];

			echo $teste;
			echo '<a href="deletar.php?id=' . $id . '">Delete</a>';
			echo '<a href="update.php?id=' . $id . '">Update</a>';
		}
		echo '<a href="Clientes.html">Voltar</a>';

		
	}
?>
