<!-- TODO: Only one switch -->
<table class="highlight centered z-depth-1 responsive-table">
    <thead>
        <tr>
            <!-- Rotas -->
            <?php switch($tab): case 0:?>
                <th>Origem</th>
                <th>Destino</th>
                <th>Motorista</th>
                <th>Carro</th>
                <th>Nº de Peças</th>
                <th>Nº de Pessoas</th>
                <th>Tempo Estimado</th>

            <!-- Carros -->
            <?php break; case 1:?>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Status</th>

            <!-- Motoristas -->
            <?php break; case 2:?>
                <th>CPF</th>
                <th>Nome</th>
                <th>Carro Associado</th>
            <?php break; endswitch; ?>

            <th></th>
        </tr>
    </thead>

    <tbody>
        <!-- Rotas -->
        <?php switch($tab): case 0: ?>
            <?php while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td hidden class="hide"><?php echo $row['UUID']; ?></td>
                    <td><?php echo $row['origem']; ?></td>
                    <td><?php echo $row['destino']; ?></td>
                    <td hidden class="hide"><?php echo $row['CPF']; ?></td>
                    <td><?php echo ($row['motorista'] != null) ? $row['motorista'] : '-'; ?></td>
                    <td><?php echo ($row['placa'] != null) ? $row['placa'] : '-';?></td>
                    <td><?php echo $row['num_pecas']; ?></td>
                    <td><?php echo $row['num_pessoas']; ?></td>
                    <td><?php echo $row['tempo_estimado']; ?></td>
                    <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
                </tr>
            <?php endwhile; ?>

        <!-- Carros -->
        <?php break; case 1:?>
            <?php while($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['placa']; ?></td>
                <td><?php echo $row['modelo']; ?></td>
                <td>-</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <?php endwhile; ?>

        <!-- Motoristas -->
        <?php break; case 2:?>
            <?php while($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['CPF']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo ($row['placa'] != null) ? $row['placa'] : '-'; ?></td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <?php endwhile; ?>
        <?php break; endswitch; ?>
    </tbody>
</table>

<!-- Dropdown -->
<ul id='options' class='dropdown-content'>
    <li><a class="modal-trigger" href="#edit"><i class="material-icons">edit</i>editar</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a class="modal-trigger" href="#delete"><i class="material-icons">delete</i>deletar</a></li>
</ul>


<script>$('.dropdown-trigger').dropdown();</script>
