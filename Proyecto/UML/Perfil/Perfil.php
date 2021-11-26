<?php
    class Login {
        function __constructor($email, $password) {
            this.$email = $email;
            this.$password = $password;
        }
    }

    class Perfil {
        function __constructor($idPerfil, $usuario, $password, $email, $telefono, $direccion, $provincia, $localidad, $pais, $cp) {
            this.$idPerfil = $idPerfil;
            this.$usuario = $usuario;
            this.$password = $password;
            this.$email = $email;
            this.$telefono = $telefono;
            this.$direccion = $direccion;
            this.$provincia = $provincia;
            this.$localidad = $localidad;
            this.$pais = $pais;
            this.$cp = $cp;
        }
    }
?>