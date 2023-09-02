
<?php        

//Inicia a session
session_start();

//realiza a conexao com o banco
require "banco.php";
require "C:\laragon\www\back-end\gtarefas\helpers\helper.php";
    
//Variavel de controle de listagem
//true exibe a listagem : false oculta a listagem
$exibir_listagem = true;


    if (array_key_exists('nome', $_GET) && $_GET['nome'] != '') {
        $tarefa = [
            'id' => $_GET['id'],
            'nome' => $_GET['nome'],
            'descricao' => '',
            'prazo' => '',
            'prioridade' => $_GET['prioridade'],
            'concluida' => '0',
        ];


        if(array_key_exists('descricao', $_GET)){
            $tarefa['descricao'] = $_GET['descricao'];
        }

        if(array_key_exists('prazo', $_GET)){
            $tarefa['prazo'] =  traduz_data_para_banco($_GET['prazo']);
        }

        if (array_key_exists('concluida', $_GET)) {
            $tarefa['concluida'] = traduz_concluida($_GET['concluida']);
        }
        
        
        
        gravar_tarefas($conecao, $tarefa);
        header("Location: tarefas.php"); 
        die();
    }
    
    $lista_tarefas = buscar_tarefas($conecao);
    
    $tarefa = [
        'id' => 0,
        'nome' => '',
        'descricao' => '',
        'prazo' => '',
        'prioridade' => 1,
        'concluida' => ''
    ];
    
    
    require "template.php";
?>


