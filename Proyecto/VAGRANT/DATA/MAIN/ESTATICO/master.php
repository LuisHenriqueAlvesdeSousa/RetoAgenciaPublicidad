<?php
    require_once dirname(__DIR__)."/DATA/VARIABLES_GLOBALES/vGlobales.php";
    require_once dirname(dirname(__DIR__))."/BD/PERFIL/login.php";

    session_start();

    function comprobarCredenciales($destinoEsperado){
        $cookies = null;
        if($cookies == null){
            $mostrarContCookies = true;
        }else{
            $mostrarContCookies = false;
        }
        
        if($mostrarContCookies){
            return "/MAIN/DATA/COOKIES/cookie.php";
        }else{
            if($_SESSION["idPerfil"] == null){
                return "/MAIN/USER/login.php";
            }else{
                if(!login($_SESSION["email"], $_SESSION["password"])){
                    return "/MAIN/USER/login.php";
                }else{
                    return $destinoEsperado;
                }
            }
        }
    }
?>