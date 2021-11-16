<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="funcionesPrecio.php" method="GET">
        <p>Ordenar por precio</p>
        <input type="radio" name="ordenar" value="descendente"><label>Ordenar descententemente</label>
        <input type="radio" name="ordenar" value="ascendente"><label>Ordenar ascendentemente</label>
        <input type="submit" value="Enviar">
    </form>
    <?= ordenarPorFecha($ordenar, $dbh) ?>
</body>
</html>