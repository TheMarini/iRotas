$(function () {
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $('.sidenav').sidenav();
    $('.modal').modal();
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

        //AJAX
        $.ajax({
            url: $(this).children('a').attr('href'),
            type: "GET",
            dataType: 'html',
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
    $("body > nav a[href='rotas']")[0].click();
});
