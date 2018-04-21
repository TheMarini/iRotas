<?php
    //Requires
    require('SQL_config.php');
    require('SQL_filter.php');

    //SELECT | INSERT | UPDATE | DELETE
    switch ($$method['SQL_type']){
        case null: $result = $MySQL->query($select . $where);
            break;

        case 'add':
            switch($tab){
                case 0:
                    break;
                case 2:
                    $command = 'INSERT INTO '.$tabela.' VALUES ("'.$$method['placa'].'", "'.$$method['modelo'].'"); ';
                    if (!empty($$method['motorista'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.$$method['motorista'].'", "'.$$method['placa'].'", NULL)';
                    }
                    break;
                case 3:
                    $command = 'INSERT INTO '.$tabela.' VALUES ("'.$$method['CPF'].'", "'.$$method['nome'].'"); ';
                    if (!empty($$method['carro'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.$$method['CPF'].'", "'.$$method['carro'].'", NULL)';
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
                case 2:
                    $command = 'UPDATE ' . $tabela . ' SET placa = "'. $$method['new_placa'] . '", modelo = "'.$$method['modelo'].'" WHERE placa = "' . $$method['old_placa'].'"; ';
                    if (!empty($$method['motorista'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.$$method['motorista'].'", "'.$$method['new_placa'].'", NULL)';
                    }
                    break;
                case 3:
                    $command = 'UPDATE ' . $tabela . ' SET CPF = "'. $$method['new_CPF'] . '", nome = "'.$$method['nome'].'" WHERE CPF = "' . $$method['old_CPF'].'"; ';
                    if (!empty($$method['carro'])){
                        $command .= 'INSERT INTO motorista_carro VALUES ("'.$$method['new_CPF'].'", "'.$$method['carro'].'", NULL)';
                    }
                    break;
            }
            $MySQL->multi_query($command);
            //echo $command;
        break;

        //FIXME: delete by CPF
        case 'delete':
            switch($tab){
                case 0: $command = 'DELETE FROM ' . $tabela . ' WHERE UUID = "' . $$method['UUID'] . '"';
                    break;
                case 2: $command = 'DELETE FROM ' . $tabela . ' WHERE placa = "' . $$method['placa'] . '"';
                    break;
                case 3:
                    $command = 'DELETE FROM ' . $tabela . ' WHERE CPF = "' . $$method['CPF'] . '"';
                    break;
            }
            $MySQL->query($command);
            //echo $command;
        break;
    }
?>
