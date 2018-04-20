<?php
    //Get current tab
    $tab = $$method['tab'];

    //Set table
    switch($tab){
        case 0:
            $tabela = 'rota';
            break;

        case 1:
            $tabela = 'carro';
            break;

        case 2:
            $tabela = 'motorista';
            break;
    }

    //Set where
    $where = ' ';
//    if ($_POST['id'] != '' || $_POST['nome'] != '' || $_POST['status'] != ''){
//        $where .= 'where 1 = 1';
//
//        if ($_POST['ID'] != ''){
//            $where .= ' AND id = ' . $_POST['ID'];
//        }
//        if ($_POST['Nome'] != '' ){
//            $where .= ' AND nome LIKE  "%' . $_POST['nome'] . '%"';
//        }
//        if ($_POST['Status'] != ''){
//            $where .= ' AND id_status = "' . $_POST['status'] . '"';
//        }
//    }
?>
