<?php
    require "basedatos.php";

    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    $producto = $_GET["producto"];

    function filtrarProducto($producto, $dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio WHERE titulo LIKE ? ");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $parametro = ["$producto%"];
        $stmt->execute($parametro);

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
        }
    }

    require "busquedaAvanzada.view.php";
?>