<?php
require "/BD/CONEXION/conexion.php";
try{
    $interaccion = json_decode($_POST["json"]);

    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $ssql = "UPDATE Interaccion SET favorito=1 WHERE idAnuncio IN (SELECT idAnuncio FROM Anuncio WHERE idAnuncio=?);";
    $st = $c->prepare($ssql);
    $respuesta = $st->execute($interaccion.favorito);
    $c = null;
    if ($respuesta) return "aceptado";
    else return "";
}
catch(Exception $e){
    echo $e->getMessage(); 
}
?>