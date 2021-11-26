<?php
        function guardarSessionPerfil($perfil){
            $_SESSION["idPerfil"] = $perfil->idPerfil;
            $_SESSION["usuario"] = $perfil->usuario;
            $_SESSION["password"] = $perfil->password;
            $_SESSION["email"] = $perfil->email;
            $_SESSION["telefono"] = $perfil->telefono;
            $_SESSION["direccion"] = $perfil->direccion;
            $_SESSION["provincia"] = $perfil->provincia;
            $_SESSION["localidad"] = $perfil->localidad;
            $_SESSION["pais"] = $perfil->pais;
            $_SESSION["cp"] = $perfil->cp;
        }
?>