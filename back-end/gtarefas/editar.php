<?php
    session_start();
    require "banco.php";
    require "C:\laragon\www\back-end\gtarefas\helpers\helper.php";

    $exibir_listagem = true;

    if (array_key_exists('id', $_GET)) {
        $id  = $_GET['id'];
        $tarefa = buscar_tarefa($conecao, $id);

    } 

    if (array_key_exists('nome', $_GET)) {
        $tarefa = [
            'id' => $id,
            'nome' => $_GET['nome'],
            'descricao' => '',
            'prazo' => '',
            'prioridade' => $_GET['prioridade'],
            'concluida' => 0,
        ];

        if (array_key_exists('descricao', $_GET)) {
            $tarefa['descricao'] = $_GET['descricao'];
        }

        if (array_key_exists('prazo', $_GET)) {
            $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
        }

        if (array_key_exists('concluida', $_GET)) {
            $tarefa['concluida'] = traduz_concluida($_GET['concluida']);
        }

        editar_tarefa($conecao, $tarefa); 
        header("Location: tarefas.php"); 
        
    }

    $tarefa = buscar_tarefa($conecao, $_GET['id']);

    require "template.php";
?>






