<?php
class Anuncio{
    function __constructor($idAnuncio, $titulo, $descripcion, $precio, $estado, $pathFoto, $fchPublicacion, $Perfil_Admin, $Perfil_Comprador, $Categoria){
        this->$idAnuncio = $idAnuncio;
        this->$titulo = $titulo;
        this->$descripcion = $descripcion;
        this->$precio = $precio;
        this->$estado = $estado;
        this->$pathFoto = $pathFoto;
        this->$fchPublicacion = $fchPublicacion;
        this->$Perfil_Admin = $Perfil_Admin;
        this->$Perfil_Comprador = $Perfil_Comprador;
        this->$Categoria = $Categoria;
    }
}
?>