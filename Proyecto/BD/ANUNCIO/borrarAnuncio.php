<?php
require "/BD/CONEXION/conexion.php";
function deleteAnuncio(){
    try{
            $anuncio = json_decode($_POST["anuncio"]);
            $conexion = new Conexion();
            $c = $conexion.getConexion();
            $ssql = "DELETE FROM Anuncio WHERE idAnuncio=?;";
            $st = $c->prepare($ssql);
            $respuesta=$st->execute($anuncio.idAnuncio);
            $c = null;
            if($respuesta) 
                return "aceptado";
            else return "";
        }catch(Exception $e){
            echo "#ERROR: ".$e->getMessage();
    }   
}
?>