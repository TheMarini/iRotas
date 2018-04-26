<?php
    $select;
    $where = ' '; //Set where

    //Set table
    switch($tab){
        case 0:
            $tabela = 'rota';
            $select = '
            SELECT R.UUID, R.origem, R.destino, M.nome as "motorista", M.CPF, C.placa, R.num_pecas, R.num_pessoas, R.tempo_estimado FROM rota R
                LEFT OUTER Join motorista_carro MC on MC.rota = R.UUID
                LEFT OUTER Join motorista M on M.CPF = MC.CPF_motorista
                LEFT OUTER Join carro C on C.placa = MC.placa_carro 
                ORDER BY ISNULL(C.placa) ASC, R.tempo_estimado';
            break;

        case 1:
            $tabela = 'carro';
            $select = 'SELECT * FROM carro C';
            break;

        case 2:
            $tabela = 'motorista';
            $select = '
            SELECT M.*, C.placa FROM motorista M
                Left outer Join motorista_carro MC on MC.CPF_motorista = M.CPF
                Left outer Join carro C on C.placa = MC.placa_carro
                ORDER BY ISNULL(C.placa) ASC, M.nome';
            break;
    }
?>
