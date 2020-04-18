    function correoIncorrecto() {
        let correo_error = document.querySelector("#error-correo");
        correo_error.style.display = "block";
    }

    function contraseñaIncorrecta() {
        let contraseña_error = document.querySelector("#error-contraseña");
        contraseña_error.style.display = "block";
    }

    function validarRegistro() {
        var nombre = document.forms["form-registro"]["nombre"].value;
        var fecha_nacimiento = document.forms["form-registro"]["fecha_nacimiento"].value;
        var correo = document.forms["form-registro"]["correo"].value;
        var telefono = document.forms["form-registro"]["telefono"].value;
        var contraseña = document.forms["form-registro"]["contraseña"].value;
        var confirmar_contraseña = document.forms["form-registro"]["confirmar_contraseña"].value;

        let registro_error = document.querySelector("#error-registro");
        let mensajeError = document.querySelector("#mensaje-error-registro");

        if (nombre == "" || fecha_nacimiento == "" || correo == "" || contraseña == "" || confirmar_contraseña == "") {
            mensajeError.innerHTML = "Ocurrió un error al registrarse, uno o más de sus datos son incorrectos.";
            registro_error.style.display = "block";
            return false;
        }

        if (contraseña.length < 8) {
            mensajeError.innerHTML = "La contraseña debe ser de al menos 8 caracteres.";
            registro_error.style.display = "block";
            return false;
        }

        if (confirmar_contraseña != contraseña) {
            mensajeError.innerHTML = "Las contraseñas no coinciden.";
            registro_error.style.display = "block";
            return false;
        }
        return true;
    }