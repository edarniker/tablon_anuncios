$(document).ready(function () {

    iniciar();

});


function iniciar() {
    listarCategorias();
     $("#categorias").on('change', seleccionarCategoria);
    listarAnuncios();
    $("#ordenar").on('change', ordenar);
}

function listarCategorias() {
    enviarDatos("./ajax", "POST", "listar=listar", "JSON", "listar_categorias_Autorizar");
}

function listarCategoria(resultados) {
    $.each(resultados, function (pos, obj) {
        $("#categorias").append("<option value='" + obj + "'>" + obj + "</option>");
        $("#categorias-buscar").append("<option value='" + obj + "'>" + obj + "</option>");

    });


}

function seleccionarCategoria() {  
    listarAnuncios(false);
}

function listarAnuncios(subcategoria) {
//        alert($pag);

    var pag = paginar($(this).attr("value"));





    $(".pagination li").remove();
    $("#listar tbody").empty();
    $("#listar tbody tr").remove();

    if (!subcategoria || $("#subcategoria").val() === undefined) {
        if (!$("#input-buscar:empty").val()) {
            enviarDatos("./ajax", "POST", "listar=listar&categoria=" + $("#categorias").val() + "&orden=" + $("#ordenar").val() + "&pag=" + pag, "JSON", "listar_anuncios_Autorizar");
        } else {
            enviarDatos("../ajax", "POST",
                    "listar=listar" +
                    "&categoriaSel=" + $("#categorias-buscar").val() +
                    "&orden=" + $("#ordenar").val() +
                    "&pag=" + pag +
                    "&buscar=" + $("#input-buscar").val(),
                    "JSON", "listar_busqueda_Publicaciones");
        }
    } else {

        enviarDatos("../ajax", "POST", "listar=listar"
                + "&categoriaSel=" + $("#categorias").val()
                + "&subCategoriaSel=" + $("#subcategoria").val()
                + "&orden=" + $("#ordenar").val()
                + "&pag=" + pag, "JSON", "listar_anuncios_Autorizar");

    }


}


function listados(resultado) {
 

    if (resultado['registros']) {
       
        $.each(resultado['registros'], function (pos, obj) {


            $("#listar").append("<tr><td value='titulo'>" + pos + "</td>\n\
                  <td><h6 class='title'>" + obj[2] + "</h6></td>\n\
//\n\            <td><p>" + obj[3] + "</p></td>\
//               <td><p class=''>" + obj[6] + "</p></td>\
//               <td><p class=''>" + obj[7] + "</p></td>\\n\
             <td><p class=''>" + obj[8] + "</p></td>\\n\
             <td><p class=''>" + obj[5] + "</p></td>\
//              <td><span class='date'>" + convertDate(obj[4]) + " " + convertHora(obj[4]) + "</span></td>\n\
                <td class='hidden' class='mail' value=" + obj[1] + "></td>\n\"\n\
//              <td><a class='btn btn-primary btn-xs'data-title='Autorizar' value=" + obj[0] + "><span class='glyphicon glyphicon-ok'></a>\n\
                <a class='btn btn-danger btn-xs'  value=" + obj[0] + "><span class='glyphicon glyphicon-remove'></span></a></td></tr>");
   
        });
        paginacion(resultado);
        $('.pagination li a.btn').on("click", listarAnuncios);
        $('a.btn-info').on("click", botonAutorizar);
        $('.btnEliminar').on("click", iniciarEliminar());
    } else {
        $("#listar thead").remove();
//        $("#listar tbody").remove();
        $("#listar tbody").html("<h4>**No existen Anuncios para Validar**</h4>");
    }


}

function ordenar() {
    listarAnuncios($("#subcategoria").val());

}

function botonAutorizar() {
    enviarDatos("./ajax", "POST", "crear=crear&id=" + $(this).attr("value"), "JSON", "crear_autorizacion");
}




