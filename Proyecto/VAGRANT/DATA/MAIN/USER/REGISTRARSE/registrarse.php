<?php

    require "/UML/Perfil/Perfil.php";
    require "/EXCEPTIONS/mensajeError.php";
    require "/BD/PERFIL/registrarUsuario.php";
    require "/BD/PERFIL/login.php";

    if(isset($_POST["usuario"])){
        $u = json_decode($_POST["usuario"]);
        $usuario = new Perfil(null, $u->usuario, $u->password, $u->email, null, null, null, null, null, null);
        if(registrar($usuario)){
            login($u->email, $u->password);
            die(echo "aprobado");
        }else{
            die(echo mensajeError($errorActual));
        }
    }

    if(isset($_POST["email"])){
        $email = json_decode($_POST["email"]);
        if(findPerfilByEmail($email)){
            die(echo "aprobado");
        }else{
            die(echo mensajeError($errorActual));
        }
    }

    if(isset($_POST["nickname"])){
        $nickname = json_decode($_POST["nickname"]);
        if(findPerfilByUsuario($nickname)){
            die(echo "aprobado");
        }else{
            die(echo mensajeError($errorActual));
        }
    }


    require "/VIEW/ESTRUCTURA/CONTENIDO/USER/registrarse.view.php";
?>