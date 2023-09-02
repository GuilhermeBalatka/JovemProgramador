<?php
session_start();
require "banco.php";
require "C:\laragon\www\back-end\gtarefas\helpers\helper.php";

if (array_key_exists('id', $_GET)) {
    $id = $_GET['id'];

    deletar_tarefa($conecao, $id);

    // Redirecione para a página de tarefas após a exclusão.
    header("Location: tarefas.php");
    exit();
}
?>
