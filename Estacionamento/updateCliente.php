<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }
        
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
        require_once("config.php");

        class UpdateCliente {
            private $id_cliente;

            public function __construct($id_cliente) {
                $this->id_cliente = $id_cliente;
            }

            public function getCliente() {
                global $con;
                
                $select = "SELECT * FROM cliente WHERE id_cliente = $this->id_cliente";
                $result = mysqli_query($con, $select);
                $row = mysqli_fetch_assoc($result);

                return $row;
            }

            public function updateCliente($nome, $idade, $cpf) {
                global $con;

                $update = "UPDATE cliente SET nome = '$nome', idade = $idade, cpf = '$cpf' WHERE id_cliente = $this->id_cliente";
                mysqli_query($con, $update);
            }
        }

        if (isset($_GET['id_cliente'])) {
            $id_cliente = $_GET['id_cliente'];

            if (isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['cpf'])) {
                $nome = $_POST['nome'];
                $idade = $_POST['idade'];
                $cpf = $_POST['cpf'];

                $update = new UpdateCliente($id_cliente);
                $update->updateCliente($nome, $idade, $cpf);

                // Redireciona para a página de consulta (lista de clientes)
                header("Location: lista.html?Consultar=1");
                exit;
            } else {
                $update = new UpdateCliente($id_cliente);
                $cliente = $update->getCliente();

                if ($cliente) {
                    // Exibe o formulário de atualização
    ?>
                    <form method="post" action="">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?php echo $cliente['nome']; ?>" required><br>
                        
                        <label for="idade">Idade:</label>
                        <input type="number" name="idade" id="idade" value="<?php echo $cliente['idade']; ?>" required><br>
                        
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" value="<?php echo $cliente['cpf']; ?>" required><br>
                        
                        <input type="submit" value="Atualizar">
                    </form>
                    <?php
                } else {
                    echo "Cliente não encontrado.";
                }
            }
        } else {
            echo "ID do cliente não especificado.";
        }
        ?>
    </div>
</body>
</html>
