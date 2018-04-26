<?php
    //Auto method
    $method = '_' . $_SERVER['REQUEST_METHOD'];

    //Get current tab
    $tab = ${$method}['tab'];

    //SQL
    include('Models/SQL.php');

    //Data return
    $data = array("placa" => array(), "modelo" => array(), "lat" => array(), "lng" => array(), "motorista" => array());

    while($row = $result->fetch_assoc()){
        array_push($data["placa"],$row['placa']);
        array_push($data["modelo"],$row['modelo']);
        array_push($data["lat"],$row['latitude']);
        array_push($data["lng"],$row['longitude']);
        array_push($data["motorista"],$row['nome']);
    }

    //Return
    echo json_encode($data);

    //Close connection
    $MySQL->close();
?>
