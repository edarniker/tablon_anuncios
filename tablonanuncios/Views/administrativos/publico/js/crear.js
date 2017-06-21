$(document).ready(function () {

    iniciar();




});

function iniciar() {
    enviarDatos("../../ajax", "POST", "listar=listar", "JSON", "listar_categorias_Publico");
    calendario();
    $("#fechaCrearPublicacion").datepicker({minDate: 0, maxDate: "+1M"});
    $("#fechaCrearPublicacion").datepicker().datepicker("setDate", new Date());
    $("#botonCrearA").on("click", comprobar);

}

function comprobar() {

    var selCategoria = []
   



    var f = $("#fechaCrearPublicacion").datepicker("getDate");
    comprobarDate(f);

    f = convertDateOrderYear(f, "-");

//    if(is(f:boolean)){
//        
////       f=convertDate(f,"-");
//    }

    var valorPost = "titulo=" + $("#tituloCrear").val() + "&" + "descripcion=" + $("#descripcionCrear").val()
            + "&" + "categoria=" + $('select').val() +"&fechaPublicacion=" + f;
    enviarDatos("../../ajax", "POST", valorPost, "JSON", "crear_anuncio_Publico");
  
}



function listarCategoriaPublico(resultado) {    
    $("#categoria").prepend("<option></option>");
    $.each(resultado, function (pos, obj) {

        $("#categoria").prepend("<option>" + obj + "</option>");

    });
}

function guardadoDatosPublicos(resultado) {
  
    if (resultado["datos"]) {     
        comprobarImportacionPublicos("crear_ficheros_Publicos");
    } else{
        alert("error al almacenar los datos");
    }

}
function guardadoDatosFicheros(resultado) {
  
    if (resultado["datos"]) {    
       alert("guardado");
    } else{
        alert("error al almacenar los datos");
    }

}


