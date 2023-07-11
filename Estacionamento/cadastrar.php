<?php
require_once("config.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];


  
  $query = "INSERT INTO administrador (nome, email, senha) VALUES ('$nome', '$email', md5('$senha'))";
  if (mysqli_query($con, $query)) {
    
    header("Location: login.html");
    exit();
  } else {
    echo "<h1>Erro</h1>";
  }



?>
