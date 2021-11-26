<?php
            require "./BD/CONEXION/conexion.php";
    function deletePerfil(){
    try{


        $usuario = json_decode($_POST["usuario"]);

        $conexion = new Conexion();
        $c = $conexion.getConexion();
        $sql = "DELETE FROM perfil WHERE idPerfil = ?;";
        $statement = $c->prepare($sql);
        $respuesta = $statement->execute($usuario.idPerfil);

        $c = null;
        
        if($respuesta) return "aceptado";
        else return "";

    }catch(Exception $e){
        echo "#ERROR: ".$e->getMessage();
    }
}
?>