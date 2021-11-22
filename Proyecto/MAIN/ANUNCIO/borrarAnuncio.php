<?php
try{
    require "/BD/CONEXION/conexion.php";

    $anuncio = json_decode($_POST["json"]);
    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $ssql = "DELETE FROM Anuncio WHERE idAnuncio=?;";
    $st = $c->prepare($ssql);
    $respuesta=$st->execute($anuncio.idAnuncio);
    $c = null;
    echo $respuesta;
}catch(Exception $e){
    echo "#ERROR: ".$e->getMessage();
}
?>