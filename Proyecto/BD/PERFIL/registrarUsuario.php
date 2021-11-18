<?php
    
    require "/BD/CONEXION/conexion.php";

    $usuario = json_decode($_POST["json"]);

    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $sql = "INSERT  INTO perfil(usuario, password, email) VALUES (?,?,?);";
    $stament = $c->prepare($sql);
    $respuesta = false;
    foreach($usuario->{"datoPerfil"} as $dPerfil){
        statement->bindParam(1, $dPerfil->{"usuario"}, PDO::PARAM_STR);
        statement->bindParam(2, $dPerfil->{"password"}, PDO::PARAM_STR);
        statement->bindParam(3, $dPerfil->{"email"}, PDO::PARAM_STR);
        $respuesta = $statement->execute();
    }

    echo $respuesta;
    
?>