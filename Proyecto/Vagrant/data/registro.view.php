<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <section id="registrar">
        <h1>Crear Anuncio</h1>
    	<form name="formularioRegistro" type="POST" >
            <input type="text" name="usuario" id="tituloUsuario"placeholder="Nombre de Usuario" />
            <input type="text" name="password" id="pass" placeholder="Contraseña">
            <input type="text" name="email" id="email" placeholder="Email">
            <input type="text" id="tel" name="telefono" placeholder="Telefono"/>
            <input type="text" name="direccion" id="dir" placeholder="Direccion">
            <input type="text" name="provincia" id="prov" placeholder="Provincia">
            <input type="text" name="localidad" id="loc" placeholder="Localidad">
            <input type="text" name="codigo-postal" id="cp" placeholder="Codigo Postal">
            <input type="text" name="pais" id="pais" placeholder="Pais">

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