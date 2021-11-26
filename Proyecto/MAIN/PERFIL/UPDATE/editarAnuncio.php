<?php
    require_once "../../../BD/ANUNCIO/editarAnuncio.php";

    if(isset($_POST["anuncio"])){
        echo updateAnuncio();
    }


?>