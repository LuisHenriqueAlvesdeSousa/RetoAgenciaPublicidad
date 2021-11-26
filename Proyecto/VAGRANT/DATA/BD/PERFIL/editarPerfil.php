<?php
            require "/BD/CONEXION/conexion.php";
            require "MAIN/CRYPTOR/psswdHashing.php"

            function updatePerfil(){
    try{



        $usuario = json_decode($_POST["usuario"]);

        $conexion = new Conexion();
        $c = $conexion.getConexion();
        $sql = "UPDATE perfil SET usuario = ?, password = ?, email = ?, direccion = ?, provincia = ?, localidad = ? , pais = ?, cp = ? WHERE idPerfil = ?);";
        $statement = $c->prepare($sql);
        $respuesta = $statement->execute($usuario.usuario, encriptar($usuario.password), $usuario.email, $usuario.direccion , $usuario.provincia , $usuario.localidad , $usuario.pais , $usuario.cp, $usuario.idPerfil);

        $c = null;
        if($respuesta) return "aceptado";
        else return "";
        
    }catch(Exception $e){
        echo "#ERROR: ".$e->getMessage();
    }
}
    
?>