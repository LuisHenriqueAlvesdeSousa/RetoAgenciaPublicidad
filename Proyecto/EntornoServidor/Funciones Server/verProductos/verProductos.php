<?php
require "UML/Anuncio.php";
require "basedatos.php";
    session_start();

    $dbh = connect();

    $producto = $_GET["producto"];
    $categoria = $_GET["categoria"];
    $precio = $_GET["precio"];
    $provincia = $_GET["provincia"];
    $ordenar = $_GET["ordenar"];

    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];
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

    function realizarAccion($categoria,$precio,$provincia,$producto,$ordenar, $sql, $accion, $dbh){
        switch($accion){
            case "mostrarmas":
                $id = $_GET["id"];
                $sql .= " AND a.idAnuncio = '$id'";
               require "detallesAnuncio.php";
               die();
        }
        filtrar($categoria,$precio,$provincia,$producto,$ordenar, $dbh);
    }

    function filtrar($categoria,$precio,$provincia,$producto,$ordenar, $dbh){
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
            }
            elseif (isset($provincia) && $provincia != ""){
                $sql .= " AND p.provincia LIKE '$provincia'";
            }
            elseif (isset($ordenar)){
                switch($ordenar){
                    case "fechdescendente":
                        $sql .= " ORDER BY a.fchPublicacion DESC";
                    break;
                    case "fechascendente":
                        $sql .= " ORDER BY a.fchPublicacion ASC";
                    break;
                    case "preciodescendente":
                        $sql .= " ORDER BY a.precio DESC";
                    break;
                    case "precioascendente":
                        $sql .= " ORDER BY a.precio ASC";
                    break;
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
                elseif(isset($ordenar)){
                    switch($ordenar){
                        case "fechdescendente":
                            $sql .= " ORDER BY a.fchPublicacion DESC";
                        break;
                        case "fechascendente":
                            $sql .= " ORDER BY a.fchPublicacion ASC";
                        break;
                        case "preciodescendente":
                            $sql .= " ORDER BY a.precio DESC";
                        break;
                        case "precioascendente":
                            $sql .= " ORDER BY a.precio ASC";
                        break;
                }
            }
        }
        elseif (isset($provincia) && $provincia != ""){
            $sql .= " AND p.provincia LIKE '$provincia'";
            if (isset($ordenar)){
                switch($ordenar){
                    case "fechdescendente":
                        $sql .= " ORDER BY a.fchPublicacion DESC";
                    break;
                    case "fechascendente":
                        $sql .= " ORDER BY a.fchPublicacion ASC";
                    break;
                    case "preciodescendente":
                        $sql .= " ORDER BY a.precio DESC";
                    break;
                    case "precioascendente":
                        $sql .= " ORDER BY a.precio ASC";
                    break;
                }
            }
            
        }
        elseif (isset($ordenar)){
            switch($ordenar){
                case "fechdescendente":
                    $sql .= " ORDER BY a.fchPublicacion DESC";
                break;
                case "fechascendente":
                    $sql .= " ORDER BY a.fchPublicacion ASC";
                break;
                case "preciodescendente":
                    $sql .= " ORDER BY a.precio DESC";
                break;
                case "precioascendente":
                    $sql .= " ORDER BY a.precio ASC";
                break;
            }
        }
        
    filtrarProducto($sql, $producto, $dbh);

    }

    function filtrarProducto($sql, $producto, $dbh){
        try{
            $stmt = $dbh->prepare("SELECT a.titulo, a.precio, a.idAnuncio FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $parametro = ["$producto%"];
            $valor = $stmt->execute($parametro);
            
            if($valor){
                $listaAnuncios = Array();
                while($row = $stmt->fetch()) {
                    $a =  new Anuncio($row->titulo ,$row->precio);
                    $listaAnuncios = $a;
            }
            echo json_encode($listaAnuncios);
            }
        }
        catch (Exception $e){
            echo "";
        }
    }
    
    function mostrarMasInfo($sql, $dbh){
        $stmt = $dbh->prepare("SELECT a.titulo, a.descripcion, a.precio, a.fchPublicacion, p.usuario, c.nombre FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
            echo "<tr><td>Nombre</td><td>".$row->titulo."</td></tr><tr><td>Descripcion</td><td>".$row->descripcion."</td><tr><td>Precio</td><td>".$row->precio."</td></tr><tr><td>Fecha Publicacion</td><td>".$row->fchPublicacion."</td></tr><tr><td>Nombre Vendedor</td><td>".$row->usuario."</td></tr><tr><td>Categoria</td><td>".$row->nombre."</td></tr>";
        }

    }

    require "verProductos.view.php";
?>