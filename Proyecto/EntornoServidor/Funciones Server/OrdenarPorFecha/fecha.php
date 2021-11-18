<?php
    require "basedatos.php";

    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    if (isset($_GET["ordenar"])) {
        $ordenar = $_GET["ordenar"];
    }

    function ordenarPorFecha($ordenar, $dbh){
        switch($ordenar){
            case "ascendente":
                    ordenarPorFechaAsc($dbh);
                break;
            case "descendente":
                    ordenarPorFechaDes($dbh);
                break;
        }
    }

    function ordenarPorFechaAsc($dbh){
        $stmt = $dbh->prepare("SELECT titulo,descripcion,fchPublicacion  FROM Anuncio ORDER BY fchPublicacion ASC");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo $row->titulo. " ";
            echo $row->fchPublicacion. "<br>";
        }
    }

    function ordenarPorFechaDes($dbh){
        $stmt = $dbh->prepare("SELECT titulo,descripcion,fchPublicacion  FROM Anuncio ORDER BY fchPublicacion DESC");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo $row->titulo. " ";
            echo $row->fchPublicacion. "<br>";
        }
    }

    require "fecha.view.php";
?>