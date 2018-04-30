<?php
    //SQL Connection
    include('Models/SQL_config.php');

    //Command query
    $command = 'SELECT C.*, M.nome, M.CPF FROM carro C
                Left outer Join motorista_carro MC on MC.placa_carro = C.placa
                Left outer Join motorista M on M.CPF = MC.CPF_motorista';

    //Apply command and get results
    $result = $MySQL->query($command);

    //Data AJAX return
    $data = array("placa" => array(), "modelo" => array(), "lat" => array(), "lng" => array(), "motorista" => array());

    while($row = $result->fetch_assoc()){
        array_push($data["placa"],$row['placa']);
        array_push($data["modelo"],$row['modelo']);
        array_push($data["lat"],$row['latitude']);
        array_push($data["lng"],$row['longitude']);
        array_push($data["motorista"],$row['nome']);
    }

    //AJAX return
    echo json_encode($data);

    //Close connection
    $MySQL->close();
?>
