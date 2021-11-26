<?php
    function mensajeError($error){
        switch ($error) {
            case '#ERROR:0001':
                return "El email y/o la contraseña son incorrectos.";
                break;
            
            case '#ERROR:0002':
                return "Problemas registrando el usuario. Pruebe de nuevo más tarde.";
                break;
            
            case '#ERROR:0003':
                return "Email ya esta en uso.";
                break;
            
            case '#ERROR:0004':
                return "Este usuario ya esta en uso.";
                break;
                
            default:
                echo "<script> alert(\"Ha sucedio un error inesperado\") </script>"
                break;
        }
    }
?>