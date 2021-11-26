<?php

        require "./BD/CONEXION/conexion.php";
        require "./UML/Perfil/Perfil.php";
        require "./MAIN/CRYPTOR/psswdHashing.php";
        require "./MAIN/DATA/SESSION/session.php";

        function login($usuario){
            try{
                $conexion = new Conexion();
                $c = $conexion.getConexion();
                $sql = "SELECT * FROM perfil WHERE usuario = ? AND password = ?;";
                $statement = $c->prepare($sql);
                $respuesta = $statement->execute($usuario->usuario, encriptar($usuario->password));

                if($respuesta){
                    while($row = statement.fetch()){
                        $perfilActual = new Perfil($row["idPerfil"], $row["usuario"], $row["password"], $row["email"], $row["telefono"], $row["direccion"], $row["provincia"], $row["localidad"], $row["pais"], $row["cp"]);
                    }
                    
                    guardarSessionPerfil($perfilActual);
                    $c = null;
                    return true;
                    
                }else{
                    throw new Exception("#ERROR:0001");
                }
            }catch(Exception $e){
                $c = null;
                $perfilActual = new Perfil(null, null, null, null, null, null, null, null, null, null);
                guardarCookiesPerfil($perfilActual);
                $errorActual = $e->getMessage();
                return false;
            }
                
        } 

?>