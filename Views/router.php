<?php
    //Auto method
    $method = '_' . $_SERVER['REQUEST_METHOD'];

    //Get current tab
    $tab = $$method['tab'];

    include('Models/SQL.php');

    if ($method == '_GET'){
        if($tab == 0) {
            echo '<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyARnpyiMOVlSIhmzMCtoSI_2U2DG8mMxh8
                &q=Raja+Valley+Santa Lucia+Belo Horizonte+MG" allowfullscreen></iframe>';
        }
        if($result->num_rows > 0) {
            include('search.php');
            include('tabela.php');
        }
        else{
            $artigo;
            switch($tab){
                case 0:
                    $artigo = ['a', 'a'];
                    break;

                case 2:
                case 3:
                    $artigo = ['', 'o'];
                    break;
            }
            echo '<h3 class="text-muted center">' . "Não há nenhum$artigo[0] $tabela cadastrad$artigo[1] :( </h3>";
        }
        include('modals.php');
    }

    $MySQL->close();
?>
