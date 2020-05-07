function correoIncorrecto() {
    let correo_error = document.querySelector("#error-correo");
    correo_error.style.display = "block";
}

function contraseñaIncorrecta() {
    let contraseña_error = document.querySelector("#error-contraseña");
    contraseña_error.style.display = "block";
}

function validarInicio() {
    var correo = document.forms["form-login"]["correo"].value;
    var contraseña = document.forms["form-login"]["contraseña"].value;
    var bandera = true;
    if (correo == "") {
        correoIncorrecto();
        bandera = false;
    }

    if (contraseña == "") {
        contraseñaIncorrecta();
        bandera = false;
    }

    return bandera;
}

function esNumero(valor) {
    return /^-{0,1}\d+$/.test(valor);
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
    if (telefono != "") {
        if (telefono.length != 10 || !esNumero(telefono)) {
            mensajeError.innerHTML = "El telefono proporcionado no es valido";
            registro_error.style.display = "block";
            return false;
        }
    }
    return true;
}

function validarAñadirPelicula() {
    var titulo = document.forms["form-añadirPelicula"]["titulo"].value;
    var portada = document.forms["form-añadirPelicula"]["portada"].value;
    var descripcion = document.forms["form-añadirPelicula"]["descripcion"].value;
    var duracion = document.forms["form-añadirPelicula"]["duracion"].value;
    var actores = document.forms["form-añadirPelicula"]["actores"].value;
    var categoria = document.forms["form-añadirPelicula"]["categoria"].value;
    var precio = document.forms["form-añadirPelicula"]["precio"].value;


    let mensajeError = document.querySelector("#mensaje-error-añadirPelicula");
    let error_añadir = document.querySelector("#error-añadir");


    if (titulo == "" || portada == "" || descripcion == "" || duracion == "" || actores == "" || categoria == "" || precio == "") {
        mensajeError.innerHTML = "Por favor, proporcione todos los datos solicitados";
        error_añadir.style.display = "block";
        return false;
    }
    return true;
}



function validarModificarPelicula() {
    var titulo = document.forms["form-editarInformacionPelicula"]["titulo"].value;
    var portada = document.forms["form-editarInformacionPelicula"]["portada"].value;
    var descripcion = document.forms["form-editarInformacionPelicula"]["descripcion"].value;
    var duracion = document.forms["form-editarInformacionPelicula"]["duracion"].value;
    var actores = document.forms["form-editarInformacionPelicula"]["actores"].value;
    var categoria = document.forms["form-editarInformacionPelicula"]["categoria"].value;
    var precio = document.forms["form-editarInformacionPelicula"]["precio"].value;


    let mensajeError = document.querySelector("#mensaje-error-añadirPelicula");
    let error_añadir = document.querySelector("#error-añadir");


    if (titulo == "" || descripcion == "" || duracion == "" || actores == "" || precio == "" || precio == 0) {
        mensajeError.innerHTML = "Por favor, proporcione todos los datos solicitados";
        error_añadir.style.display = "block";
        return false;
    }
    return true;
}

function pintarAnteriores(estrellaActual) {
    switch (estrellaActual) {
        case "cinco":
            $('.cuatro').addClass("checked");
        case "cuatro":
            $('.tres').addClass("checked");
        case "tres":
            $('.dos').addClass("checked");
        case "dos":
            $('.uno').addClass("checked");
            break;
    }
}

function despintarEstrellas(estrellaActual) {
    switch (estrellaActual) {
        case "uno":
            $('.dos').removeClass("checked");
            $('.dos').addClass("unchecked");
        case "dos":
            $('.tres').removeClass("checked");
            $('.tres').addClass("unchecked");
        case "tres":
            $('.cuatro').removeClass("checked");
            $('.cuatro').addClass("unchecked");
        case "cuatro":
            $('.cinco').removeClass("checked");
            $('.cinco').addClass("unchecked");
            break;
    }
}

var estrellas = ["uno", "dos", "tres", "cuatro", "cinco"];
estrellas.forEach(function (elemento) {
    $('.' + elemento).click(function () {
        var cls = $('.' + elemento);
        if (cls.hasClass("unchecked")) {
            $('.' + elemento).removeClass("unchecked");
            $('.' + elemento).addClass("checked");
        } else {
            $('.' + elemento).removeClass("checked");
            $('.' + elemento).addClass("unchecked");
        }
        var ultimaEstrella = $('.' + elemento).attr("data-value");
        $('.estrella-actual').val(ultimaEstrella);
        pintarAnteriores(elemento);
        despintarEstrellas(elemento);
    });
});