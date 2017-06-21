$(document).ready(function () {

    iniciarLogin();
    iniciarPortada();
});




function iniciarLogin() {

    $("#botonLogin").on("click", comprobar);
    $("#btnRegistre").on("click", cerrar);
    $("#btnVolver").on("click", cerrar);
    $("#btnEnviar").on("click", enviar);
}

function comprobar() {
//    var pathname = window.location.pathname;
//    $parts = explode('//', pathname);
//            $fin= end($parts);


//    alert("hola");

    var categoria = window.location.pathname.substring(window.location.pathname.length, window.location.pathname.lastIndexOf('/') + 1);
    categoria = categoria.replace(/%20/g, ' ');


    var valorPost = "mail=" + $("#mail").val() + "&" + "contrasena=" + $("#contrasena").val();
   
    if (!categoria || categoria === "index.php" || categoria === 'index' || categoria === 'index/index') {
        enviarDatos("ajaxPublico", "POST", valorPost, "text", "validar_login");
    } else {
        enviarDatos("./../ajaxPublico", "POST", valorPost, "text", "validar_login");
    }


}

function cerrar() {
    $(".modal .close").click();



}




function cerrarModal() {
    $(".modal .close").click();
    $(location).attr('href', 'index');


}

function enviar() {
    
    var categoria = window.location.pathname.substring(window.location.pathname.length, window.location.pathname.lastIndexOf('/') + 1);
    categoria = categoria.replace(/%20/g, ' ');
    var valorPost = "dni=" + $("#dni").val() + "&mail=" + $("#register-mail").val() + "&contrasena=" + $("#register-contrasena").val();

    if (!categoria || categoria === "index.php" || categoria === 'index' || categoria === 'index/index') {
        enviarDatos("ajaxPublico", "POST", valorPost, "text", "crear_login");
    } else {
        enviarDatos("./../ajaxPublico", "POST", valorPost, "text", "crear_login");
    }
}
