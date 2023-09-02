<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco = 'sys';

    $conecao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

    if(mysqli_connect_errno()){
        echo "Nao foi possivel conectar. Erro:";
        echo mysqli_connect_error();
        die();
    }

    //Funcao que busca tarefas armazenadas no banco
    function buscar_tarefas($conecao){
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = mysqli_query($conecao, $sqlBusca);
        $tarefas = [];

        while($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }

   
    //funcao que insere tarefas no banco
    function gravar_tarefas($conecao, $tarefa) {
        if ($tarefa['prazo'] == '') {
            $prazo = 'NULL';
        } else {
            $prazo = "'{$tarefa['prazo']}'";
        }
    
        $concluida = $tarefa['concluida'] === 'Concluída' ? 1 : 0; // Converte para 1 ou 0
    
        $sqlGravar = "INSERT INTO tarefas(nome, descricao, prioridade, prazo, concluida) VALUES (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            {$tarefa['prioridade']},
            $prazo,
            $concluida
        )";
    
        mysqli_query($conecao, $sqlGravar);
    }
    


    //funcao que atualiza no banco os valores editados    
    function editar_tarefa($conecao, $tarefa){
        if($tarefa['prazo'] == ''){
            $prazo = 'NULL';
        } else {
            $prazo = "'{$tarefa['prazo']}'";
        }

        $concluida = $tarefa['concluida'] === 'Concluída' ? 1 : 0;

        $sqlEditar = "UPDATE tarefas SET 
            nome = '{$tarefa['nome']}',
            descricao = '{$tarefa['descricao']}',
            prioridade = '{$tarefa['prioridade']}',
            prazo = $prazo,
            concluida = $concluida
            WHERE id = {$tarefa['id']}
        ";

        mysqli_query($conecao, $sqlEditar);
    }

    
    function buscar_tarefa($conecao, $id) {
        $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
        $resultado = mysqli_query($conecao, $sqlBusca);
    
        return mysqli_fetch_assoc($resultado);
    }
    
    
    function deletar_tarefa($conecao, $id){
        $sqlDeletar = "DELETE FROM tarefas WHERE id = $id";
        mysqli_query($conecao, $sqlDeletar);
    }
    
    

    
?>