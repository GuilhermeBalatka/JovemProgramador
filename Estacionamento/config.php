<?php 
	$host = 'localhost';
	$dbname = 'estacionamento';
	$username = 'root';
	$password = '';

	$con = mysqli_connect($host, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
    echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
    exit();
}
 ?>