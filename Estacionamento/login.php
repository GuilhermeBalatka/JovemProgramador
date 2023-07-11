<?php
require_once("config.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$query = "SELECT * FROM administrador WHERE email = '$email' AND senha = md5('$senha')";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Login realizado com sucesso!";
    header("Location: menu.html");
} else {
    // Adicionando o código JavaScript para exibir o alerta
    echo '<script>alert("Senha incorreta. Por favor, tente novamente.");</script>';
    echo '<script>window.location.href = "login.html";</script>';
}
?>
