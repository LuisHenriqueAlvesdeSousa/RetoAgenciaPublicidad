<?php
    require_once "../../../BD/PERFIL/editarPerfil.php";

    if(isset($_POST["usuario"])){
        echo updatePerfil();
    }


?>