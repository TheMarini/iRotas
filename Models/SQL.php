<?php
    //UUI | Math
    require 'vendor/autoload.php';

    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

    //SQL
    require('SQL_config.php');
    require('SQL_filter.php');

    //SELECT | INSERT | UPDATE | DELETE
    switch (${$method}['SQL_type']){
        case null: $result = $MySQL->query($select . $where);
            break;

        case 'add':
            switch($tab){
                case 0:
                    $hash = Uuid::uuid4()->toString();
                    $command = 'INSERT INTO rota VALUES ("'.$hash.'", "'.${$method}['origem'].'", "'.${$method}['destino'].'", '.${$method}['num_pecas'].', '.${$method}['num_pessoas'].', "'.${$method}['tempo_estimado'].'"); ';
                    if(!empty(${$method}['motorista']) && !empty(${$method}['carro'])){
                        $command .= 'UPDATE motorista_carro SET rota = "'.$hash.'" WHERE CPF_motorista = "'.${$method}['motorista'].'" AND placa_carro = "'.${$method}['carro'].'"; ';
                    }
                    break;
                case 1:
                    $command = 'INSERT INTO '.$tabela.' VALUES ("'.${$method}['placa'].'", "'.${$method}['modelo'].'"); ';
                    if (!empty(${$method}['motorista'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.${$method}['motorista'].'", "'.${$method}['placa'].'", NULL); ';
                    }
                    break;
                case 2:
                    $command = 'INSERT INTO '.$tabela.' VALUES ("'.${$method}['CPF'].'", "'.${$method}['nome'].'"); ';
                    if (!empty(${$method}['carro'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.${$method}['CPF'].'", "'.${$method}['carro'].'", NULL); ';
                    }
                    break;
            }
            $MySQL->multi_query($command);
            //echo $command;
        break;

        case 'edit':
            switch($tab){
                case 0:
                    break;
                case 1:
                    $command = 'UPDATE ' . $tabela . ' SET placa = "'. ${$method}['new_placa'] . '", modelo = "'.${$method}['modelo'].'" WHERE placa = "' . ${$method}['old_placa'].'"; ';
                    if (${$method}['old_motorista'] != ${$method}['new_motorista']) {
                        if (!empty(${$method}['new_motorista'])){
                            $command .= 'INSERT INTO motorista_carro VALUES ("'.${$method}['new_motorista'].'", "'.${$method}['new_placa'].'", NULL); ';
                        }
                        else{
                            $command .= 'DELETE FROM motorista_carro WHERE CPF_motorista = "'.${$method}['old_motorista'].'" AND placa_carro = "' . ${$method}['new_placa'] . '"; ';
                        }
                    }
                    if (!empty(${$method}['motorista'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.${$method}['motorista'].'", "'.${$method}['new_placa'].'", NULL); ';
                    }
                    break;
                case 2:
                    $command = 'UPDATE ' . $tabela . ' SET CPF = "'. ${$method}['new_CPF'] . '", nome = "'.${$method}['nome'].'" WHERE CPF = "' . ${$method}['old_CPF'].'"; ';
                    if (${$method}['old_carro'] != ${$method}['new_carro']) {
                        if (!empty(${$method}['new_carro'])){
                            $command .= 'INSERT INTO motorista_carro VALUES ("'.${$method}['new_CPF'].'", "'.${$method}['new_carro'].'", NULL); ';
                        }
                        else{
                            $command .= 'DELETE FROM motorista_carro WHERE CPF_motorista = "'.${$method}['new_CPF'].'" AND placa_carro = "' . ${$method}['old_carro'] . '"; ';
                        }
                    }
                    break;
            }
            $MySQL->multi_query($command);
            //echo $command;
        break;

        //FIXME: delete by CPF
        case 'delete':
            switch($tab){
                case 0:
                    $command = 'DELETE FROM ' . $tabela . ' WHERE UUID = "' . ${$method}['UUID'] . '"; ';
                    break;
                case 1:
                    $command = 'DELETE FROM ' . $tabela . ' WHERE placa = "' . ${$method}['placa'] . '"; ';
                    break;
                case 2:
                    $command = 'DELETE FROM ' . $tabela . ' WHERE CPF = "' . ${$method}['CPF'] . '"; ';
                    break;
            }
            $MySQL->query($command);
            //echo $command;
        break;
    }
?>
