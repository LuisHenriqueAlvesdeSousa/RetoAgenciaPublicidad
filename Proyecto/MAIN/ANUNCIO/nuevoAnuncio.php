<?php
    require "/UML/Anuncio/Anuncio.php";
    require "/EXCEPTIONS/mensajeError.php";
    require "/BD/ANUNCIO/crearAnuncio.php";

    if(isset($_POST["anuncio"])){
        $an = json_decode($_POST["anuncio"]);
        $anuncio = new Anuncio(null, $an->titulo, $an->descripcion, $an->precio, null, $an->pathFoto, $an->fchPublicacion, $an->idPerfil_Admin, null, $an->idCategoria);
    }

    require "/VIEW/ESTRUCTURA/CONTENIDO/ANUNCIO/nuevoAnuncio.view.php";
?>