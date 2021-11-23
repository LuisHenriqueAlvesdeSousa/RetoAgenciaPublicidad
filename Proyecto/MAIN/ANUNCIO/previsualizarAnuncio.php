<?php
//Construir Div a partir del objeto Anuncio

//Si compra llamar a función insertar en BBDD

//Si cancela retornar a index
    require "/BD/CONEXION/conexion.php";
    $conexion = new Conexion();
    $cnn = $conexion->getConexion();
    
    $sql = "SELECT * FROM ANUNCIO WHERE IDANUNCIO"
    $statement = $cnn->prepare($sql);
    $valor = $statement->execute();
    if($valor){
        while($resultado = $statement->fetch(PDO::FETCH_ASSOC)){
            $data["data"][] = $resultado;
        }
        echo json_encode($data);
    }else{
        echo "error";
    }
    $conexion = null;
    require "previsualizarAnuncio.view.php";
?>