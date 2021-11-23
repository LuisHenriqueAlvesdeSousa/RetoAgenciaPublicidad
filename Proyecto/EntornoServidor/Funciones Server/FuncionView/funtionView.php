<?php
    require "basedatos.php";

    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    function mostrarAnuncios($dbh){
        $stmt = $dbh->prepare("SELECT idAnuncio, titulo, precio FROM Anuncio");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<p> Nombre: ".$row->titulo.", Precio: ".$row->precio." <a href=\"funtionView.php?accion=mostrarmas&id=".$row->idAnuncio."\">Ver mas</a></p>";
        }
    }

    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];
        realizarAccion($accion, $dbh);
    }

    function realizarAccion($accion, $dbh){
        $sql = "";
        switch($accion){
            case "mostrarmas":
                $id = $_GET["id"];
                $sql .= " AND a.idAnuncio = '$id'";
                mostrarMasInfo($sql, $dbh);
        }
    }

    function mostrarMasInfo($sql, $dbh){
        $stmt = $dbh->prepare("SELECT a.titulo, a.descripcion, a.precio, a.fchPublicacion, p.usuario, c.nombre FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<p> Nombre: ".$row->titulo.", Descripcion : ".$row->descripcion.", Precio: ".$row->precio.", Fecha Publicacion: ".$row->fchPublicacion.", Nombre Vendedor: ".$row->usuario.", Categoria: ".$row->nombre ;
        }

    }

    require "funtionView.view.php"
?>