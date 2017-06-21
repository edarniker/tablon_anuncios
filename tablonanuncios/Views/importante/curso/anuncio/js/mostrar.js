$(document).ready(function () {
  

    iniciar();

});
var pag;

function iniciar() {
    mostrar();
}


function mostrar(){
   enviarDatos("../../../../ajax", "POST", "ver=ver", "JSON", "ver_linea_Publicacion");
}


function verAnuncio(resultados){  

            $("#nombre").text(resultados[0] + resultados[1]);
           

      

//        paginacion(resultado);
//        $('.pagination li a.btn').on("click", listarAnuncios);
//        $('.ver_publicacion').on("click", botonVer);
//        $('.btnEliminar').on("click", iniciarEliminar());
  


}


function datos(resultado) {



    if (resultado['registros']) {
        $.each(resultado['registros'], function (pos, obj) {

            $("#listar").prepend("<li><img src='images/m1.jpg' title='' alt=''/>\n\
            <section class='list-left'>\n\
                <h5 class='title'>" + obj[1] + "</h5>\n\
\n\             <p>" + obj[2] + "</p>\
                <span class='adprice'>$290</span>\
                <p class='catpath'>Mobile Phones » Brand</p>\n\                \
            </section>\
            <section class='list-right'>\n\
                <span class='date'>Today, 17:55</span>\n\
                <span class='cityname'>Grupo </span>\n\
\n               <span class='cityname'>Curso</span>\n\
\n\
            </section>\n\
\n\  <div class='clearfix'></div>\n\
\n\  <div class='clearfix'></div>\n\
\n\         <div>\n\
\n\<a  class='btn btn-primary ver_publicacion' value=" + obj[0] + ">Ver Anuncio </a>\n\
                <p><span class='nombre'>" + obj[3] + "</span><span class='apellido'>" + obj[4] + "</span></p>\n\
            </div>\n\
            <div class='clearfix'></div>\n\
            </li>");

        });

        paginacion(resultado);
        $('.pagination li a.btn').on("click", listarAnuncios);
        $('.ver_publicacion').on("click", botonVer);
//        $('.btnEliminar').on("click", iniciarEliminar());
    } else {
        $("#listar").html("<h4>**No existen Anuncios**</h4>");
    }






}