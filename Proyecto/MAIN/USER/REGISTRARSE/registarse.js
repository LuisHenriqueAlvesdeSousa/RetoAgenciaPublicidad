import "/UML/Perfil/Perfil.js";
import "/MAIN/DATA/AJAX/ajax.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    validar();
    registrar();
}

function validar() {
    validarEmail();
    validarUsuario();
    validarPassword();
    validarConfPassword();
}

export function validarEmail() {
    $("#email").focusout(function() {
        try {
            if ($("#email").value.lenght() > 50) {
                throw "Tamaño maximo del email es de 50 caracteres.";
            }
            var email = JSON.stringify($("#email").value);
            __ajax("/MAIN/USER/REGISTRARSE/registrarse.php", email)
                .done(function(validador) {
                    if (validador == "aprobado") {
                        $("#email").css("color", "green");
                    } else {
                        throw validador;
                    }
                });

        } catch {
            $("#email").css("color", "red");
            alert(error);
        }
    });
}

export function validarUsuario() {
    $("#usuario").focusout(function() {
        try {
            if ($("#usuario").value.lenght() > 50) {
                throw "Tamaño maximo del nombre de usuario es de 50 caracteres.";
            }
            if ($("#usuario").value.lenght() < 4) {
                throw "Tamaño minimo del nombre de usuario es de 4 caracteres.";
            }
            let patron = "$[A-Za-z0-9]{4, 50}^"
            if (!patron.test($("#usuario").value)) {
                throw "Formato del nombre de usuario incorrecto: Solo puede contener letras y numeros.";
            }
            var nickname = JSON.stringify($("#usuario").value);
            __ajax("/MAIN/USER/REGISTRARSE/registrarse.php", nickname)
                .done(function(validador) {
                    if (validador == "aprobado") {
                        $("#usuario").css("color", "green");
                    } else {
                        throw validador;
                    }
                });

        } catch {
            $("#usuario").css("color", "red");
            alert(error);
        }
    });
}

export function validarPassword() {
    $("#password").focusout(function() {
        try {
            if ($("#password").value.lenght() > 50) {
                throw "Tamaño maximo de la contraseña es de 50 caracteres.";
            }
            if ($("#password").value.lenght() < 4) {
                throw "Tamaño minimo de la contraseña es de 4 caracteres.";
            }
            let patron = "$[[A-Za-z0-9]+]{4, 50}^"
            if (!patron.test($("#password").value)) {
                throw "Formato de la contraseña incorrecto: Debe contener al menos una MAYUSCULA, una minuscula y un número.";
            }

            $("#password").css("color", "green");

        } catch {
            $("#password").css("color", "red");
            alert(error);
        }
    });
}

function validarConfPassword() {
    $("#confPassword").focusout(function() {
        try {
            if ($("#password").value != $("#confPassword").value) {
                throw "La contraseñas no coincide con la confirmacion de la contraseña.";
            }

            $("#confPassword").css("color", "green");

        } catch {
            $("#confPassword").css("color", "red");
            alert(error);
        }
    });
}

function registrar() {
    $("#bRegistrarse").click(function() {
        var usuario = new Perfil(null, $("#usuario").value, $("#password").value, $("#email").value, null, null, null, null, null, null);
        usuario = JSON.stringify(usuario);
        __ajax("/MAIN/USER/REGISTRARSE/registarse.php", usuario)
            .done(function(accion) {
                if (accion == "aprobado") {
                    location.href("/index.php");
                } else {
                    vaciarRegistro();
                    alert(accion);
                }
            });
    });
}

function vaciarRegistro() {
    $("#email").value = "";
    $("#usuario").value = "";
    $("#password").value = "";
    $("#confPassword").value = "";
    $("#email").focus;
}