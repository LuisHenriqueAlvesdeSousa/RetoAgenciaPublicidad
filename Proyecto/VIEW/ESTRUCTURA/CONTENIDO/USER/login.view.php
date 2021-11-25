<!DOCTYPE html>
<html lang="es">

<?php

    require "/VIEW/ESTRUCTURA/ESTATICO/head.php";

?>

<body>

     <div id="contLogin">
        <form id="login">
            <label for="email">
                <span>Email</span>
                <input type="email" id="email" required>
            </label>
            <label for="password">
                <span>Contraseña</span>
                <input type="password" id="password" required>
            </label>
            <input type="button" id="bLogin" value="Iniciar sesión">
            <input type="button" id="bRegistrarse" value="Registrate">
        <form>
    </div>
    
    <script src="/MAIN/USER/LOGIN/login.js">

</body>
</html>