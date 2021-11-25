<?php
    require "/BD/CONEXION/conexion.php";
try{
    $anuncio = json_decode($_POST["anuncio"]);
    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $ssql = "UPDATE Anuncio SET titulo = ?, descripcion = ?, precio = ?, estado = ?, pathFoto=?, fchPublicacion=?, idPerfil_Admin=?, idPerfil_Comprador=?, idCategoria=? WHERE idAnuncio = ?;";
    $st = $c->prepare($ssql);
    $respuesta = $st->execute($anuncio.titulo, $anuncio.descripcion, $anuncio.precio, $anuncio.estado, $anuncio.pathFoto, $anuncio.fchPublicacion, $anuncio.idPerfil_Admin, $anuncio.idPerfil_Comprador, $anuncio.idCategoria);
    $c = null;
    if ($respuesta) return "aceptado";
    else return "";
}catch(Exception $e){
    echo "#ERROR: ".$e->getMessage();
}
?>