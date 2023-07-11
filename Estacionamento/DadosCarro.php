<?php
    require_once("config.php");

    
    $query = "SELECT placa, cor, marca, modelo, id_cliente FROM carro";
    $resultado = mysqli_query($con, $query);

    
    $carro = array();

    
    while ($row = mysqli_fetch_assoc($resultado)) {
    
        $carro[] = $row;
    }

    
    

    
    echo json_encode($carro);
?>
