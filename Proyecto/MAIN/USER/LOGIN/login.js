import "/UML/Perfil/Perfil.js";
import "/MAIN/DATA/AJAX/ajax.js";

$(document).ready(function() {
    crearEventos();
});

function crearEventos() {
    $("#bLogin").click(function() {
        var credencialesPerfil = Login($("#email").value, $("#password").value);
        if(validarLogin(credencialesPerfil)){
            json = JSON.stringify(credencialesPerfil);
            __ajax("/MAIN/USER/LOGIN/login.php", json)
                .done(function(permiso) {
                    if(permiso == "aprobado"){
                        location.href("/index.php");
                    }else{
                        vaciarSingUp();
                        $("#login").append("<p>" + permiso + "</p>");
                    }
                    
                });
        }else{
            vaciarSingUp();
        }
    });

    $("#bRegistrarse").click(function() {
        location.href("/MAIN/USER/REGISTRARSE/registrarse.php");  
    });
}

function validarLogin(usuario) {
    try {
        if (usuario.email.lenght() > 50) {
            throw "Tamaño maximo del email es de 50 caracteres.";
        }
        if (usuario.password.lenght() > 50) {
            throw "Tamaño maximo de la contraseña es de 50 caracteres.";
        }
        return true;
    } catch (error) {
        alert(error);
        return false;
    }
}

function vaciarSingUp() {
    $("#email").val("");
    $("#psswd").val("");
    $("#email").focus();
}

/* registrase
$("aLogin").append("<label for=\"confPsswd\"><span>Confirmar Contraseña</span><input type=\"password\" id=\"confPsswd\" required /></label>" +
            "<label for=\"usuario\"><span>Nombre de Usuario</span><input type=\"text\" id=\"user\" required /></label>");
        $("bLogin").style({ display: hidden });
        $("#bRegistrarse").val("¡Nueva Cuenta!");
        $("bRegistrarse").click(function() {
            let u = Login($("#email").val(), $("#psswd").val());
            if (validarRegistro(u, $("#confPsswd").val(), $("#user").val())) {
                if (registrarUsuario(u, $("#user").val())) {
                    singUp(u);
                    location.href("/perfil.php");
                } else {
                    alert("El usuario que quieres registrar ya existe.");
                    location.href("/index.php");
                }
            }
        });
*/