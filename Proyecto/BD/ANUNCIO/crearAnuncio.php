<?php
    //Inserción en BBDD
    try{
    require "/BD/CONEXION/conexion.php";

    $anuncio = json_decode($_POST["json"]);

    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $sql = "INSERT INTO Anuncio (titulo, descripcion, precio, pathFoto, fchPublicacion, idPerfil_Admin, idCategoria) VALUES (?,?,?,?,?,?,?);";
    $st = $c->prepare($sql);
    $respuesta = $st->execute($anuncio.titulo, $anuncio.descripcion, $anuncio.precio, $anuncio.pathFoto, $anuncio.fchPublicacion, $anuncio.idPerfil_Admin, $anuncio.idCategoria);
    $c=null;
    echo $respuesta;
    }catch(Exception $e){
        echo "#ERROR: ".$e->getMessage();
    }
?>