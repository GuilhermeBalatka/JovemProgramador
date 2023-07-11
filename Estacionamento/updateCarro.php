<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Carro</title>
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
        
        input[type="text"], input[type="number"] {
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

        class UpdateCarro {
            private $placa;

            public function __construct($placa) {
                $this->placa = $placa;
            }

            public function getCarro() {
                global $con;
                
                $select = "SELECT * FROM carro WHERE placa = '$this->placa'";
                $result = mysqli_query($con, $select);
                $row = mysqli_fetch_assoc($result);

                return $row;
            }

            public function updateCarro($placa, $cor, $marca, $modelo, $id_cliente) {
                global $con;

                $update = "UPDATE carro SET cor = '$cor', marca = '$marca', modelo = '$modelo', id_cliente = $id_cliente WHERE placa = '$placa'";
                mysqli_query($con, $update);
            }
        }

        if (isset($_GET['placa'])) {
            $placa = $_GET['placa'];

            if (isset($_POST['cor']) && isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['id_cliente'])) {
                $cor = $_POST['cor'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $id_cliente = $_POST['id_cliente'];

                $update = new UpdateCarro($placa);
                $update->updateCarro($placa, $cor, $marca, $modelo, $id_cliente);

                // Redireciona para a página de consulta (lista de carros)
                header("Location: lista.php?Consultar=1");
                exit;
            } else {
                $update = new UpdateCarro($placa);
                $carro = $update->getCarro();

                if ($carro) {
    
    ?>
                    <form method="post" action="">
                        <label for="placa">Placa:</label>
                        <input type="text" name="placa" id="placa" value="<?php echo $carro['placa']; ?>" readonly><br>
                        
                        <label for="cor">Cor:</label>
                        <input type="text" name="cor" id="cor" value="<?php echo $carro['cor']; ?>" required><br>
                        
                        <label for="marca">Marca:</label>
                        <input type="text" name="marca" id="marca" value="<?php echo $carro['marca']; ?>" required><br>
                        
                        <label for="modelo">Modelo:</label>
                        <input type="text" name="modelo" id="modelo" value="<?php echo $carro['modelo']; ?>" required><br>
                        
                        <label for="id_cliente">ID Cliente:</label>
                        <input type="number" name="id_cliente" id="id_cliente" value="<?php echo $carro['id_cliente']; ?>" required><br>
                        
                        <input type="submit" value="Atualizar">
                    </form>
                    <?php
                } else {
                    echo "Carro não encontrado.";
                }
            }
        } else {
            echo "Placa do carro não especificada.";
        }
        ?>
    </div>
</body>
</html>
