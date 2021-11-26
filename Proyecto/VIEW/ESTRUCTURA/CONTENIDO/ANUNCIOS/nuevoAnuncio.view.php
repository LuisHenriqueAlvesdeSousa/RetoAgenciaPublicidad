<!DOCTYPE html>
<html lang="es">
<?php
    //Le paso la variable para el titulo de la página en cuestión
    $title_pag="LoVendo - Nuevo Anuncio";
    require "./VIEW/ESTRUCTURA/ESTATICO/head.meta.php";

?>
    
<body>

<?php 

    require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php";
    require "./VIEW/ESTRUCTURA/ESTATICO/nav.view.php";

?>
    <div id="crearAnuncio">
        <h1>Crear Anuncio</h1>
        <form name="formularioAnuncio" action="<?echo $_SERVER["PHP_SELF"]?>" type="POST" id="formNuevoAn" enctype="multipart/form-data">
            <!--Introducir datos del anuncio-->
            <input type="text" name="titulo" id="tituloAnuncio"placeholder="Titulo*" />
            <textarea cols="30" rows="10" name="descripcion" id="descAnuncio" placeholder="Descripcion*"></textarea>
            <input type="text" name="precio" id="precioAnuncio" placeholder="Precio*">
            <select name="selectCat" id="selCategorias" required>
                <option value="01" selected>Seleccione una categoria*</option>
                <!--Lleno la select-->
                <?php
                $ssql = "SELECT * FROM Categoria";
                $rs = mysql_query($ssql);
                while($fila = mysql_fetch_array($rs)){
                    echo "<option value=".$fila["idCategoria"].">".$fila["nombre"]."</option>";
                }
                mysql_free_result($rs);
                ?>
            </select>
            <input type="file" id="fotoAnuncio" name="imagen"/>
            <label>¿Quieres publicar este anuncio?</label>
            <input type="button" value="Publicar" id="botonPublicar" name="botonPublicar"/>
            <!--Subir anuncio a la base de datos y mandar a perfil-->
            <input type="button" value="Cancelar" id="botonCancel" name="botonCancel"/> 
            <!--Cancelar y retornar index-->
            <label>Los campos marcados con * son obligatorios</label>
        </form>
    </div> 
<?php
require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"
?>
<script src="./MAIN/ANUNCIO/nuevoAnuncio.js"></script>
</body>
</html>


