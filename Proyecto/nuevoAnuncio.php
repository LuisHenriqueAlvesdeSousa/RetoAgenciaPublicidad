<?php
include "conexion.php";
//Comprobación de que los campos obligatorios contienen datos
if($_POST){
    //Inserto en la BBDD
    $ssql = "insert into Anuncio() values('". $_POST["titulo"] ."', '". $_POST["descripcion"]")"
    if(mysql_query($ssql)){
        
    }
}else{
    //Mostrar formulario
}

require "nuevoAnuncio.view.php";
?>