<!-- ADD -->
<?php
    $type = ['add', 'edit'];
    $title = ['Adicionar', 'Editar'];
    $color = ['', 'orange darken-1'];
    for ($i = 0; $i <= 1; $i++) :
?>
<div id="<?php echo $type[$i]; ?>" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4><?php echo "$title[$i] $tabela"; ?></h4>
        <form>
            <?php switch($tab): case 0: ?>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">map</i>
                        <input name="destino" type="text" class="validate">
                        <label>Destino</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person</i>
                        <select name="motorista">
                            <option value="" selected>-</option>
                            <?php $result = $MySQL->query('SELECT CPF, nome from motorista'); ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <option value="<?php echo $row['CPF']; ?>"><?php echo $row['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label>Motorista</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">directions_car</i>
                        <select name="carro">
                            <option value="" selected>-</option>
                            <?php $result = $MySQL->query('SELECT placa from carro'); ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <option value="<?php echo $row['placa']; ?>"><?php echo $row['placa']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label>Carro</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">format_list_numbered</i>
                        <input name="num_pecas" type="number" class="validate">
                        <label>Nº de Peças</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">format_list_numbered</i>
                        <input name="num_pessoas" type="number" class="validate">
                        <label>Nº de Pessoas</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">av_timer</i>
                        <input name="tempo_estimado" type="text" class="timepicker">
                        <label>Tempo Estimado</label>
                    </div>
                </div>
            <?php break; case 1: ?>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">dvr</i>
                        <input name="placa" type="text" class="validate">
                        <label>Placa</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">directions_car</i>
                        <input name="modelo" type="text" class="validate">
                        <label>Modelo</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person</i>
                        <select name="motorista">
                            <option value="" selected>-</option>
                            <?php $result = $MySQL->query('SELECT CPF, nome from motorista'); ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <option value="<?php echo $row['CPF']; ?>"><?php echo $row['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label>Atribuir ao motorista</label>
                    </div>
                </div>
            <?php break; case 2: ?>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input name="nome" type="text" class="validate" data-length="30" max="30" required>
                        <label>Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">confirmation_number</i>
                        <input name="CPF" type="text" class="validate" data-length="15" max="15" required>
                        <label>CPF</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">directions_car</i>
                        <select name="carro">
                            <option value="" selected>-</option>
                            <?php $result = $MySQL->query('SELECT placa from carro'); ?>
                            <?php while($row = $result->fetch_assoc()) : ?>
                                <option value="<?php echo $row['placa']; ?>"><?php echo $row['placa']; ?></option>
                            <?php endwhile; ?>
                        </select>
                        <label>Atribuir ao carro</label>
                    </div>
                </div>
            <?php break; endswitch; ?>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
        <button class="modal-action modal-close btn waves-effect waves-light <?php echo $color[$i]; ?>" type="submit"><?php echo $title[$i]; ?>
            <i class="material-icons right"><?php echo $type[$i]; ?></i>
        </button>
    </div>
</div>
<?php endfor; //orange darken-1 ?>

<!-- DELETE -->
<div id="delete" class="modal bottom-sheet">
    <div class="modal-content">
        <p>Tem certeza que deseja <span>deletar</span> esse <?php echo $tabela; ?>?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
        <button class="modal-action modal-close btn waves-effect waves-light red" type="submit" name="action">Deletar
            <i class="material-icons right">delete</i>
        </button>
    </div>
</div>

<script>$('.modal').modal(); $('.timepicker').timepicker({twelvehour: false}); $('input[data-length]').characterCounter(); M.updateTextFields();</script>
