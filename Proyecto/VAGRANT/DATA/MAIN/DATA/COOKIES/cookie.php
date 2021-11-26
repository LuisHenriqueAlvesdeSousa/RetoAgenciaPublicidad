<?php
    require_once dirname(__DIR__)."/VARIABLES_GLOBALES/vGlobales.php";

    if(isset($_POST["permiso"]) &&  $_POST["permiso"] == "true"){
        setcookie("cookies", "true", time()+365*24*60*60);
        $_GLOBAL["cookies"] = true;
        echo "aceptado";
    }else{
        $_GLOBAL["cookies"] = false;
    }

    if($_GLOBAL["cookies"] == null){    
        require_once dirname(dirname(dirname(__DIR__)))."/VIEW/ESTRUCTURA/ESTATICO/cookies.view.php";
    }
    
?>