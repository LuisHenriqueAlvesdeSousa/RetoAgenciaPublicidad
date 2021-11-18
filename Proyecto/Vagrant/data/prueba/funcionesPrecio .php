<?php
    $host = "10.100.252.236" ;
    $dbname = "retoPubliGrupo1";
    $user = "SERVER";
    $pass = "12345";

    $dbh = connect($host,$dbname,$user,$pass);

    function connect($host,$dbname,$user,$pass){
        try{
            $dbh= new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            return $dbh;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function close(){
        $dbh = null;
        return $dbh;
    }

    function mostrarPorPrecioAsc($dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio ORDER BY precio ASC");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo ($row->precio);
    }

    function mostrarPorPrecioDes($dbh){
        $stmt = $dbh->prepare("SELECT * FROM Anuncio ORDER BY precio DES");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo ($row->precio);
    }

    }
    function ordenarPrecio($dbh){
        $ordenar = $_GET["ordenar"] ;
        switch ($ordenar) {
            case "descendiente": 
                mostrarPorPrecioAsc($dbh);
            break;
            case "ascendente" : 
                mostrarPorPrecioDes($dbh);
            }
            break;
        }
    }
    require "prueba.view.php";
?>