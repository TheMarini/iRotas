<!-- TODO: Only one switch -->

<table class="highlight centered z-depth-1">
    <thead>
        <tr>
            <!-- Rotas -->
            <?php switch($tab): case 0:?>
                <th>Destino</th>
                <th>Motorista</th>
                <th>Carro</th>
                <th>Nº de Peças</th>
                <th>Nº de Pessoas</th>
                <th></th>
                
            <!-- Carros -->
            <?php break; case 1:?>
                <th>Placa</th>
                <th>Modelo</th>
                <th>Motorista Associado</th>
                <th>Status</th>
                <th></th>
                
            <!-- Motoristas -->
            <?php break; case 2:?>
                <th>CPF</th>
                <th>Nome</th>
                <th>Carro Associado</th>
                <th></th>
            <?php break; endswitch; ?>
        </tr>
    </thead>

    <tbody>
                
        <!-- Rotas -->
        <?php switch($tab): case 0: ?>
            <tr>            
                <td>Pátio Savassi</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td>12</td>
                <td>3</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>            
                <td>Pátio Savassi</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td>12</td>
                <td>3</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>            
                <td>Pátio Savassi</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td>12</td>
                <td>3</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
                
        <!-- Carros -->
        <?php break; case 1:?>
            <tr>
                <td>HEX 0049</td>
                <td>Corsa Unix 2.0</td>
                <td>Paulo Costa</td>
                <td>Garagem</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>
                <td>HEX 0049</td>
                <td>Corsa Unix 2.0</td>
                <td>Paulo Costa</td>
                <td>Garagem</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>
                <td>HEX 0049</td>
                <td>Corsa Unix 2.0</td>
                <td>Paulo Costa</td>
                <td>Garagem</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
                
        <!-- Motoristas -->
        <?php break; case 2:?>
            <tr>            
                <td>582.735.465-07</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>            
                <td>582.735.465-07</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
            <tr>            
                <td>582.735.465-07</td>
                <td>Paulo Costa</td>
                <td>HEX 0049</td>
                <td><a class="opt dropdown-trigger" data-target='options' href="#options"><i class="material-icons">more_horiz</i></a></td>
            </tr>
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