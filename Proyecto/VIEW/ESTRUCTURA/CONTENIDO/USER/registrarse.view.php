<!DOCTYPE html>
<html lang="es">

<?php

    require "/VIEW/ESTRUCTURA/ESTATICO/head.php";

?>

<body>

     <div id="contRegistro">
        <form id="registro">
            <label for="email">
                <span>Email</span>
                <input type="email" id="email" required>
            </label>
            <label for="usuario">
                <span>Nombre usuario</span>
                <input type="text" id="usuario" required>
            </label>
            <label for="password">
                <span>Contraseña</span>
                <input type="password" id="password" required>
            </label>
            <label for="confPassword">
                <span>Contraseña</span>
                <input type="password" id="confPassword" required>
            </label>
            <input type="button" id="bRegistrarse" value="Registrate">
        <form>
    </div>
    
    <script src="/MAIN/USER/REGISTRARSE/registrarse.js">

</body>
</html>