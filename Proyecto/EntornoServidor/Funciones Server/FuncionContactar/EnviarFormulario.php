<?php
    $to = "guillermo.mediero@ikasle.egibide.org
    ";
    $nombre = $_GET["nombre"];
    $asunto = $_GET["asunto"];
    $correo = $_GET["correo"];
    $mensaje = $_GET["mensaje"];
    $contenido = "Nombre: ". $nombre . "\nCorreo: " . $correo . "\n" .$mensaje;

    mail($to,$asunto,$contenido);



require "EnviarFormulario.view.php";
?>