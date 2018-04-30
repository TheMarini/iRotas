<?php
    if(isset($_SERVER['PATH_INFO'])){
        //REST
        if (isset($_SERVER['HTTP_REST'])){
            include('Models/SQL_config.php');
            $command = 'UPDATE carro SET latitude = '.$_SERVER['HTTP_LATITUDE'].', longitude = '.$_SERVER['HTTP_LONGITUDE'].' WHERE placa = "' . $_SERVER['HTTP_PLACA'].'"; ';;
            $MySQL->query($command);
            $MySQL->close();
        }
        else{
            //AJAX REQUEST
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                $file = 'Views' . $_SERVER['PATH_INFO'] . '.php';
                include($file);  //Return file to AJAX request
            }
            else{
                header("Location: " . '/');  //Redirect to default
            }
        }
    }
    //DEFAULT
    else{
        require_once('Views/index.php');  //Index View
    }
?>

