<?php
    require "./MAIN/DATA/VARIABLES_GLOBALES/vGlobales.php";
    require "./BD/PERFIL/login.php";
    require "./UML/Perfil/Perfil.php";
    require "./EXCEPTIONS/mensajeError.php";
    

    if(unset($_SESSION["idPerfil"]) || unset($_SESSION["email"]) || unset($_SESSION["password"])){
        $inicioDesatendido = false;
    }else{
        $usuario = new Login($_SESSION["email"], $_SESSION["password"]);
        if(login($usuario)){
            die(echo "<script> location.href(\"index.html\")</script>");
        }else{
            $inicioDesatendido = false;
        }
    }

    if(isset($_POST["json"])){
        $usuario = json_decode($_POST["json"]);
        $usuario = new Login($usuario->email, $usuario->password);
        setcookie("perfilActual", json_encode($usuario), time()+365*24*60*60);
        if(login($usuario)){
            die(echo "aprobado");
        }else{
            die(echo mensajeError($errorActual));
        }
    }

    if(!$inicioDesatendido){
        require "/VIEW/ESTRUCTURA/CONTENIDO/USER/login.view.php";
    }
    
?>