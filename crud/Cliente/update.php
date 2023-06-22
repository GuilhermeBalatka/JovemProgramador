<?php
require_once("config.php");

class Update {
    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getCliente() {
        global $con;
        
        $select = "SELECT * FROM clientes WHERE Id_Clientes = $this->id";
        $result = mysqli_query($con, $select);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public function updateCliente($nome, $whatsapp) {
        global $con;

        $update = "UPDATE clientes SET Nome = '$nome', Whatsapp = '$whatsapp' WHERE Id_Clientes = $this->id";
        mysqli_query($con, $update);
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['nome']) && isset($_POST['whatsapp'])) {
        $nome = $_POST['nome'];
        $whatsapp = $_POST['whatsapp'];

        $update = new Update($id);
        $update->updateCliente($nome, $whatsapp);

        // Redireciona para a página de consulta (lista de clientes)
        header("Location: ListaClientes.php?Consultar=1");
        exit;
    } else {
        $update = new Update($id);
        $cliente = $update->getCliente();

        if ($cliente) {
            // Exibe o formulário de atualização
            ?>
            <form method="post" action="">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $cliente['Nome']; ?>" required><br>
                
                <label for="whatsapp">Whatsapp:</label>
                <input type="text" name="whatsapp" id="whatsapp" value="<?php echo $cliente['Whatsapp']; ?>" required><br>
                
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
