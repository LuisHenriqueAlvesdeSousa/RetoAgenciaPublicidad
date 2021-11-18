<?php

<!--Logica-->

    session_start();
    if(empty($_SESSION["cookies"])){
        mostrarContCookies(true);
    }else{
        mostrarContCookies(false);
    }

    function mostrarContCookies (block){
        if(block) {$contCookies = "\"display:block\""}
        else {$contCookies = "\"display:none\""}
    }

    
<!--Estructura-->

require "./VIEW/ESTRUCTURA/CONTENIDO/INDEX/index.view.php"

?>

