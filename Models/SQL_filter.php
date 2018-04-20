<?php
    //Get current tab
    $tab = $_POST['tab'];

    //Set table
    $tabela = ($tab == 0) ? 'maquina' : 'status';

    //Set where
    $where = ' ';
    if ($_POST['ID'] != '' || $_POST['Nome'] != '' || $_POST['Status'] != ''){
        $where .= 'where 1 = 1';

        if ($_POST['ID'] != ''){
            $where .= ' AND id = ' . $_POST['ID'];
        }
        if ($_POST['Nome'] != '' ){
            $where .= ' AND nome LIKE  "%' . $_POST['Nome'] . '%"';
        }
        if ($_POST['Status'] != ''){
            $where .= ' AND id_status = "' . $_POST['Status'] . '"';
        }
    }
?>
