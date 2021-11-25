import { __ajax } from "../DATA/AJAX/ajax.js";
import { getCookie } from "../DATA/COOKIES/cookie.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    $("bEditarPefil").click(function() {
        windows.location.href("./MAIN/PERFIL/UPDATE/editarPerfil.php");
    });
    $("bAnunciosFav").click(function() {
        __ajax("../../MAIN/ANUNCIOS/anunciosFav.php", JSON.stringify(getCookie("PerfilActual")))
            .done(function(arrayAnuncios) {
                //codigo de guille
            });
    });
    $("bAnunciosPerfil").click(function() {
        __ajax("../../MAIN/ANUNCIOS/misAnuncios.php", JSON.stringify(getCookie("PerfilActual")))
            .done(function(arrayAnuncios) {
                //codigo de guille
            });
    });
}