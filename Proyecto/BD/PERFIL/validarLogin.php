<?php
    require "/BD/CONEXION/conexion.php";
    
    $usuario = json_decode("json");

    $conexion = new Conexion();
    $c = $conexion.getConexion();
    $sql = "SELECT * FROM persona;";
    $statement = $c->prepare($sql);
    $valor = $statement->execute();

    if($valor){
        while($resultado = $statement->fetch(PDD::FETCH_ASSOC)){
            
        }
    }
?>