<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Busqueda avanzanda</h1>
    <form action="busquedaAvanzada.php" method="GET">
        <input type="text" id="busqueda" name="producto">
        <input type="submit" value="Buscar">
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
    </form>
</body>
</html>