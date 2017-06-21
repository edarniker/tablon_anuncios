function iniciarPortada() {
    iniciar();

}

function iniciar() {
    listarAnuncios();
}

function listarAnuncios() {
    var pag = paginar($(this).attr("value"));
    $(".pagination li").remove();
//    $("#listar tbody").empty();
//    $("#listar tbody tr").remove();
     $("#anuncios-portada").empty();
    enviarDatos("ajaxPublico", "POST", "listar=listar&categoria=Portada" + "&pag=" + pag, "JSON", "listar_publicacion");

}


function listados(resultado) {

    if (resultado['registros']) {     
        $.each(resultado['registros'], function (pos, obj) {
            $("#anuncios-portada").append(
                    "<div class='large-widget m30'>" +
                    "<div class='post clearfix'>" +
                    "<div class='title-area'>" +
                    "<a href='#'><h3>" + obj[0] + "</h3></a>" +
                    "<div class='large-post-meta'>" +
                    "<span class='avatar'>"+obj[3]+"</span>" +
                    "<small>|</small>" +
                    "<span><a href='category.html'><i class='fa fa-clock-o'></i>  "+ FechaDiaNombre(obj[2]) +"</a></span>" +
                    "<span class='hidden - xs'><a href='single.html'><i class='fa fa - eye'></i> 1223</a></span>" +
                    "</div>" +
                    "</div>" +                    
                    "</div>" +
                    "<div class='post-desc category-desc'>" +
                    "<p>" + obj[1] + "</p>" +                
                    "</div>" +
                    "</div>"
                    );
        });
        paginacion(resultado);
        $('.pagination li a.btn').on("click", listarAnuncios);
    } else {
        $("#listar thead").remove();
//        $("#listar tbody").remove();
        $("#listar tbody").html("<h4>**No existen Anuncios**</h4>");




    }






}



