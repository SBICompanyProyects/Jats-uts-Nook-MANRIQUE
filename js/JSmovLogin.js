//Declaracion de variables para movimientos de cajas.
//Con el querySelector une una variable con lo que contenga un componente creado en HTML por medio de su ID.
var contenedor_login_register = document.querySelector(".contenedorLogin__Registro");
var form_login = document.querySelector(".formulario__login");
var form_register = document.querySelector(".formulario__register");
var caja_tracera_login = document.querySelector(".cajatracera__login");
var caja_tracera_register = document.querySelector(".cajatracera__registro");
//Funcion para el movimiento de los formularios
function Registro() {
    if (window.innerWidth > 850) {
        form_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        form_login.style.display = "none";
        caja_tracera_register.style.opacity = "0";
        caja_tracera_login.style.opacity = "1";
    } else {
        form_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        form_login.style.display = "none";
        caja_tracera_register.style.display = "none";
        caja_tracera_login.style.display = "block";
        caja_tracera_login.style.opacity = "1"

    }
}

function IniciarSesion() {
    if (window.innerWidth > 850) {
        form_register.style.display = "none";
        contenedor_login_register.style.left = "10px";
        form_login.style.display = "block";
        caja_tracera_register.style.opacity = "1";
        caja_tracera_login.style.opacity = "0";
    } else {
        form_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
        form_login.style.display = "block";
        caja_tracera_register.style.display = "block";
        caja_tracera_login.style.display = "none";
    }
}

//Funcion para resize del formulario(Responsive)
function anchoPagina() {
    if (window.innerWidth > 850) {
        caja_tracera_login.style.display = "block"
        caja_tracera_register.style.display = "block"
    } else {
        caja_tracera_login
    }
}

//Codigo para activar la funcion con los botones login/register
document.getElementById("btn_register").addEventListener("click", Registro);
document.getElementById("btn_login").addEventListener("click", IniciarSesion);