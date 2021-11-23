<!DOCTYPE html>
<html lang="es">
<?php
    $title_pag="LoVendo - Prev Anuncio";
    require "./VIEW/ESTRUCTURA/ESTATICO/head.meta.php";
?>
<body>
<?php 

    require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php";
    require "./VIEW/ESTRUCTURA/ESTATICO/nav.view.php";

?>
<section id="prevAnuncio">
<div id="montarAnuncio">
    <!--Construir div de anuncio a partir de objeto-->
</div>
<div id="confirmarEnvío">
    <form>
        <h1>¿Quieres publicar este anuncio?</h1>
        <input type="button" value="Publicar" id="botonPublicar" name="botonPublicar"/>
        <!--Subir anuncio a la base de datos y mandar a perfil-->
        <input type="button" value="Cancelar" id="botonCancel" name="botonCancel"/> 
        <!--Cancelar y borrar anuncio-->
    </form>
</div>
</section>
<?php
    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"
?>
<script src="./MAIN/ANUNCIO/previsualizarAnuncio.js"></script>
</body>
</html>