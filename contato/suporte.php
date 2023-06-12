<?php  
	require_once("config.php");

	
	$nome = $_GET['nome'];
	$whatsapp = $_GET['whatsapp'];
	$email = $_GET['email'];
	$texto = $_GET["texto"];
	$botao = $_GET["Enviar"];

	$con = mysqli_connect($host, $username, $password, $dbname);
	

	if(isset($botao)){
		$query = "insert into formulario(nome, whatsapp, email, texto) values('$nome', '$whatsapp', '$email', '$texto')";
	}else{
		echo "Falha ao inserir";
	}

	if(mysqli_query($con, $query)){
		echo "<h1>Sucesso</h1>";
	}else{
		echo "<h1>Erro </h1>";
	}

 ?>

 <style type="text/css">
 	h1{
 		text-align: center;
 		font-size: 50px;
 	}
 </style>