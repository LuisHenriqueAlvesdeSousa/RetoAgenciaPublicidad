<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./Media/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./EntornoCliente/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>LoVendo - Nuevo Anuncio</title>
</head>
<body>
	<header>
		<div id="logotipo">
            <img src="#" alt="logo"/>
        </div>
        <div id="buscador">
            <input type="text" id="busqueda" placeholder="Buscador"/>
            <input type="button" id="buscar" value="Buscar"/>
        </div>
        <div id="login">
            <input type="button" id="singup" value="Cuenta"/>
        </div>
    </header>
    <section id="crearAnuncio">
        <h1>Crear Anuncio</h1>
    	<form name="formularioAnuncio" type="POST" >
            <input type="text" name="titulo" id="tituloAnuncio"placeholder="Titulo" />
            <input type="text" name="descripcion" id="descAnuncio" placeholder="Descripcion">
            <input type="text" name="precio" id="precioAnuncio" placeholder="Precio">
            <select name="selectCat" id="selCategorias"></select>
            <input type="file" id="fotoAnuncio" name="imagen"/>
            <input type="submit" name="crear" id="publicarAnuncio" value="Publicar"/>
        </form>
    </section>
    <footer>
        <div id="licencia">
            <p><a href="#">Creative Commons</a></p>
        </div>
        <div id="w3">Iconos</div>
    </footer>
</body>
</html>