<?php

    require_once __DIR__."/MAIN/ESTATICO/master.php";
    $destinoCredenciales = comprobarCredenciales("/VIEW/ESTRUCTURA/CONTENIDO/INDEX/index.view.php");
    require_once __DIR__.$destinoCredenciales;
?>

