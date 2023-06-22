<?php
require_once("config.php");

    class Update {
        private $id;

        public function __construct($id) {
            $this->id = $id;
        }

        public function getProduto() {
            global $con;
            
            $select = "SELECT * FROM produtos WHERE Id_Produtos = $this->id";
            $result = mysqli_query($con, $select);
            $row = mysqli_fetch_assoc($result);

            return $row;
        }

        public function updateProduto($descricao, $valor) {
            global $con;

            $update = "UPDATE produtos SET descricao = '$descricao', valor = '$valor' WHERE Id_Produtos = $this->id";
            mysqli_query($con, $update);
        }
    }

    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (isset($_POST['descricao']) && isset($_POST['valor'])) {
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];

            $update = new Update($id);
            $update->updateProduto($descricao, $valor);

            
            header("Location: ListaProdutos.php?Consultar=1");
            exit;
        } else {
            $update = new Update($id);
            $produto = $update->getProduto();

            if ($produto) {
                
                ?>
                <form method="post" action="">
                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricao" id="descricao" value="<?php echo $produto['descricao']; ?>" required><br>
                    
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" id="valor" value="<?php echo $produto['valor']; ?>" required><br>
                    
                    <input type="submit" value="Atualizar">
                </form>
                <?php
            } else {
                echo "Produto não encontrado.";
            }
        }
    } else {
        echo "ID do produto não especificado.";
    }
?>
