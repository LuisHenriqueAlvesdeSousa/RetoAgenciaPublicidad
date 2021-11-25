<!DOCTYPE html>
<html lang="en">
<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/head.meta.php" 

?>
    
<body>

<?php 

    require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php" 

?>

<div id="contPerfil">
    <div id="navPerfil">
        <input type="button" id="bEditarPefil" value="Editar Perfil">
        <input type="button" id="bAnunciosFav" value="Anuncios Favoritos">
        <input type="button" id="bAnunciosPerfil" value="Mis anuncios">
    </div>
    <div id="contAnuncios">
        <p>Bienvenido a tu perfil</p>
    </div>
</div>

<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"

?>

<script src="./MAIN/PEERFIL/Perfil.js"></script>

</body>
</html>