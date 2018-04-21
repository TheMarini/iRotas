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
                case 1: $command = 'INSERT INTO '.$tabela.' VALUES ("'.$$method['placa'].'", "'.$$method['modelo'].'")';
                    break;
                case 2: $command = 'INSERT INTO '.$tabela.' VALUES ("'.$$method['CPF'].'", "'.$$method['nome'].'")';
                    break;
            }
            $MySQL->query($command);
        break;

        case 'edit':
            switch($tab){
                case 0:
                    break;
                case 1: $command = 'UPDATE ' . $tabela . ' SET placa = "'. $$method['new_placa'] . '", modelo = "'.$$method['modelo'].'" WHERE placa = "' . $$method['old_placa'].'"';
                    break;
                case 2: $command = 'UPDATE ' . $tabela . ' SET CPF = "'. $$method['new_CPF'] . '", nome = "'.$$method['nome'].'" WHERE CPF = "' . $$method['old_CPF'].'"';
                    break;
            }
            $MySQL->query($command);
        break;

        case 'delete':
            switch($tab){
                case 0: $command = 'DELETE FROM ' . $tabela . ' WHERE UUID = "' . $$method['UUID'] . '"';
                    break;
                case 1: $command = 'DELETE FROM ' . $tabela . ' WHERE placa = "' . $$method['placa'] . '"';
                    break;
                case 2: $command = 'DELETE FROM ' . $tabela . ' WHERE CPF = "' . $$method['CPF'] . '"';
                    break;
            }
            $MySQL->query($command);
        break;
    }
?>
