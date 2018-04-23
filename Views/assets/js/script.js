$(function () {
    //GLOBAL VARS
    var tab; //Rotas | Carros | Motoristas

    //Materialize Inits
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.dropdown-trigger').dropdown();

    //Nav items .click()
    $('body > nav, body > .sidenav').on('click', '.nav-item', function () {
        //Prevent Default
        event.preventDefault();

        //Disable old active
        $('.nav-item').each(function () {
            if ($(this).hasClass('active')) {
                $(this).toggleClass('active');
            }
        });

        //Active this
        $(this).toggleClass('active');

        //Set current tab
        tab = $('.nav-item.active').index();

        //AJAX
        $.ajax({
            url: 'router',
            type: "GET",
            dataType: 'html',
            data: ({
                tab: tab,
                SQL_type: null
            }),
            success: function (data) {
                $('main').fadeTo('fast', 0, function () {
                    $('main').html(data);
                }).fadeTo('fast', 1);
            },
            error: function (event) {
                console.log(event);
            }
        })

        $('.sidenav').sidenav('close');
    });

    //Auto Load
    $("body > nav a[href='motoristas']")[0].click();

    //Modals confirm button
    $('body').on('click', '.modal-footer button', function () {

        //Get Modal
        modal = $(this).parent().parent().attr('id');

        //Default data
        data = {
            tab: tab,
            SQL_type: modal
        };

        //Switch parameters
        switch (tab) {
            case 0:
                par = ['UUID', 'placa', 'motorista', 'carro', 'num_pecas', 'num_pessoas', 'tempo_estimado'];
                break;
            case 1:
                par = ['placa', 'modelo', 'motorista'];
                break;
            case 2:
                par = ['CPF', 'nome', 'carro'];
                break;
        }

        //TODO: organize | for/while...
        switch (modal) {
            case 'add':
                if (tab == 0) {
                    data[par[1]] = $('#' + modal + ' input[name="' + par[0] + '"]').val();
                    data[par[2]] = ($('#' + modal + ' select[name="' + par[2] + '"]').val() != '-') ? $('#' + modal + ' select[name="' + par[2] + '"]').val() : '';
                    data[par[3]] = ($('#' + modal + ' select[name="' + par[3] + '"]').val() != '-') ? $('#' + modal + ' select[name="' + par[3] + '"]').val() : '';
                    data[par[4]] = $('#' + modal + ' input[name="' + par[4] + '"]').val();
                    data[par[5]] = $('#' + modal + ' input[name="' + par[5] + '"]').val();
                    data[par[6]] = $('#' + modal + ' input[name="' + par[6] + '"]').val();
                } else { //Others has the same structure
                    data[par[0]] = $('#' + modal + ' input[name="' + par[0] + '"]').val();
                    data[par[1]] = $('#' + modal + ' input[name="' + par[1] + '"]').val();
                    data[par[2]] = ($('#' + modal + ' select[name="' + par[2] + '"]').val() != '-') ? $('#' + modal + ' select[name="' + par[2] + '"]').val() : '';
                }
                message = 'Adicionado';
                break;

            case 'edit':
                data['old_' + par[0]] = tabela(0);
                data['new_' + par[0]] = $('#' + modal + ' input[name="' + par[0] + '"]').val();
                data[par[1]] = $('#' + modal + ' input[name="' + par[1] + '"]').val();
                if (tab == 1){
                    data['old_' + par[2]] = tabela(3);
                }
                else{
                    data['old_' + par[2]] = tabela(2);
                }
                data['new_' + par[2]] = ($('#' + modal + ' select[name="' + par[2] + '"]').val() != '-') ? $('#' + modal + ' select[name="' + par[2] + '"]').val() : '';
                message = 'Editado';
                break;

            case 'delete':
                data[par[0]] = tabela(0);
                message = 'Deletado';
                break;
        }

        //AJAX
        $.ajax({
            url: 'router',
            type: "POST",
            dataType: 'html',
            data: (data),
            success: function (data) {
                $('.nav-item.active a').click();
                M.toast({
                    html: message + ' com sucesso!',
                    classes: 'rounded'
                });
            },
            error: function (event) {
                M.toast({
                    html: 'Algo deu errado :('
                });
            }
        })
    });

    //Get current row (dots clicked)
    var current_row;
    $('body').on('click', '.opt', function () {
        current_row = $(this).parent().parent();
    });

    //Get colum data
    function tabela(col) {
        return $(current_row).children('td').eq(col).text();
    }

    //Edit modal default valors on open
    $('body').on('click', '.modal-trigger[href="#edit"]', function () {
        switch (tab) {
            case 0:
                $('#edit.modal input[name="destino"]').val(tabela(1));
                $('#edit.modal input[name="num_pecas"]').val(tabela(5));
                $('#edit.modal input[name="num_pessoas"]').val(tabela(6));
                $('#edit.modal input[name="tempo_estimado"]').val(tabela(7));

                $('#edit.modal select[name="motorista"]').val(tabela(2));
                $('#edit.modal select[name="carro"]').val(tabela(4));

                //Re-initialize component
                $('#edit.modal select[name="motorista"]').formSelect('destroy');
                $('#edit.modal select[name="motorista"]').formSelect();

                $('#edit.modal select[name="carro"]').formSelect('destroy');
                $('#edit.modal select[name="carro"]').formSelect();
                break;

            case 1:
                $('#edit.modal input[name="placa"]').val(tabela(0));
                $('#edit.modal input[name="modelo"]').val(tabela(1));
                $('#edit.modal select[name="motorista"]').val(tabela(3));

                //Re-initialize component
                $('#edit.modal select[name="motorista"]').formSelect('destroy');
                $('#edit.modal select[name="motorista"]').formSelect();
                break;

            case 2:
                $('#edit.modal input[name="CPF"]').val(tabela(0));
                $('#edit.modal input[name="nome"]').val(tabela(1));
                $('#edit.modal select[name="carro"]').val(tabela(2));

                //Re-initialize component
                $('#edit.modal select[name="carro"]').formSelect('destroy');
                $('#edit.modal select[name="carro"]').formSelect();
                break;
        }
    });

    //Debug input labels
    M.updateTextFields();
});
