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

</div>
<div id="confirmarEnvío">
    <form>
        <h1>¿Quieres publicar este anuncio?</h1>
        <input type="button" value="Publicar" id="botonPublicar" name="botonPublicar"/>
        <input type="button" value="Cancelar" id="botonCancel" name="botonCancel"/> 
    </form>
</div>
</section>
<script>
    //Subir objeto anuncio creado a la base de datos
      $(function(){
         listar();
      });  
      function listar(){
        __ajax("previsualizarAnuncio.php", "")
        .done(function(info){
            var anuncios = JSON.parse(info);
            var html = ""
        });
      }
      function __ajax(){
          $.ajax({
              "method": "POST",
              "url": url,
              "data": data
          })
          return ajax;
      }
</script>
<?php
    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"
?>
</body>
</html>