<?php
    $to = $_GET["correo"];
    $asunto = $_GET["asunto"];
    $mensaje = $_GET["mensaje"];

if (isset($to) && isset($asunto) && isset($mensaje)) {
    mail($to,$asunto,$mensaje);
    echo "Correo enviado";
}
else{
    echo "Problemas";
}

?>