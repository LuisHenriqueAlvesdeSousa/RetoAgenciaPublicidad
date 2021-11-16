<?php
    require "basedatos.php";

    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    $categoria = $_GET["categoria"];
    $precio = $_GET["precio"];
    $provincia = $_GET["provincia"];

    if (isset($_GET["producto"])) {
        $producto = $_GET["producto"];
        filtrarProducto($categoria,$precio,$provincia,$producto, $dbh);
    }


    function mostrarAnuncios($dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

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

    function mostrarPorProdCat($data, $producto,$dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio WHERE titulo LIKE ");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
        }
    }

    function mostrarPorProdPre($data, $producto,$dbh){

    }

    function mostrarPorProdProv($data, $producto, $dbh){

    }

    function mostrarPorPreProvProd($data, $producto, $dbh){

    }

    function mostrarPorCatProvProd($data, $producto, $dbh){

    }

    function mostrarPorPreProv($data, $producto, $dbh){

    }

    function  mostrarPorProd($producto, $dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio WHERE titulo LIKE :producto%");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute($producto);

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
        }
    }

    function filtrarProducto($categoria,$precio,$provincia,$producto, $dbh){
        if ($precio == "" && $provincia == "") {
            mostrarPorProdCat(["categoria" => $categoria], $producto, $dbh);
        }
        elseif ($categoria == "" && $provincia == "") {
            mostrarPorProdPre(["precio" => $precio], $producto, $dbh);
        }
        elseif ($categoria == "" && $precio == "") {
            mostrarPorProdProv(["provincia" => $provincia], $producto, $dbh);
        }
        elseif ($categoria == "") {
            mostrarPorPreProvProd(["provincia" => $provincia, "precio" => $precio], $producto, $dbh);
        }
        elseif ($precio == "") {
            mostrarPorCatProvProd(["categoria" => $categoria, "provincia" => $provincia], $producto, $dbh);
        }
        elseif ($provincia == "") {
            mostrarPorPreProv(["categoria" => $categoria,"precio" => $precio], $producto, $dbh);
        }
        elseif($categoria == "" && $precio == "" && $provincia == ""){
            mostrarPorProd($producto, $dbh);
        }
    }

    require "busquedaAvanzada.view.php";
?>