<?php
    require_once("config.php");

    class Update {
        private $id;

        public function __construct($id) {
            $this->id = $id;
        }

        public function getFornecedor() {
            global $con;
            
            $select = "SELECT * FROM fornecedores WHERE Id_Fornecedores = $this->id";
            $result = mysqli_query($con, $select);
            $row = mysqli_fetch_assoc($result);

            return $row;
        }

        public function updateFornecedor($nome, $cnpj) {
            global $con;

            $update = "UPDATE fornecedores SET Nome = '$nome', Cnpj = '$cnpj' WHERE Id_Fornecedores = $this->id";
            mysqli_query($con, $update);
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($_POST['nome']) && isset($_POST['cnpj'])) {
            $nome = $_POST['nome'];
            $cnpj = $_POST['cnpj'];

            $update = new Update($id);
            $update->updateFornecedor($nome, $cnpj);

            // Redireciona para a página de consulta (lista de fornecedores)
            header("Location: ListaFornecedores.php?Consultar=1");
            exit;
        } else {
            $update = new Update($id);
            $fornecedor = $update->getFornecedor();

            if ($fornecedor) {
                // Exibe o formulário de atualização
                ?>
                <form method="post" action="">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $fornecedor['Nome']; ?>" required><br>
                    
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpj" value="<?php echo $fornecedor['Cnpj']; ?>" required><br>
                    
                    <input type="submit" value="Atualizar">
                </form>
                <?php
            } else {
                echo "Fornecedor não encontrado.";
            }
        }
    } else {
        echo "ID do fornecedor não especificado.";
    }
?>
