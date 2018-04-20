<!-- TODO: modals type (Rotas | Carros | Motoristas) -->

<!-- ADD -->
<div id="add" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Adicionar <?php echo $tabela; ?></h4>
        <form>
            <div class="row">
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
                    <select>
                      <option value="" selected>Nenhum</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Atribuir ao carro</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
        <button class="modal-action modal-close btn waves-effect waves-light" type="submit" name="action">Adicionar
            <i class="material-icons right">add</i>
        </button>
    </div>
</div>

<!-- EDIT -->
<div id="edit" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Editar <?php echo $tabela; ?></h4>
        <form>
            <div class="row">
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
                    <select>
                      <option value="" selected>Nenhum</option>
                      <option value="1">Option 1</option>
                      <option value="2">Option 2</option>
                      <option value="3">Option 3</option>
                    </select>
                    <label>Atribuir ao carro</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat left">Cancelar</a>
        <button class="modal-action modal-close btn waves-effect waves-light orange darken-1" type="submit" name="action">Editar
            <i class="material-icons right">edit</i>
        </button>
    </div>
</div>

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

<script>$('.modal').modal();</script>
