<?php
	require_once("config.php");

	$query = "SELECT id_cliente, nome, idade, cpf FROM cliente";
	$resultado = mysqli_query($con, $query);

	$clientes = array();
	while ($row = mysqli_fetch_assoc($resultado)) {
		$clientes[] = $row;
	}

	echo json_encode($clientes);
?>
