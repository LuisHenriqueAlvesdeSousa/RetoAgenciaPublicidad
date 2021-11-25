import { validarUsuario, validarEmail, validarPassword } from "../../USER/REGISTRARSE/registarse.js";
import { __ajax } from "../../DATA/AJAX/ajax.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    validarUsuario();
    validarEmail();
    validarPassword();
    $("updatePerfil").click(function() {
        var usuario = new Perfil(null, $("usuario").value, $("password").value, $("email").value, $("telefono").value, $("direccion").value, $("provincia").value, $("localidad").value, $("pais").value, $("cp").value);
        __ajax("./editarPerfil.php", JSON.stringify(usuario))
            .done(function(accion) {
                if (accion == "aceptado") {
                    alert("Perfil actualizado.");
                } else {
                    alert("Error inesperado en la base de datos");
                }
                window.location.href("../../PERFIL/perfil.php")
            });
    });
    $("deletePerfil").click(function() {
        var usuario = getCookie("usuario");
        if (confirm("¿Esta seguro que quiere eliminar su perfil? Este cambio es inreversible.") == true) {
            __ajax("./eliminarPerfil.php", usuario)
                .done(function(accion) {
                    if (accion == "aceptado") {
                        alert("Perfil eliminado con exito.");
                    } else {
                        alert("Error inesperado en la base de datos");
                    }
                    window.location.href("../../PERFIL/perfil.php")
                });
        }
    });
}