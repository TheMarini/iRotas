<?php
    $select;
    $where = ' '; //Set where

    //Set table
    switch($tab){
        case 0:
            $tabela = 'destino';
            $select = '
            SELECT D.nome as "destino", M.nome as "motorista", C.placa, D.num_pecas, D.num_pessoas, D.tempo_estimado FROM motorista_carro MC
                Join destino D on D.UUID = MC.destino
                Join motorista M on M.CPF = MC.CPF_motorista
                Join carro C on C.placa = MC.placa_carro';
            break;

        case 1:
            $tabela = 'carro';
            $select = '
            SELECT C.*, M.nome FROM carro C
                Left outer Join motorista_carro MC on MC.placa_carro = C.placa Left outer
                Join motorista M on M.CPF = MC.CPF_motorista ';
            break;

        case 2:
            $tabela = 'motorista';
            $select = 'SELECT M.*, C.placa FROM motorista M
                Left outer Join motorista_carro MC on MC.CPF_motorista = M.CPF
                Left outer Join carro C on C.placa = MC.placa_carro ';
            break;
    }
?>
