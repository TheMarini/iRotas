<?php
    //Requires
    require('SQL_config.php');
    require('SQL_filter.php');

    //Select result
    $result;

    //SELECT | INSERT | UPDATE | DELETE
    switch ($$method['SQL_type']){
        case null: $result = $MySQL->query($select . $where);
            break;

        case 'add':
            $MySQL->query('INSERT INTO '.$tabela.' VALUES ("'.$$method['CPF'].'", "'.$$method['nome'].'")');
        break;

        case 'editModal':
            $MySQL->query('UPDATE ' . $tabela . ' SET nome = "'. $_POST['Nome'] . '" WHERE id = ' . $_POST['ID']);
        break;

        case 'delete':
            $MySQL->query('DELETE FROM ' . $tabela . ' WHERE CPF = "' . $$method['CPF'] . '"');
        break;
    }
?>
