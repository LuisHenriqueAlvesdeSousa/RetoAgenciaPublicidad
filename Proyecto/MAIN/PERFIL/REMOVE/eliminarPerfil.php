<?php
    require_once "../../../BD/PERFIL/borrarPerfil.php";

    if(isset($_POST["usuario"])){
        echo deletePerfil();
    }


?>