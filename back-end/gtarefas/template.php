
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Gerenciador de Tarefas</title>
    <link rel="stylesheet" type="text/css" href="tarefas.css">
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

   
    <?php require 'formulario.php'; ?>

    
    <?php if ($exibir_listagem) : ?>
        <?php require 'listagem.php'; ?>
        
    <?php endif; ?>

    
</body>
</html>
