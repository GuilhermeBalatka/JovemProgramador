<?php
	require_once("config.php");

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$placa = $_POST['placa'];
		$cor = $_POST['cor'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$id_cliente = $_POST['id_cliente'];

		// Verificar se a placa já existe no banco de dados
		$query_verificar = "SELECT * FROM carro WHERE placa = '$placa'";
		$resultado_verificar = mysqli_query($con, $query_verificar);
		if (mysqli_num_rows($resultado_verificar) > 0) {
			echo '<script>alert("A placa informada já está em uso. Por favor, escolha outra placa."); window.location.href = "AdicionarCarros.html";</script>';
			exit();
		}

		// Inserir os dados no banco de dados
		$query_inserir = "INSERT INTO carro (placa, cor, marca, modelo, id_cliente) VALUES ('$placa', '$cor', '$marca', '$modelo', '$id_cliente')";
		if (mysqli_query($con, $query_inserir)) {
			header("Location: menu.html");
			exit();
		} else {
			echo "Erro ao inserir os dados no banco de dados.";
		}
	}
?>
