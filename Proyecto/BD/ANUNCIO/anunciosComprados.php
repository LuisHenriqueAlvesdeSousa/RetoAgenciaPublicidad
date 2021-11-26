<?php
    try{
        require "/BD/CONEXION/conexion.php";
        require "/UML/Anuncio/Anuncio.php";

        $usuario = json_decode($_POST["json"]);

        $conexion = new Conexion();
        $c = $conexion.getConexion();
        $sql = "SELECT * FROM anuncio WHERE idPerfilComprador = ?;";
        $statement = $c->prepare($sql);
        $statement->setFechMode(PDO::FETCH_ASSOC);
        $valor = $statement->execute($usuario.idPerfil);

        if($valor){
            $listaAnuncios = Array();
            while($row = $statement->fetch()){
                $a = new Anuncio($row["idAnuncio"], $row["titulo"], $row["descripcion"], $row["precio"], $row["estado"], $row["pathFoto"], $row["fchPublicacion"], $row["idPerfil_Admin"], $row["idPerfil_Comprador"], $row["idCategoria"]);
                $listaAnuncios[] = $a;
            }

            echo json_encode($listaAnuncios);

        }else{
            throw new Exception("Historial de compra vacio.");
        }
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
?>