$(function () {
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.dropdown-trigger').dropdown();

    //Nav items .click()
    $('body > nav').on('click', '.nav-item', function () {
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

        //Get current tab
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
    });

    //Auto Load
    $("body > nav a[href='motoristas']")[0].click();

    //Modals confirm button
    $('body').on('click', '.modal-footer button', function () {

        //Get current tab
        tab = $('.nav-item.active').index();

        //Get Modal
        modal = $(this).parent().parent().attr('id');

        //Default data
        data = {
            tab: tab,
            SQL_type: modal
        };

        //New datas
        switch (modal) {
            case 'add':
                data['CPF'] = $('#' + modal + ' .CPF').val();
                data['nome'] = $('#' + modal + ' .nome_motorista').val();
                break;
            case 'edit':
                break;
            case 'delete':
                data['CPF'] = tabela(0);
                break;
        }

        //AJAX
        $.ajax({
            url: 'router',
            type: "POST",
            dataType: 'html',
            data: (data),
            success: function (data) {
                $("body > nav a[href='motoristas']")[0].click();
            },
            error: function (event) {
                console.log(event);
            }
        })
    });

    //Get current row (dots clicked)
    var current_row;
    $('body').on('click', '.opt', function () {
        current_row = $(this).parent().parent();
    });

    //Get colum data
    function tabela(col){
        return $(current_row).children('td').eq(col).text();
    }

    //Debug input labels
    M.updateTextFields();
});
