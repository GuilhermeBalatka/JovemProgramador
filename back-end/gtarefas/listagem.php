<table>
    
    <tr>
        <th>Ações</th>
        <th>Tarefas</th>
        <th>Descrição</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluída</th>
    </tr>

    <?php
    if(!empty($lista_tarefas)):
        foreach($lista_tarefas as $tarefa) : ?>
    
            <tr>
                <td><a href="editar.php?id=<?php echo $tarefa['id']; ?>">Editar</a>
                    <a href="deletar.php?id=<?php echo $tarefa['id']; ?>" onclick="confirmar_excluir()">Excluir</a></td>
                <td><?php echo $tarefa['nome']; ?></td>
                <td><?php echo $tarefa['descricao']; ?></td>
                <td><?php echo traduz_data_para_tela($tarefa['prazo']); ?></td>
                <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
                <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
                
            </tr>
        <?php endforeach; ?>
    <?php endif?>
    

    <script>
    function confirmar_excluir(id) {
        if (confirm("Tem certeza de que deseja excluir esta tarefa?")) {
            window.location.href = "deletar.php?id=" + id;
        }
    }
    </script>





</table>








    