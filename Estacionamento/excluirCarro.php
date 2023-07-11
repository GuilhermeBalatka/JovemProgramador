<?php
    // Aqui você precisa adicionar a lógica de conexão com o banco de dados
    require_once("config.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $placa = $_POST['placa'];

        // Query para excluir o carro com base na placa
        $query = "DELETE FROM carro WHERE placa = '$placa'";
        if (mysqli_query($con, $query)) {
            echo "Carro excluído com sucesso.";
        } else {
            echo "Erro ao excluir o carro.";
        }
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
?>
