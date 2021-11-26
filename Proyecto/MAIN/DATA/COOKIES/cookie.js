import { __ajax } from "../AJAX/ajax.js";

$(document).ready(function() {
    crearEvento();
});

function crearEvento() {
    var permiso = "true";
    $("#permisoCookies").click(function() {
        __ajax("./MAIN/DATA/COOKIES/cookie.php", permiso)
            .done(function(permiso) {
                if (permiso == "aceptado") {
                    window.location.replace("./index.php");
                }
            });
    });
}

export function getCookie(nombre) {
    var nombreEQ = nombre + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nombreEQ) == 0) return c.substring(nombreEQ.length, c.length);
    }
    return null;
}