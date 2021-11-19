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

        $stmt = $dbh->prepare("SELECT a.titulo, a.descripcion, a.precio, a.fchPublicacion FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $parametro = ["$producto%"];
        $stmt->execute($parametro);

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
        }
    }

    function mostrarCategoria($dbh){
        $stmt = $dbh->prepare("SELECT idCategoria,nombre FROM Categoria");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<option value=".$row->idCategoria.">".$row->nombre."</option>";
        }
    }

    function mostrarProvincias($dbh){
        $stmt = $dbh->prepare("SELECT DISTINCT provincia FROM Perfil");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<option value=".$row->provincia.">".$row->provincia."</option>";
        }
    }

    function filtrar($categoria,$precio,$provincia,$producto, $dbh){
        $sql = "AND a.titulo LIKE ?";
        if (isset($categoria) && $categoria != "") {
            $sql .= " AND c.idCategoria LIKE '$categoria'";
            if (isset($precio) && $precio != ""){
                switch($precio){
                    case "menos100":
                        $sql .= " AND a.precio < 100";
                    break;
                    case "entre100-300" :
                        $sql .= " AND a.precio BETWEEN 100 AND 300";
                    break;  
                    case "mas300" :
                        $sql .= " AND a.precio > 300" ;
                    break;     
                }
                    if (isset($provincia) && $provincia != ""){
                        $sql .= " AND p.provincia LIKE '$provincia'";
                }
            }
        }
        elseif (isset($precio) && $precio != ""){
            switch($precio){
                case "menos100":
                    $sql .= " AND a.precio < 100";
                break;
                case "entre100-300" :
                    $sql .= " AND a.precio BETWEEN 100 AND 300";
                break;  
                case "mas300" :
                    $sql .= " AND a.precio > 300" ;
                break;     
            }
            if (isset($provincia) && $provincia != ""){
                $sql .= " AND p.provincia LIKE '$provincia'";
            }
        }
        elseif (isset($provincia) && $provincia != ""){
            $sql .= " AND p.provincia LIKE '$provincia'";
        }

        filtrarProducto($sql, $producto, $dbh);
    }

    require "busquedaAvanzada.view.php";
?>