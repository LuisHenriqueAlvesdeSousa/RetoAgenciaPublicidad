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
     $stmt = $dbh->prepare("SELECT titulo,precio FROM Anuncio ORDER BY precio ASC");
     $stmt->setFetchMode(PDO::FETCH_OBJ);
     $stmt->execute();

     while($row = $stmt->fetch()) {
        echo $row->titulo. " ";
        echo $row->precio. "<br>";
     }
 }

 function ordenarPorFechaDes($dbh){
     $stmt = $dbh->prepare("SELECT titulo,precio FROM Anuncio ORDER BY precio DESC");
     $stmt->setFetchMode(PDO::FETCH_OBJ);
     $stmt->execute();

     while($row = $stmt->fetch()) {
        echo $row->titulo. " ";
        echo $row->precio. "<br>";
     }
 }
    require "prueba.view.php"; 
?>