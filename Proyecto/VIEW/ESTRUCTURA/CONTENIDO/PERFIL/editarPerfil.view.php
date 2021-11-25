<!DOCTYPE html>
<html lang="en">
<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/head.meta.php" 

?>
    
<body>

<?php 

    require "./VIEW/ESTRUCTURA/ESTATICO/header.view.php" 

?>

<div id="EditarPerfil">
    <h1>Editar Perfil</h1>
    <form id="fPerfil">
        <label for="usuario">
            <span>Usuario</span>
            <input type="text" id="usuario">
        </label>
        <label for="password">
            <span>Contraseña</span>
            <input type="password" id="password">
        </label>
        <label for="email">
            <span>Email</span>
            <input type="email" id="email">
        </label>
        <label for="telefono">
            <span>Telefono</span>
            <input type="number" id="telefono" maxlength="12">
        </label>
        <label for="direccion">
            <span>Direccion</span>
            <input type="text" id="direccion" maxlength="50">
        </label>
        <label for="provincia">
            <span>Provincia</span>
            <input type="text" id="provincia" maxlength="50">
        </label>
        <label for="localidad">
            <span>Localidad</span>
            <input type="text" id="localidad" maxlength="50">
        </label>
        <label for="pais">
            <span>Pais</span>
            <input type="text" id="pais" maxlength="50">
        </label>
        <label for="cp">
            <span>CP</span>
            <input type="number" id="cp" value="5">
        </label>
        <div id="acciones">
            <input type="submit" id="updatePerfil" value="Actualizar Datos"> <!--color verde-->
            <input type="button" id="deletePErfil" value="Eliminar Perfil"> <!--color rojo-->
        </div>
    </form>
</div>

<?php

    require "./VIEW/ESTRUCTURA/ESTATICO/footer.view.php"

?>

<script src="./MAIN/PEERFIL/Perfil.js"></script>

</body>
</html>