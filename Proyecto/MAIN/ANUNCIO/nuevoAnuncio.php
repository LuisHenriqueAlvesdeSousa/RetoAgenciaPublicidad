<?php
    require "/BD/CONEXION/conexion.php";
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    llenarSelect();
    //Poblar la select

    function llenarSelect(){
        $ssql = "SELECT * FROM Categoria";
        $rs = mysql_query($ssql);
        while($fila = mysql_fetch_array($rs)){
            echo "<option value=".$fila["idCategoria"].">".$fila["nombre"]."</option>";
        }
        mysql_free_result($rs);
    }
//Comprobación de que los campos obligatorios contienen datos


require "nuevoAnuncio.view.php";
?>