<?php

        require "/BD/CONEXION/conexion.php";
        require "MAIN/CRYPTOR/psswdHashing.php";
        require "MAIN/DATA/SESSION/session.php";
        require "UML/Perfil/Perfil.php";
        require "/MAIN/DATA/VARIABLES_GLOBALES/vGlobales.php";

        function registrar($usuario){
            try{
                $conexion = new Conexion();
                $c = $conexion.getConexion();
                $sql = "INSERT  INTO perfil(usuario, password, email) VALUES (?,?,?);";
                $stament = $c->prepare($sql);
                $respuesta = $statement->execute(:$usuario->usuario, :encriptar($usuario->password), :$usuario->email);

                if($respuesta){
                    guardarSessionPerfil($usuario);
                    $c = null;
                    return true;
                }else{
                    throw new Exception("#ERROR:0002");
                }
            }catch(Exception $e){
                $c = null;
                $perfilActual = new Perfil(null, null, null, null, null, null, null, null, null, null);
                guardarCookiesPerfil($perfilActual);
                $errorActual = $e->getMessage();
                return false;
            }
        }

        function findPerfilByEmail($email){
            try{
                $conexion = new Conexion();
                $c = $conexion.getConexion();
                $sql = "SELECT * FROM perfil WHERE email = ?;";
                $statement = $c->prepare($sql);
                $respuesta = $statement->execute(:$email);

                if($respuesta){
                    $c = null;
                    return true;
                }else{
                    throw new Exception("#ERROR:0003");
                }
            }catch(Exception $e){
                $c = null;
                $errorActual = $e->getMessage();
                return false;
            }
                
        }

        function findPerfilByUsuario($usuario){
            try{
                $conexion = new Conexion();
                $c = $conexion.getConexion();
                $sql = "SELECT * FROM perfil WHERE usuario = ?;";
                $statement = $c->prepare($sql);
                $respuesta = $statement->execute(:$usuario);

                if($respuesta){
                    $c = null;
                    return true;
                }else{
                    throw new Exception("#ERROR:0004");
                }
            }catch(Exception $e){
                $c = null;
                $errorActual = $e->getMessage();
                return false;
            }
                
        }

    
?>