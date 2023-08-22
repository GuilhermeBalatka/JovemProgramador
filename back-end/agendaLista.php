<?php


session_start();

if (isset($_GET['nome']) && $_GET['nome'] != '') {
    $contato = [
        'nome' => $_GET['nome'],
        'whatsapp' => $_GET['whatsapp'],
        'email' => $_GET['email'],
        'descricao' => $_GET['descricao'],
        'data_nascimento' => $_GET['data_nascimento'],
        'favorito' => isset($_GET['favorito']) ? 'Sim' : 'Não',
    ];

    $_SESSION['lista_contatos'][] = $contato;
}

$lista_contatos = [];

if (array_key_exists('lista_contatos', $_SESSION)) {
    $lista_contatos = $_SESSION['lista_contatos'];
}

include "agenda.php";
?>
