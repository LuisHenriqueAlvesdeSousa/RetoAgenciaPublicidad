import { validarTitulo, validarDescripcion, validarPrecio } from "../../ANUNCIO/nuevoAnuncio.js";
import { __ajax } from "../../DATA/AJAX/ajax.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    validarTitulo();
    validarDescripcion();
    validarPrecio();
    $("updateAnuncio").click(function() {
        var anuncio = new Anuncio(null, $("#tituloAnuncio").value, $("#descripcion").value, $("#precioAnuncio").value, null, $("#fotoAnuncio").value, fecha, null, null, $("#selCategorias").value);
        __ajax("./editarAnuncio.php", JSON.stringify(anuncio))
            .done(function(accion) {
                if (accion == "aceptado") {
                    alert("Anuncio actualizado.");
                } else {
                    alert("Error inesperado en la base de datos");
                }
                window.location.href("index.php")
            });
    });
    $("deleteAnuncio").click(function() {
        if (confirm("¿Esta seguro que quiere este anuncio?") == true) {
            __ajax("./eliminarAnuncio.php", anuncio)
                .done(function(accion) {
                    if (accion == "aceptado") {
                        alert("Anuncio eliminado con exito.");
                    } else {
                        alert("Error inesperado en la base de datos");
                    }
                    window.location.href("index.php")
                });
        }
    });
}