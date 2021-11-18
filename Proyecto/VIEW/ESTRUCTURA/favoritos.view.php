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
    <title>LoVendo - Tienda</title>
</head>
<body>
<header>
        <div id="logotipo">
            <img src="#" alt="logo"/>
        </div>
        <div id="menu">
            <input type="button" id="displayMenu" value="menu"/>
        </div>
    </header>
    <aside>
        <div id="buscador">
            <input type="text" id="busqueda" placeholder="Buscador"/>
            <input type="button" id="buscar" value="Buscar"/>
        </div>
        <div id="login">
            <i class="fab fa-accessible-icon"><p>Login</p>
        </div>
        <div id="categorias">
            <div id="Casa y jardin">
                <i class="fas fa-house-user"></i>
                <p>Casa y Jardin</p>
            </div>
            <div id="Informatica">
                <i class="fas fa-desktop"></i>
                <p>Informatica</p>
            </div>
            <div id="Imagen y sonido">
                <i class="fas fa-camera"></i>
                <p>Imagen y Sonido</p>
            </div>
            <div id="Juegos">
                <i class="fas fa-gamepad"></i>
                <p>Juegos</p>
            </div>
            <div id="Moviles y telefonia">
                <i class="fas fa-mobile-alt"></i>
                <p>Moviles y telefonía</p>
            </div>
            <div id="Moda y complementos">
                <i class="fas fa-tshirt"></i>
                <p>Moda y complementos</p>
            </div>
            <div id="Deportes">
                <i class="fas fa-futbol"></i>
                <p>Deportes</p>
            </div>
            <div id="Mascotas">
                <i class="fas fa-cat"></i>
                <p>Mascotas</p>
            </div>
            <div id="Aficiones y ocio">
                <i class="fas fa-compact-disc"></i>
                <p>Aficiones y Ocio</p>
            </div>
            <div id="Motor">
                <i class="fas fa-car-alt"></i>
                <p>Motor</p>
            </div>
            <div id="Caza y pesca">
                <i class="fas fa-fish"></i>
                <p>Caza y Pesca</p>
            </div>
        </div>
    </aside>
    <aside id="login">
        <div id="contLogin">
            <label for="email">
                <input type="email" id="email">
            </label>
            <label for="psswd">
                <input type="password" id="psswd">
            </label>
            <input type="button" id="login" value="Iniciar sesión">
        </div>
    </aside>
    <section id="anunciosFav">
    	
    </section>
    <footer>
        <div id="licencia">
            <p><a href="#">Creative Commons</a></p>
        </div>
        <div id="w3">Iconos</div>
    </footer>
</body>
</html>