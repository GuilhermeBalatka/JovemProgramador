<?php
    // Aqui você precisa adicionar a lógica de conexão com o banco de dados
    require_once("config.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_cliente = $_POST['id_cliente'];

        // Query para excluir o cliente com base no ID
        $query = "DELETE FROM cliente WHERE id_cliente = '$id_cliente'";
        if (mysqli_query($con, $query)) {
            echo "Cliente excluído com sucesso.";
        } else {
            echo "Erro ao excluir o cliente.";
        }
    }

    // Fechar a conexão com o banco de dados
    mysqli_close($con);
?>
