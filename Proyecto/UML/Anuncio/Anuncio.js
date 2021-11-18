class Anuncio{
    constructor(idAnuncio, titulo, descripcion, precio, estado, pathFoto, fchPublicacion, idPerfil_Admin, idPerfil_Comprador, idCategoria){
        this.idAnuncio = idAnuncio;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.precio = precio;
        this.estado = estado;
        this.pathFoto = pathFoto;
        this.fchPublicacion = fchPublicacion;
        this.idPerfil_Admin = idPerfil_Admin;
        this.idPerfil_Comprador = idPerfil_Comprador;
        this.idCategoria = idCategoria;
    }
}