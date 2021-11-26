<!DOCTYPE html>
<html lang="en">
<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/head.meta.php" 

?>
    
<body>

<?php 

    require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php" 
    require "./VIEW/ESTRUCTURA/ESTATICO/nav.view.php"

?>

    <div id="contMain">
        <div id="carruselPubli">
            <ul id="listaPubli">
                <li><i class="fab fa-accessible-icon"></i><p>Encuentra lo que quieras!</p></li>
                <li><i class="fab fa-accessible-icon"></i><p>Compra más barato</p></li>
                <li><i class="fab fa-accessible-icon"></i><p>Reutiliza</p></li>

                <li><i class="fab fa-accessible-icon"></i><p>Vende lo que no usas,</p></li>
                <li><i class="fab fa-accessible-icon"></i><p>Gana dinero</p></li>
                <li><i class="fab fa-accessible-icon"></i><p>Transacciones seguras</p></li>
            </ul>
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
    </div>

    <div id="info">
        <div id="fotoInfo">
            <img src="./media/img/fotoEjemplo.jpg" alt="Información">
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, aspernatur recusandae ut voluptates nostrum similique voluptatibus architecto consequuntur eveniet qui sit suscipit, quis enim sequi praesentium ea nihil, quos maiores.</p>
    </div>
    

<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"

?>

</body>
</html>