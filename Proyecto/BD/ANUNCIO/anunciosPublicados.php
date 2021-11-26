<?php
    try{
        require "/BD/CONEXION/conexion.php";
        require "/UML/Anuncio/Anuncio.php";

        $usuario = json_decode($_POST["json"]);

        $conexion = new Conexion();
        $c = $conexion.getConexion();
        $sql = "SELECT * FROM anuncio WHERE idAnuncio IN (SELECT idAnuncio FROM interaccion WHERE idPerfil = ?);";
        $statement = $c->prepare($sql);
        $valor = $statement->execute($usuario.idPerfil);

        if($valor){
            $listaAnunciosPublicados = Array();
            while($row = $statement->fetch()){
                $a = new Anuncio($row["idAnuncio"], $row["titulo"], $row["descripcion"], $row["precio"], $row["estado"], $row["pathFoto"], $row["fchPublicacion"], $row["idPerfil_Admin"], $row["idPerfil_Comprador"], $row["idCategoria"]);
                $listaAnunciosPublicados[] = $a;
            }
            $c = null;
            echo json_encode($listaAnunciosFav);
            
        }else{
            $c = null;
            throw new Exception("No tienes ningún anuncio publicado.");
        }
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
?>