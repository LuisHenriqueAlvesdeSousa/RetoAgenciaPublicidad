<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="fecha.php" method="GET">
        <p>Ordenar por fecha</p>
        <input type="radio" name="ordenar" value="descendente"><label>Ordenar descententemente</label>
        <input type="radio" name="ordenar" value="ascendente"><label>Ordenar ascendentemente</label>
        <input type="submit" name="Enviar">
</form>
<?= ordenarPorFecha($ordenar,$dbh)?>   
</body>
</html>