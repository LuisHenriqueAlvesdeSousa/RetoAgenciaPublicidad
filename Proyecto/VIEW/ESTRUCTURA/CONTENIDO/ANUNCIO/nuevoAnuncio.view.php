<!DOCTYPE html>
<html lang="en">
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
    <section id="crearAnuncio">
        <h1>Crear Anuncio</h1>
    	<form name="formularioAnuncio" action="<?echo $_SERVER["PHP_SELF"]?>" type="POST" id="formAnuncio">
            <!--Introducir datos del anuncio-->
            <input type="text" name="titulo" id="tituloAnuncio"placeholder="Titulo" /><label>*</label>
            <textarea cols="30" rows="10" name="descripcion" id="descAnuncio" placeholder="Descripcion"></textarea><label>*</label>
            <input type="text" name="precio" id="precioAnuncio" placeholder="Precio"><label>*</label>
            <select name="selectCat" id="selCategorias">
                <!--Lleno la select-->
                <?php
                $ssql = "select * from Categoria";
                $rs = mysql_query($ssql);
                while($fila = mysql_fetch_array($rs)){
                    echo "<option value=".$fila["idCategoria"].">".$fila["nombre"]."</option>";
                }
                mysql_free_result($rs);
                ?>
            </select><label>*</label>
            <input type="file" id="fotoAnuncio" name="imagen"/>
            <input type="submit" name="crear" id="publicarAnuncio" value="Publicar"/>

            <label>Los campos marcados con * son obligatorios</label>
        </form>
    </section>  

<?php

require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"

?>

</body>
</html>