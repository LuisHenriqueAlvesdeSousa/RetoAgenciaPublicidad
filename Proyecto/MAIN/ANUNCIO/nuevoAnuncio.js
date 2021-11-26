import { __ajax } from "../DATA/AJAX/ajax.js";
import { getCookie } from "../DATA/COOKIES/cookie.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    validar();
    publicar();
    cancelar();
}

function validar() {
    validarTitulo();
    validarDescripcion();
    validarPrecio();
}

export function validarTitulo() {
    $("#tituloAnuncio").focusout(function() {
        try {
            if ($("#tituloAnuncio").value.lenght() > 50) {
                throw "Tamaño maximo del titulo es de 50 caracteres.";
            }
            var titulo = JSON.stringify($("#tituloAnuncio").value);
            __ajax("/MAIN/ANUNCIO/nuevoAnuncio.php", titulo)
                .done(function(validador) {
                    if (validador == "aprobado") {
                        $("#tituloAnuncio").css("color", "green");
                    } else {
                        throw validador;
                    }
                });

        } catch {
            $("#tituloAnuncio").css("color", "red");
            alert(error);
        }
    });
}

export function validarDescripcion() {
    $("#descripcion").focusout(function() {
        try {
            if ($("#descripcion").value.lenght() > 50) {
                throw "Tamaño maximo de la descripción es de 50 caracteres.";
            }
            var descripcion = JSON.stringify($("#descripcion").value);
            __ajax("/MAIN/ANUNCIO/nuevoAnuncio.php", descripcion)
                .done(function(validador) {
                    if (validador == "aprobado") {
                        $("#descripcion").css("color", "green");
                    } else {
                        throw validador;
                    }
                });

        } catch {
            $("#descripcion").css("color", "red");
            alert(error);
        }
    });
}

export function validarPrecio() {
    $("#precioAnuncio").focusout(function() {
        try {
            let precioFloat = parseFloat($("#precioAnuncio").value);
            if (!Number.isFloat(precioFloat)) {
                throw "Debes introducir un numero";
            }
            var precio = JSON.stringify($("#precioAnuncio").value);
            __ajax("/MAIN/ANUNCIO/nuevoAnuncio.php", precio)
                .done(function(validador) {
                    if (validador == "aprobado") {
                        $("#precioAnuncio").css("color", "green");
                    } else {
                        throw validador;
                    }
                });

        } catch {
            $("#precioAnuncio").css("color", "red");
            alert(error);
        }
    });
}



function publicar() {
    $("#botonPublicar").click(function() {
        $.ajax({

        })
        let fecha = Date.now();
        var anuncio = new Anuncio(null, $("#tituloAnuncio").value, $("#descripcion").value, $("#precioAnuncio").value, null, $("#fotoAnuncio").value, fecha, null, null, $("#selCategorias").value);
        anuncio = JSON.stringify(anuncio);
        __ajax("/MAIN/ANUNCIO/nuevoAnuncio.php", anuncio)
            .done(function(accion) {
                if (accion == "aprobado") {
                    location.href("/index.php");
                } else {
                    vaciarPublicacion();
                    alert(accion);
                  }
            });
    });
}

function cancelar() {
    $("#botonCancel").click(function() {
        let cancelar = confirm("¿Deseas cancelar la publicacion?");
        if(cancelar==true){
            location.href("/index.php");
        }
    });
}

function vaciarPublicacion() {
    $("#tituloAnuncio").value = "";
    $("#descripcion").value = "";
    $("#precioAnuncio").value = "";
    $("#selCategorias").value = "01";
    $("#tituloAnuncio").focus;
}