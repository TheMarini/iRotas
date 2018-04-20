<iframe
  width="100%"
  height="450"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyARnpyiMOVlSIhmzMCtoSI_2U2DG8mMxh8
    &q=Raja+Valley+Santa Lucia+Belo Horizonte+MG" allowfullscreen>
</iframe>

<?php 
    //Actual tab/content
    $tab = 0;

    include('Models/SQL.php');

    $result = $MySQL->query("SELECT * FROM destino");
    $empty = ($result->num_rows == 0) ? true : false;

    if (!$empty) :

        include('search.php');
        include('tabela.php');

    else:
?>

<h3 class="text-muted center">Não há nenhuma máquina cadastrada :(</h3>

<?php
    endif;
    $MySQL->close();
?>
