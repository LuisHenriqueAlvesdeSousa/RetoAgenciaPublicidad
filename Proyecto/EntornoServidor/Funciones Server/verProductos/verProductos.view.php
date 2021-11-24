<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div id="contenido">
<div id="buscador">
    <h1 style="color: green;">Busqueda avanzanda</h1>
    <form action="verProductos.php" method="POST">
        <input type="text" id="busqueda" name="producto">
        <input type="submit" id="bBuscar" value="Buscar">
        <p>Filtrar por:</p>
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
        <select name="provincia" id="">
            <option value="">...</option>
            <?= mostrarProvincias($dbh)?>
        </select>
        <p>Ordenar por fecha</p>
        <input type="radio" name="ordenar" value="fechdescendente"><label>Ordenar descententemente</label>
        <input type="radio" name="ordenar" value="fechascendente"><label>Ordenar ascendentemente</label>
        <p>Ordenar por precio</p>
        <input type="radio" name="ordenar" value="preciodescendente"><label>Ordenar descententemente</label>
        <input type="radio" name="ordenar" value="precioascendente"><label>Ordenar ascendentemente</label>
    </form>
    <fieldset>
    <legend><h2>Catalogo de productos</h2></legend>
    <?php
        realizarAccion($categoria ,$precio ,$provincia ,$producto ,$ordenar, $sql, $accion, $dbh);
    ?>
    </fieldset>
</div>
</div>   
</body>
</html>