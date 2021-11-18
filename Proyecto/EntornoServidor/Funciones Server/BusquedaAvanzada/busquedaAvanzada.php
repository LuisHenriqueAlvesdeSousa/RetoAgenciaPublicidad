<?php
    require "basedatos.php";

    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    $producto = $_GET["producto"];
    $categoria = $_GET["categoria"];
    $precio = $_GET["precio"];
    $provincia = $_GET["provincia"];

    filtrar($categoria,$precio,$provincia,$producto, $dbh);

    function filtrarProducto($sql, $producto, $dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $parametro = ["$producto%"];
        $stmt->execute($parametro);

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
        }
    }

    function mostrarCategoria($dbh){
        $stmt = $dbh->prepare("SELECT DISTINCT nombre FROM Categoria");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<option value=".$row->nombre.">".$row->nombre."</option>";
        }
    }

    function mostrarProvincias($dbh){
        $stmt = $dbh->prepare("SELECT DISTINCT ubicacion FROM Anuncio");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<option value=".$row->ubicacion.">".$row->ubicacion."</option>";
        }
    }

    function filtrar($categoria,$precio,$provincia,$producto, $dbh){
        $sql = "WHERE titulo LIKE ?";
        if (isset($categoria) && $categoria != "") {
            $sql .= " AND categoria = '$categoria'";
        }
        elseif (isset($precio) && $precio != ""){
            switch($precio){
                case "menos100":
                    $sql .= " AND precio < 100";
                break;
                case "entre100-300" :
                    $sql .= " AND precio BETWEEN 100 AND 300";
                break;  
                case "mas300" :
                    $sql .= " AND precio > 300" ;
                break;     
            }
        }
        elseif (isset($provincia) && $provincia != ""){
            $sql .= " AND ubicacion = '$provincia'";
        }

        filtrarProducto($sql, $producto, $dbh);
    }

    require "busquedaAvanzada.view.php";
?>