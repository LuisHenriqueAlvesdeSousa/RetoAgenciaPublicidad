<?php
    //Creación objeto anuncio a partir de Formulario
    
    
    
    /*
    require "/BD/CONEXION/conexion.php";

    $anuncio = json_decode($_POST["json"]);

    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $sql = "INSERT INTO Anuncio (titulo, descripcion, precio, fchPublicacion, idPerfil_Admin, idCategoria) VALUES (?,?,?,?,?,?);";
    $statement = $c->prepare($sql);
    $respuesta = false;
    foreach($anuncio->{"datoPerfil"} as $dAnuncio){
        $statement->bindParam(1, $dAnuncio->{"titulo"}, PDO::PARAM_STR);
        $statement->bindParam(2, $dAnuncio->{"descripcion"}, PDO::PARAM_STR);
        $statement->bindParam(3, $dAnuncio->{"precio"}, PDO::PARAM_FLOAT);
        $statement->bindParam(4, $dAnuncio->{"fchPublicacion"}, PDO::PARAM_DATE);
        $statement->bindParam(5, $dAnuncio->{"idPerfil_Admin"}, PDO::PARAM_INT);
        $statement->bindParam(6, $dAnuncio->{"idCategoria"}, PDO::PARAM_INT);
        $respuesta = $statement->execute();
    }

    echo $respuesta;
    */
?>