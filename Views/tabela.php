<table class="striped centered z-depth-1">
    <thead>
        <tr>
            <?php switch($tab): case 1:?>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Motorista Associado</th>
            <?php break; case 2:?>
                <th>CPF</th>
                <th>Nome</th>
                <th>Carro Associado</th>
            <?php break; endswitch; ?>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
        </tr>
        <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
        </tr>
        <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
        </tr>
    </tbody>
</table>