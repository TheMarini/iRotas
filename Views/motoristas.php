<?php 
    //Actual tab/content
    $tab = 2;

    include('Models/SQL.php');

    $result = $MySQL->query("SELECT * FROM motorista");
    $empty = ($result->num_rows == 0) ? true : false;

    if (!$empty) :

        include('search.php');
        include('tabela.php');

    else:
?>

<h3 class="text-muted center">Não há nenhum motorista cadastrado :(</h3>

<?php
    endif;
    $MySQL->close();
?>
