////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////VALIDACIONES DE FORMULARIO\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////////////////////////////////////////////////////////////////////////////////////////

const formulario = document.getElementById('Form__Reg__User');
const inputs = document.querySelectorAll('#Form__Reg__User input');

const expresiones = {
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    password: /^.{6,12}$/, // 4 a 12 digitos.
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    telefono: /^\d{7,14}$/, // 7 a 14 numeros.
    codigopostal: /^\d{5}$/, //5 numeros.
    direcref: /^[a-zA-ZÀ-ÿ\s\.]{1,60}$/ // Letras y espacios y punto, pueden llevar acentos.

}

const campos = {
    nombre: false,
    password: false,
    correo: false,
    telefono: false,
    codigopostal: false,
    direcref: false,
}
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "nombre":
            if (expresiones.nombre.test(e.target.value)) {
                document.getElementById('RegNombre').classList.remove('Input__LoginFALSE');
                document.getElementById('RegNombre').classList.add('Input__LoginTRUE');
                campos['nombre'] = true;
            } else {
                document.getElementById('RegNombre').classList.add('Input__LoginFALSE');
                document.getElementById('RegNombre').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegNombre').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegNombre').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
                campos['nombre'] = false;
            }
            break;
        case "primerapellido":
            if (expresiones.nombre.test(e.target.value)) {
                document.getElementById('RegPrApel').classList.remove('Input__LoginFALSE');
                document.getElementById('RegPrApel').classList.add('Input__LoginTRUE');
            } else {
                document.getElementById('RegPrApel').classList.add('Input__LoginFALSE');
                document.getElementById('RegPrApel').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegPrApel').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegPrApel').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
            }
            break;
        case "segundoapellido":
            if (expresiones.nombre.test(e.target.value)) {
                document.getElementById('RegSegApe').classList.remove('Input__LoginFALSE');
                document.getElementById('RegSegApe').classList.add('Input__LoginTRUE');
            } else {
                document.getElementById('RegSegApe').classList.add('Input__LoginFALSE');
                document.getElementById('RegSegApe').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegSegApe').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegSegApe').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
            }
            break;
        case "codigopostal":
            if (expresiones.codigopostal.test(e.target.value)) {
                document.getElementById('RegCodPos').classList.remove('Input__LoginFALSE');
                document.getElementById('RegCodPos').classList.add('Input__LoginTRUE');
                campos['codigopostal'] = true;
            } else {
                document.getElementById('RegCodPos').classList.add('Input__LoginFALSE');
                document.getElementById('RegCodPos').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegCodPos').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegCodPos').setAttribute('title', 'Deben ser 5 NÚMEROS del [0-9]');
                campos['codigopostal'] = false;
            }
            break;
        case "estado":
            if (expresiones.direcref.test(e.target.value)) {
                document.getElementById('RegEstado').classList.remove('Input__LoginFALSE');
                document.getElementById('RegEstado').classList.add('Input__LoginTRUE');
                campos['direcref'] = true;
            } else {
                document.getElementById('RegEstado').classList.add('Input__LoginFALSE');
                document.getElementById('RegEstado').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegEstado').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegEstado').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
                campos['direcref'] = false;
            }
            break;
        case "municipio":
            if (expresiones.direcref.test(e.target.value)) {
                document.getElementById('RegMunici').classList.remove('Input__LoginFALSE');
                document.getElementById('RegMunici').classList.add('Input__LoginTRUE');
            } else {
                document.getElementById('RegMunici').classList.add('Input__LoginFALSE');
                document.getElementById('RegMunici').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegMunici').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegMunici').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
            }
            break;
        case "direccion":
            if (expresiones.direcref.test(e.target.value)) {
                document.getElementById('RegAddres').classList.remove('Input__LoginFALSE');
                document.getElementById('RegAddres').classList.add('Input__LoginTRUE');
            } else {
                document.getElementById('RegAddres').classList.add('Input__LoginFALSE');
                document.getElementById('RegAddres').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegAddres').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegAddres').setAttribute('title', 'No se aceptan simbolos @#$%&,  Solo [a-z] y[0-9]');
            }
            break;
        case "referencias":
            if (expresiones.direcref.test(e.target.value)) {
                document.getElementById('RegRefere').classList.remove('Input__LoginFALSE');
                document.getElementById('RegRefere').classList.add('Input__LoginTRUE');
            } else {
                document.getElementById('RegRefere').classList.add('Input__LoginFALSE');
                document.getElementById('RegRefere').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegRefere').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegRefere').setAttribute('title', 'No se acepta: @+?¡$%. Solo [a-z]');
            }
            break;
        case "contraseña":
            if (expresiones.password.test(e.target.value)) {
                document.getElementById('RegContra').classList.remove('Input__LoginFALSE');
                document.getElementById('RegContra').classList.add('Input__LoginTRUE');
                campos['password'] = true;
                validarPassword2();
            } else {
                document.getElementById('RegContra').classList.add('Input__LoginFALSE');
                document.getElementById('RegContra').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegContra').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegContra').setAttribute('title', 'ingresa de 6 a 12 caracteres');
                campos['password'] = false;
            }

            break;
        case "vercontraseña":
            validarPassword2();
            break;
        case "correo":
            if (expresiones.correo.test(e.target.value)) {
                document.getElementById('RegCorreo').classList.remove('Input__LoginFALSE');
                document.getElementById('RegCorreo').classList.add('Input__LoginTRUE');
                campos['correo'] = true;
            } else {
                document.getElementById('RegCorreo').classList.add('Input__LoginFALSE');
                document.getElementById('RegCorreo').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegCorreo').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegCorreo').setAttribute('title', 'Correo NO valido. ejem: correo@correo.com');
                campos['correo'] = false;
            }
            break;
        case "telefono":
            if (expresiones.telefono.test(e.target.value)) {
                document.getElementById('RegTelefo').classList.remove('Input__LoginFALSE');
                document.getElementById('RegTelefo').classList.add('Input__LoginTRUE');
                campos['telefono'] = true;
            } else {
                document.getElementById('RegTelefo').classList.add('Input__LoginFALSE');
                document.getElementById('RegTelefo').setAttribute('data-bs-toggle', 'tooltip');
                document.getElementById('RegTelefo').setAttribute('data-bs-placement', 'top');
                document.getElementById('RegTelefo').setAttribute('title', 'Solo numeros 0-9');
                campos['telefono'] = false;
            }
            break;
    }
}

const validarPassword2 = () => {
    const inputPassword1 = document.getElementById('RegContra');
    const inputPassword2 = document.getElementById('RegVerCon');

    if (inputPassword1.value == inputPassword2.value) {
        document.getElementById('RegVerCon').classList.remove('Input__LoginFALSE');
        document.getElementById('RegVerCon').classList.add('Input__LoginTRUE');
    } else {
        document.getElementById('RegVerCon').classList.add('Input__LoginFALSE');
        document.getElementById('RegVerCon').setAttribute('data-bs-toggle', 'tooltip');
        document.getElementById('RegVerCon').setAttribute('data-bs-placement', 'top');
        document.getElementById('RegVerCon').setAttribute('title', 'Las contraseñas no son iguales');
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});
/*
formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const terminos = document.getElementById('TermyCond');
    if (campos.usuario && campos.nombre && campos.password && campos.correo && campos.telefono && terminos.checked) {
        formulario.reset();
    } else {
        alert("Rellenar todos los campos");
    }
});*/