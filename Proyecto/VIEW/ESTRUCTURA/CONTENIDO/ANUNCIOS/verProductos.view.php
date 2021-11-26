<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="../../../CSS/styleAnuncio.css">
    <title>Document</title>
    <script src="jquery-3.5.1.js"></script>
    <script src="verProductos.js"></script>
</head>
<body>
<div id="contenido">
    <h1 id="titulo">Busqueda avanzanda</h1>
    <form action="../../../../MAIN/ANUNCIO/verProductos.php
    " method="GET">
        <div class="container-1">
            <input type="text" id="busqueda" name="producto" placeholder="Search...">
            <input type="submit" id="bBuscar" value="Buscar">
        </div>
        <div id="filtrados">
            <label>Categoria</label>
                <select name="categoria">
                    <option value="">...</option>
                    <?= mostrarCategoria($dbh)?>
                </select>
            <label>Precio</label>
                <select name="precio">
                    <option value="">...</option>
                    <option value="menos100">Menos de 100</option>
                    <option value="entre100-300">Entre 100 y 300</option>
                    <option value="mas300">Mas de 300</option>
                </select>
            <label>Provincia</label>
                <select name="provincia">
                    <option value="">...</option>
                    <?= mostrarProvincias($dbh)?>
                </select>
            <br>
            <div id="tipoOrdenar">
            <div>
                <input type="radio" name="ordenar" value="fechdescendente" id="circulo"><label id="texto">Anuncio mas reciente</label>
                <input type="radio" name="ordenar" value="fechascendente"  id="circulo"><label id="texto">Anuncio mas antiguo</label>
            </div>
            <div>
                <input type="radio" name="ordenar" value="preciodescendente"  id="circulo"><label id="texto">Precio mas barato</label>
                <input type="radio" name="ordenar" value="precioascendente"  id="circulo"><label id="texto">Precio mas caro</label>
            </div>
            </div> 
        </div>   
    </form>
    <fieldset>
    <legend><h2>Catalogo de productos</h2></legend>
    <div class="contAnuncios">
    <?php
        realizarAccion($categoria ,$precio ,$provincia ,$producto ,$ordenar, $sql, $accion, $dbh);
    ?>
    </fieldset>
</div>   
</body>
</html>