<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="agenda.css">
    <title>Agenda</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form>
        <fieldset>
            <legend>Agenda</legend>
            <label>Nome: <input type="text" name="nome"></label><br>
            <label>WhatsApp: <input type="text" name="whatsapp"></label><br>
            <label>Email: <input type="text" name="email"></label><br>
            <label>Descrição:
                <textarea name="descricao"></textarea>
            </label><br>
            <label>Data de Nascimento: <input type="date" value="2017-06-01" name="data_nascimento"></label><br> 
            <label>Favorito
                <input type="checkbox" name="favorito" value="sim">
            </label>
            <input type="submit" value="Cadastrar">
        </fieldset>
    </form>
    
    <table>
        <tr>
            <th>Nome</th>
            <th>WhatsApp</th>
            <th>Email</th>
            <th>Descrição</th>
            <th>Data Nascimento</th>
            <th>Favorito</th>
        </tr>

        <?php
    
        foreach($lista_contatos as $contato) : ?>
            <tr>
                <td><?php echo $contato['nome']; ?></td>
                <td><?php echo $contato['whatsapp']; ?></td>
                <td><?php echo $contato['email']; ?></td>
                <td><?php echo $contato['descricao']; ?></td>
                <td><?php echo $contato['data_nascimento']; ?></td>
                <td><?php echo $contato['favorito']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
