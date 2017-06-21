$(document).ready(function () {


    iniciarImportar();


});

function iniciarImportar() {

//    $("#importar").on("click", comprobarImportacion);



    $("#imagenes").on("change", subirImagenes);
    $("#pdf").on("change", subirPdf);
//    $("#file").on("change", subirFile);
    $(".delete").on("click", borrarImagenes);
    $(".delete").on("click", borrarPdf);
    $("#guardar").on("click", guardarAlumnosFile);



}

function subirImagenes() {

    /*limpiar vista previa*/

    //obtenemos un array con los datos del archivo


    var file = $("#imagenes")[0].files;

//    $(".vista-previa").remove();
    $(".idimg").remove();


    /*url de la imagen*/

//    var navegador= window.URL || window.webkitURL;
    /*recorer archivos*/
    $.each(file, function (pos, obj) {
//           alert(obj[pos].name);



        if (obj.size > 1024 * 1024) {
            $("#parrafo-img").html("<p style='color:red'> el archivo " + obj.name + " supera el maximo permitido 1GB</p>");
        } else if (obj.type != 'image/jpeg' && obj.type != 'image/jpg') {
            $("#parrafo-img").html("<p style='color:red'> el archivo " + obj.name + " no es del tipo de imagen permitida</p>");
        } else {
            if (pos <= 0) {

                var objeto_url = URL.createObjectURL(obj);
                $(".vista-previa").prepend('<img src=' + objeto_url + ' width="150px height="100auto">');
                $("#parrafo-img").html("<p>" + obj.name + " </p><br>");
//            $("#vista-previa").append("<img src="+objeto_url+"width='250' height='250'");
            } else if (file.length <= 3) {
                var objeto_url = URL.createObjectURL(obj);
                $(".btn-import-img").before("<div class='idimg'><div class='custom-input-file'>\n\
                               <div class='vista-previa'><img src='" + objeto_url + "' width='150px' height='100px'></div>\n\
                               </div><p  class='text-muted text-center archivo'>" + obj.name + "</p><br><br></div>");



            } else {
                borrarImagenes();
                $("#parrafo-img").html("<p style='color:red'>No puede subir mas de 3 imagenes </p>");
            }

        }

    });
    if ($("#imagenes")[0].files.length > 0)
        comprobarImportacion("validar_imagenes");


}



function subirPdf() {

    /*limpiar vista previa*/
    $(".idpdf").remove();
    //obtenemos un array con los datos del archivo
    var file = $("#pdf")[0].files;

    /*recorer archivos*/
    $.each(file, function (pos, obj) {
        if (obj.size > 1024000 * 1024000) {
            $("#parrafo-pdf").html("<p style='color:red'> el archivo " + obj.name + " supera el maximo permitido 1GB</p>");
        } else if (obj.type != 'application/pdf') {
            $("#parrafo-pdf").html("<p style='color:red'> el archivo " + obj.name + " no es del tipo de imagen permitida</p>");
        } else {
            if (pos <= 0) {
                $(".custom-input-file-pdf").css("color", "#E14C11");
                $("#parrafo-pdf").html("<p>" + obj.name + " </p><br>");
//            $("#vista-previa").append("<img src="+objeto_url+"width='250' height='250'");
            } else if (file.length <= 3) {
                $(".btn-import-pdf").before("<div class='idpdf'><div class='custom-input-file-pdf'>\n\
                \n\ <i class='fa fa-file-pdf-o' aria-hidden='true'></i></div>\n\
                <p  class='text-muted text-center archivo'>" + obj.name + "</p><br><br></div>");
                $(".custom-input-file-pdf").css("color", "#E14C11");
            } else {
                borrarImagenes();
                $("#parrafo-pdf").html("<p style='color:red'>No puede subir mas de 3 imagenes </p>");
            }

        }

    });
     if ($("#imagenes")[0].files.length > 0)
        comprobarImportacion("validar_pdf");
   

}

function subirFile() {

    /*limpiar vista previa*/
    $(".idFile").remove();
    //obtenemos un array con los datos del archivo
    var file = $("#file")[0].files;

    /*recorer archivos*/
//    $.each(file, function (pos, obj) {
//        if (obj.size > 1024 * 1024) {
//            $("#parrafo-pdf").html("<p style='color:red'> el archivo " + obj.name + " supera el maximo permitido 1MB</p>");
//        } else if (obj.type != 'application/csv') {
//            $("#parrafo-pdf").html("<p style='color:red'> el archivo " + obj.name + " no es del tipo permitido</p>");
//        } else {
//            if (pos <= 0) {
//                $(".custom-input-file-pdf").css("color", "#E14C11");
//                $("#parrafo-pdf").html("<p>" + obj.name + " </p><br>");
////            $("#vista-previa").append("<img src="+objeto_url+"width='250' height='250'");
//            } else if (file.length <= 3) {
//                $(".btn-import-pdf").before("<div class='idpdf'><div class='custom-input-file-pdf'>\n\
//                \n\ <i class='fa fa-file-pdf-o' aria-hidden='true'></i></div>\n\
//                <p  class='text-muted text-center archivo'>" + obj.name + "</p><br><br></div>");
//                $(".custom-input-file-pdf").css("color", "#E14C11");
//            } else {
//                borrarImagenes();
//                $("#parrafo-pdf").html("<p style='color:red'>No puede subir mas de 3 imagenes </p>");
//            }
//
//        }
//
//    });
     if ($("#file")[0].files.length > 0)
        comprobarImportacionFile();
   

}


function borrarImagenes() {
    $("#imagenes").attr("type", "text");
    $(".vista-previa").empty();
    $("#parrafo-img").text("Archivo...");
    $("#imagenes").attr("type", "file");
    $(".idimg").remove();
}

function borrarPdf() {
    $("#pdf").attr("type", "text");
    $(".custom-input-file-pdf").css("color", "#E1E1E1");
    $("#parrafo-pdf").text("Archivo...");
    $("#pdf").attr("type", "file");
    $(".idpdf").remove();
}


function comprobarImportacion(tipo) {
    var formData = new FormData($("#formAnuncio")[0]);
    enviarDatoFichero("../ajax", "POST", formData, "text", tipo);

}
function comprobarImportacionPublicos(tipo) {    
    var formData = new FormData($("#formAnuncio")[0]);       
    enviarDatoFichero("../../ajax", "POST", formData, "text", tipo);

}



function guardarAlumnosFile(){
    var formData = new FormData($("#formListado").get(0));
    formData.append("user", 2);   
    enviarDatoFichero("../../ajax", "POST", formData, "text", "crear_alumnos"); 
}
function comprobarImportacionFile(){
    var formData = new FormData($("#formListado").get(0));
    formData.append("id", 850601);
    
    enviarDatoFichero("../../ajax", "POST", formData, "text", "validar_file");
}

function borrarArchivos(categoria) {   
    enviarDatos("../ajax", "POST", 'eliminar=eliminar&categoria='+categoria, "text", 'eliminar_archivos');

}

function borrarArchivosPublicos(categoria) {   
    enviarDatos("../../ajax", "POST", 'eliminar=eliminar&categoria='+categoria, "text", 'eliminar_archivos');

}


