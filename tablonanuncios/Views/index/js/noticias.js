function iniciarPortada() {
    iniciar();
}



function iniciar() {
  
    
     var pag = paginar($(this).attr("value"));


 var categoria = window.location.pathname.substring(window.location.pathname.length, window.location.pathname.lastIndexOf('/') + 1);
    categoria = categoria.replace(/%20/g, ' ');   


    $(".pagination li").remove();
    $("#listar tbody").empty();
    $("#listar tbody tr").remove();
     enviarDatos("../ajaxPublico", "POST", "listar=listar&categoria="+categoria + "&pag=" + pag, "JSON", "listar_noticias");

}


function listados(resultado) {

    if (resultado['registros']) {
//      var  f= new Fecha("2017-06-15");
//     alert(convertFechaDiaNombre("2017-06-15"));
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
    } else {
        $("#listar thead").remove();
//        $("#listar tbody").remove();
        $("#listar tbody").html("<h4>**No existen Anuncios**</h4>");




    }
 
  


}


