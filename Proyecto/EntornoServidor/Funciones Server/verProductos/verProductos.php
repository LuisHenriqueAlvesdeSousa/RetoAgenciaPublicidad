<?php
require "basedatos.php";
    session_start();
 
    $host = "localhost";
    $dbname = "retoPubliGrupo1";
    $user = "root";
    $pass = "";

    $dbh = connect($host,$dbname,$user,$pass);

    $producto = $_GET["producto"];
    $categoria = $_GET["categoria"];
    $precio = $_GET["precio"];
    $provincia = $_GET["provincia"];
    $ordenar = $_GET["ordenar"];

    $_SESSION["searchProducto"] = $producto;
    $_SESSION["searchCategoria"] = $categoria;
    $_SESSION["searchPrecio"] = $precio;
    $_SESSION["searchProvincia"] = $provincia;
    $_SESSION["searchOrdenar"] = $ordenar;

    if (isset($_GET["accion"])) {
        $accion = $_GET["accion"];
    } 

    function filtrarProducto($sql, $producto, $dbh){

        $stmt = $dbh->prepare("SELECT a.titulo, a.precio, a.idAnuncio FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $parametro = ["$producto%"];
        $stmt->execute($parametro);

        while($row = $stmt->fetch()) {
            echo "<p>Nombre: ". $row->titulo . ", precio: ".$row->precio.".<a href=\"verProductos.php?accion=mostrarmas&id=".$row->idAnuncio."\">Ver mas</a> <i class=\"far fa-heart\"></i></p>";
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


    function realizarAccion($sql, $accion, $dbh){
        if (isset($categoria) && $categoria != "") {
            if (isset($precio) && $precio != ""){
               
            }
            elseif (isset($provincia) && $provincia != ""){

            }    
            elseif (isset($ordenar)){
                
            }
        }
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
            echo "<p style=\"color: red;\"> Nombre: ".$row->titulo.", Descripcion : ".$row->descripcion.", Precio: ".$row->precio.", Fecha Publicacion: ".$row->fchPublicacion.", Nombre Vendedor: ".$row->usuario.", Categoria: ".$row->nombre ;
        }

    }

    require "verProductos.view.php";
?>