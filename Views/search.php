<ul class="search collapsible">
    <li>
        <div class="collapsible-header">
            <i class="material-icons">filter_list</i>Filtrar Motorista
        </div>
        <div class="collapsible-body white">
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
                        <input id="icon_prefix" type="text" class="validate" placeholder="Carro">
                    </div>
                </div>

                <button class="btn waves-effect waves-light" type="submit" name="action">Procurar
                    <i class="material-icons right">search</i>
                </button>
            </form>
        </div>
    </li>
</ul>

<script>$('.collapsible').collapsible();</script>