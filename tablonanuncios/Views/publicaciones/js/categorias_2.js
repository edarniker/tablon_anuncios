$(document).ready(function () {


    iniciar();

});


function iniciar() {

    listarCategorias();
    $("#categorias").on('change', cambiar);
    $("#ordenar").on('change', ordenar);
    $("#buscar").on('click', buscar);
    $("#categorias-buscar").on('change', cambiar);

}
function listarCategorias() {
    enviarDatos("../ajax", "POST", "listar=listar", "JSON", "listar_categorias");
}

function listarCategoria(resultados) {
    var categoria = window.location.pathname.substring(window.location.pathname.length, window.location.pathname.lastIndexOf('/') + 1);
    categoria = categoria.replace(/%20/g, ' ');
    $.each(resultados, function (pos, obj) {
        $("#categorias").append("<option value='" + obj + "'>" + obj + "</option>");
        $("#categorias-buscar").append("<option value='" + obj + "'>" + obj + "</option>");
        if (categoria === obj) {
            $("#categorias").val(obj).prop("selected", true);
//            $("#categorias-buscar").append("<option value='" + obj + "'>" + obj + "</option>");
        }
    });
    seleccionarJornadas();



    listarAnuncios(false);
}




function listarCategoriaSeleccionada(resultado) {

    if (resultado) {
        $("#sub-categoria").remove();
        var palabra = $("#categorias").val().charAt(0).toUpperCase() + $("#categorias").val().slice(1).toLowerCase();
        $("#sel-subcategoria").append("<label id='label-categoria'>" + palabra + ": </label>"
                + "<select id='subcategoria'></select></div>");
        $("#subcategoria").append("<option></option>");
        $.each(resultado, function (pos, obj) {
            $("#subcategoria").append("<option value='" + obj + "'>" + obj + "</option>");

        });
        $("#subcategoria").on('change', listarSubcategorias);
        listarAnuncios(false);
    }

}



function cambiar() {
    $(location).attr('href', $(this).val());
}

function ordenar() {

    listarAnuncios($("#subcategoria").val());

}




function listarAnuncios(subcategoria) {
    var pag = paginar($(this).attr("value"));
    var jornada = 0;


    $(".pagination li").remove();
    $("#listar li").remove();

    if ($("#jornada").val()) {
        jornada = $("#jornada").val();
    }
    if (!$("#subcategoria").val()) {
        subcategoria = false;
    }

    if (!subcategoria) {
        if (!$("#input-buscar:empty").val()) {
            enviarDatos("../ajax", "POST", "listar=listar&categoriaSel=" + $("#categorias").val() + "&jornada=" + jornada + "&orden=" + $("#ordenar").val() + "&pag=" + pag, "JSON", "listar_publicacion_Administrativos");
        } else {
            enviarDatos("../ajax", "POST",
                    "listar=listar" +
                    "&categoriaSel=" + $("#categorias-buscar").val() +
                    "&jornada=" + jornada +
                    "&orden=" + $("#ordenar").val() +
                    "&pag=" + pag +
                    "&buscar=" + $("#input-buscar").val(),
                    "JSON", "listar_busqueda_Publicaciones");
        }
    } else {

        enviarDatos("../ajax", "POST", "listar=listar"
                + "&categoriaSel=" + $("#categorias").val()
                + "&jornada=" + jornada
                + "&subCategoriaSel=" + $("#subcategoria").val()
                + "&orden=" + $("#ordenar").val()
                + "&pag=" + pag, "JSON", "listar_publicacion_Administrativos");

    }
}


function listados(resultado) {
    if (resultado['buscador']) {
        $("#input-buscar").val(resultado['buscador'][0]);
        $("#categorias-buscar").val(resultado['buscador'][1]).prop("selected", true);
    }


    if (resultado['registros']) {
        $("#listar").empty();
        $.each(resultado['registros'], function (pos, obj) {

            $("#listar").append("<li><img src='" + obj[6] + "' title='' alt=''/>" +
                    "<section class='list-left'>" +
                    "<h5 class='title'>" + obj[1] + "</h5>" +
                    "<p>" + obj[2] + "</p>" +
                    "<span class='adprice'>$290</span>" +
                    "<p class='catpath'>Mobile Phones » Brand</p>" +
                    "</section>" +
                    "<section class='list-right'>" +
                    "<span class='date'>Today, 17:55</span>" +
                    " <span class='cityname'>Grupo </span>" +
                    "<span class='cityname subcategoria'>" + $("#label-categoria").text() + "<span  class='label-subcategoria'>" + obj[5] + "</span>" + "</span>" +
                    "</section>" +
                    "<div class='clearfix'></div>" +
                    "<div class='clearfix'></div><div>" +
                    "<a  class='btn btn-primary ver_publicacion' value=" + obj[0] + ">Ver Anuncio </a>" +
                    "<p><span class='nombre'>" + obj[3] + "</span> <span class = 'apellido'> " + obj[4] + " </span></p> </div>" +
                    "<div class='clearfix'></div>" +
                    "</li>");

        });

        paginacion(resultado);
        $('.pagination li a.btn').on("click", listarAnuncios);
        $('.ver_publicacion').on("click", botonVer);
//        $('.btnEliminar').on("click", iniciarEliminar());
    } else {
           
        $("#listar").html("<h4>**No existen Anuncios**</h4>");
          $("#sel-subcategoria").empty();
    }






}

function listarSubcategorias() {
    listarAnuncios(true);
}

function buscar() {
    if ($("#input-buscar:empty").val() && $("#categorias-buscar").val() !== "") {

        listarAnuncios();
    }
}

function categoria() {
    $(location).attr('href', $("#categorias-buscar").val());
}

function botonVer() {

    enviarDatos("../ajax", "POST",
            "ver=ver&id=" + $.trim(+$(this).attr("value")) +
            "&nombre=" + $.trim($(this).siblings("p").children("span.nombre").text()) +
            "&apellido=" + $.trim($(this).siblings("p").children("span.apellido").text()) +
            "&categoriaSel=" + $("#categorias").val() +
            "&subCategoriaSel=" + $.trim($(this).parent("div").siblings(".list-right").find(".label-subcategoria").text()),
            "TEXT", "ver_linea_Publicacion");

}

function verAnuncio(resultado) {

    $(location).attr('href', "curso/anuncio/" + resultado);
}

function seleccionarJornadas() {
    enviarDatos("./../ajax", "POST", "listar=listar&jornadas=jornadas", "JSON", "listar_jornadas");

}



function listarJornadas(resultado) {

    $(".pagination li").remove();
    $("#listar li").remove();
    if (resultado) {
        $("#sub-categoria").remove();
        $("#sel-jornadas").append("<label id='label-jornadas'> Jornada: </label>"
                + "<select id='jornada'></select></div>");
        $("#jornada").append("<option></option>");
        $.each(resultado, function (pos, obj) {
            $("#jornada").append("<option value='" + obj + "'>" + obj + "</option>");
        });
        $("#jornada").on('change', seleccionarCategoria);

    }





//        $("#jornada").change(seleccionarCategoria);

}



function seleccionarCategoria() {
    $("#sel-subcategoria").empty();
    enviarDatos("./../ajax", "POST", "listar=listar&categoria=" + $('#categorias').val() + "&jornada=" + $('#jornada').val(), "JSON", "listar_categoria_Seleccionada");

}