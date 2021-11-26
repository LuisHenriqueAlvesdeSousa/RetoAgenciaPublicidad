<?php
    require_once "../../../BD/ANUNCIO/borrarAnuncio.php";

    if(isset($_POST["anuncio"])){
        echo deleteAnuncio();
    }


?>