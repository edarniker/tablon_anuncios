$(document).ready(function () {

    iniciar();

});


function iniciar() {
    listarCategorias();
    listarAnuncios();
    $('#btnModal-Eliminar').on("click", eliminar);
    $("#categorias").on('change', seleccionarCategoria);
    $("#ordenar").on('change', ordenar);
}
function listarCategorias() {
    enviarDatos("../ajax", "POST", "listar=listar", "JSON", "listar_categorias");
}


function listarAnuncios(subcategoria) {


    var pag = paginar($(this).attr("value"));


    $(".pagination li").remove();
    $("#listar tbody").empty();
    $("#listar tbody tr").remove();

    if (!subcategoria || $("#subcategoria").val() === undefined) {
        if (!$("#input-buscar:empty").val()) {
            enviarDatos("../ajax", "POST", "listar=listar&categoriaSel=" + $("#categorias").val() + "&orden=" + $("#ordenar").val() + "&pag=" + pag, "JSON", "listar_anuncios");
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
                + "&pag=" + pag, "JSON", "listar_anuncios");

    }

}



function seleccionarCategoria() {
    $("#sel-subcategoria").empty();
    if ($('#categorias').val() === "materia") {
        
        enviarDatos("./../ajax", "POST", "listar=listar&categoria=" + $('#categorias').val(), "JSON", "listar_categoria_Seleccionada");
        
    }
    listarAnuncios(false);
}


function ordenar() {
    listarAnuncios($("#subcategoria").val());

}


function listarCategoria(resultados) {
    $.each(resultados, function (pos, obj) {
        $("#categorias").append("<option value='" + obj + "'>" + obj + "</option>");
        $("#categorias-buscar").append("<option value='" + obj + "'>" + obj + "</option>");

    });


}


function listarCategoriaSeleccionada(resultado) {

    if (resultado) {
        $("#sel-subcategoria").empty();
        var palabra = $("#categorias").val().charAt(0).toUpperCase() + $("#categorias").val().slice(1).toLowerCase();
        $("#sel-subcategoria").append("<label id='label-categoria'>" + palabra + ": </label>"
                + "<select id='subcategoria'></select></div>");
        $("#subcategoria").append("<option></option>");
        $.each(resultado, function (pos, obj) {
            $("#subcategoria").append("<option value='" + obj + "'>" + obj + "</option>");

        });
        $("#subcategoria").on('change', listarSubcategorias);

    }




}


function listarSubcategorias() {
    listarAnuncios(true);
}


function listados(resultado) {


    if (resultado['registros']) {

        $.each(resultado['registros'], function (pos, obj) {


            $("#listar").append("<tr><td value=" + pos + ">" + pos + "</td>" +
                    "<td><h6 class='title'>" + obj[1] + "</h6></td>" +
                    "<td><p>" + obj[2] + "</p></td>" +
                    "<td><span class='date'>" + obj[3] + "</span></td>" +
                    "<td><span class='date'>" + obj[4] + "</span></td>" +
                    "<td><a class='btn btn-primary btn-xs'  data-title='Edit'  value=" + obj[0] + "><span class='glyphicon glyphicon-edit'></span></a></td>" +
                    "<td><a class='btn btn-danger btn-xs'  value=" + obj[0] + " id=" + pos + " ><span class='glyphicon glyphicon-trash'></span></a></td>");


        });
        $('a.btn-danger').on("click", botonEliminar);

        $('a.btn-primary').on("click", botonEditar);
        paginacion(resultado);
        $('.pagination li a.btn').on("click", listarAnuncios);

        $("#listar thead").show();

    } else {

        $("#listar thead").hide();
//        $("#listar tbody tr").empty();
        $("#listar tbody").html("<h4>**No existen Anuncios**</h4>");
    }






}


function botonEditar() {
    enviarDatos("../ajax", "POST", "editar=editar&id=" + $(this).attr("value"), "TEXT", "listar_linea_Anuncio");
}

function actualizarAnuncio() {
    $(location).attr('href', 'editar');
}



//function botonesEliminar(){   
//   $('#btnModal-Eliminar').on("click",eliminar); 
//}

function botonEliminar() {

//     id=$(this).parents("tr").children().eq(0).attr('value');   
    $(this).attr({'data-title': 'Delete', 'data-toggle': 'modal', 'data-target': '#delete'});
    $("#btnModal-Eliminar").val($(this).attr('value'));

}

function eliminar() {

    enviarDatos("../ajax", "POST", "eliminar=eliminar&id=" + $(this).attr("value"), "TEXT", "eliminar_anuncio");
}

function cerrarModal() {
    $(".modal .close").click();
//    $(".pagination li").remove();
//    $("#listar tbody").empty();
    listarAnuncios();



}


