<!-- TODO: Only one switch -->

<?php 
    switch ($tab){
        case 0: 
            $title = 'Rotas';
            break;
        case 1: 
            $title = 'Carros';
            break;
        case 2: 
            $title = 'Motoristas';
            break;
    }
?>

<ul class="search collapsible">
    <li>
        <div class="collapsible-header">
            <i class="material-icons">filter_list</i>Filtrar <?php echo $title; ?>
        </div>
        <div class="collapsible-body white">
            <form>
                <div class="row">
                   
                    <!-- Rotas -->
                    <?php switch($tab): case 0: ?>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">map</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Destino">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Motorista">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">directions_car</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Carro">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">format_list_numbered</i>
                            <input id="icon_prefix" type="number" class="validate" placeholder="Nº de Peças">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">format_list_numbered</i>
                            <input id="icon_prefix" type="number" class="validate" placeholder="Nº de Pessoas">
                        </div>
                        
                    <!-- Carros -->
                    <?php break; case 1: ?>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">dvr</i>
                            <input id="icon_prefix" type="number" class="validate" placeholder="Placa">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">directions_car</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Modelo">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Motorista">
                        </div>
                        <div class="input-field col s6">
                           <i class="material-icons prefix">merge_type</i>
                            <select>
                              <option value="" selected>Nenhum</option>
                              <option value="1">Garagem</option>
                              <option value="2">Parado</option>
                              <option value="3">Movimento</option>
                            </select>
                            <label>Status</label>
                        </div>
                        
                    <!-- Motoristas -->
                    <?php break; case 2: ?>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">person</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Nome">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">confirmation_number</i>
                            <input id="icon_prefix" type="number" class="validate" placeholder="CPF">
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">directions_car</i>
                            <input id="icon_prefix" type="text" class="validate" placeholder="Carro">
                        </div>
                    <?php break; endswitch; ?>
                </div>

                <!-- TODO: align right -->
                <button id="ola" class="btn waves-effect waves-light" type="submit" name="action">Procurar
                    <i class="material-icons right">search</i>
                </button>
            </form>
        </div>
    </li>
</ul>

<script>$('.collapsible').collapsible(); $('select').formSelect();</script>