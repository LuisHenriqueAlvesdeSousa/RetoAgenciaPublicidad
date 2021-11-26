<?php
require_once dirname(dirname(__DIR__))."/BD/CONEXION/conexion.php";

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
        //try{
            $stmt = $dbh->prepare("SELECT a.titulo, a.precio, a.idAnuncio FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $parametro = ["$producto%"];
            $stmt->execute($parametro);

            while($row = $stmt->fetch()) {
  
            echo "<div id=\"producto\"><p>Nombre: ". $row->titulo . "</p><p>Precio: ".$row->precio."€</p><a href=\"verProductos.php?accion=mostrarmas&id=".$row->idAnuncio."\">Ver mas</a><p id=\"cambiarIcono\"><i class=\"far fa-heart\"></i></p></div>";
            }
            /*
            if($valor){
                $listaAnuncios = Array();
                while($row = $stmt->fetch()) {
                    $a =  new Anuncio($row->titulo ,$row->precio);
                    $listaAnuncios = $a;
                //  echo "<p>Nombre: ". $row->titulo . ", descripcion: ".$row->descripcion. ", precio: ".$row->precio.", fecha: ".$row->fchPublicacion.". </p>";
            }
            echo json_encode($listaAnuncios);
            }
        }
        catch (Exception $e){
            echo "";
        }
        */
    }
    
    function mostrarMasInfo($sql, $dbh){
    //try{  
        $stmt = $dbh->prepare("SELECT a.titulo, a.descripcion, a.precio, a.fchPublicacion, p.usuario, c.nombre FROM Anuncio a, Categoria c, Perfil p WHERE a.idCategoria = c.idCategoria AND a.idPerfil_Admin = p.idPerfil $sql");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();

        while($row = $stmt->fetch()) {
          echo "<div><p>Nombre</p><p>Descripcion</p><p>Precio</p><p>Fecha Publicacion</p><p>Nombre Vendedor</p><p>Categoria</p></div><div id=\"resultado\"><p>".$row->titulo."</p></p>".$row->descripcion."</p><p>".$row->precio."</p><p>".$row->fchPublicacion."</p><p>".$row->usuario."</p><p>".$row->nombre."</p></div>";
        }
        /*
        if($resultado){
            $verDetalles = Array();
            while($row = $stmt->fetch()) {
              $c = new  Anuncio($row->titulo,$row->descripcion, $row->precio, $row->fchPublicacion, $row->usuario, $row->nombre);
              $verDetalles = $c;
            //echo "<tr><td>Nombre</td><td>".$row->titulo."</td></tr><tr><td>Descripcion</td><td>".$row->descripcion."</td><tr><td>Precio</td><td>".$row->precio."</td></tr><tr><td>Fecha Publicacion</td><td>".$row->fchPublicacion."</td></tr><tr><td>Nombre Vendedor</td><td>".$row->usuario."</td></tr><tr><td>Categoria</td><td>".$row->nombre."</td></tr>";
        }
        echo json_encode($verDetalles);
        }
    }
    catch (Exception $e){
        echo "";
    }   
    */
    }

    require_once dirname(dirname(__DIR__))."/VIEW/ESTRUCTURA/CONTENIDO/ANUNCIOS/verProductos.view.php";
?>