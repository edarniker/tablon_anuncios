$(document).ready(function () {

    iniciar();



});


function iniciar() {
    enviarDatos("./../ajax", "POST", "listar=listar", "JSON", "listar_categorias");
    editarLineaCategoria();
    $("#categoria").change(seleccionarCategoria);
    calendario();
    $("#fechaPublicacion").datepicker({minDate: 0, maxDate: "+1M"});
    $("#fechaPublicacion").datepicker().datepicker("setDate", new Date());
    $("#botonEnviar").on("click", crear);

}


function comprobar() {

    $("#categoria").change(validar);
    $("#inlineCheckboxAll").change(validar);
    $(".inlineCheckbox").change(validar);
    $("#titulo").keyup(validar);
    $("#descripcion").keyup(validar);
    $("#fechaPublicacion").keyup(validar);
    $("#fechaPublicacion").change(validar);

}


function validar() {
    if (validarCrear()) {
        $('#botonEnviar').attr("disabled", false);
        return true;
    }
    $('#botonEnviar').attr("disabled", true);
    return false;
}



function crear() {

    comprobar();
    var enviar = validar();
    if (enviar) {

        if ($('#categoria').val() !== "curso" && $('#categoria').val() !== "") {
            var selCategoria = []
            if ($(".inlineCheckbox").is(':checked')) {
                $(".inlineCheckbox:checked").each(function (i) {
                    selCategoria[i] = $(this).val();
                });

            }
        }
        var f = $("#fechaPublicacion").datepicker("getDate");
        f = convertDateOrderYear(f, "-");


        var valorPost = "titulo=" + $("#titulo").val() + "&" + "descripcion=" + $("#descripcion").val()
                + "&" + "categoria=" + $('select').val() + "&fechaPublicacion=" + f;
        if ($('#categoria').val() !== "curso") {
            valorPost += "&categoriaSel=" + JSON.stringify(selCategoria);
        }
        enviarDatos("./../ajax", "POST", valorPost, "JSON", "editar_anuncio");
    }else{
      alertify.error("Algunos datos están incompletos");
    }

}



function editarLineaCategoria() {
    enviarDatos("../ajax", "POST", "ver=ver", "JSON", "ver_linea_Categoria");
}

function verCategoria(resultado) {
    if (resultado['registro']) {
        $.each(resultado['registro'], function (pos, $obj) {

            if (pos == 1) {
                $('select').val($obj[0]);
                seleccionarCategoria();
            }

//            $(".inlineCheckbox").each(function (i) {
////                if ($(".inlineCheckbox").val() == $obj[6]) {
//                alert("asdsa");
////                }
//            });



        });
    }

    listarLineaAnuncio();
}


function listarLineaAnuncio() {
    enviarDatos("../ajax", "POST", "editar=editar", "JSON", "editar_linea_Anuncio");
}



function listarCategoria(resultado) {
    $("select").prepend("<option></option>");
    $.each(resultado, function (pos, obj) {
        $("select").prepend("<option>" + obj + "</option>");

    });

}


function seleccionarCategoria() {
    $("#sub-categoria").remove();
    if ($('#categoria').val() === "materia") {
        enviarDatos("./../ajax", "POST", "listar=listar&categoria=" + $('#categoria').val(), "JSON", "listar_categoria_Seleccionada");
    }
}

function listarCategoriaSeleccionada(resultado) {
    if (resultado) {
        $("#sub-categoria").remove();
        $("#grup-categoria").after("<div class='form-group' id='sub-categoria'><label class='col-sm-3 control-label' id='sel-categoria'></label>"
                + "<div class='col-sm-9 checkbox-sel-categoria' >"
                + "</div></div>");

        var palabra = $("#categoria").val().charAt(0).toUpperCase() + $("#categoria").val().slice(1).toLowerCase();


        $("#sel-categoria").html(palabra + "<span>*</span>");
        $(".checkbox-sel-categoria").empty();
        $(".checkbox-sel-categoria").append("<div class='controls span2 cat1'></div>");
        $(".cat1").append("<label class='checkbox'><input type='checkbox' value='all' id='inlineCheckboxAll'>Todos</label>");




        var con = 1;
        $.each(resultado, function (pos, obj) {
            if (pos % 2 === 0) {
                con++;
                $(".checkbox-sel-categoria").append("<div class='controls span2 cat" + con + "'></div>");

            }

            $(".cat" + con).append("<label class='checkbox'><input type='checkbox' value='" + obj + "' class='inlineCheckbox'>" + obj + "</label>");

        });
        $(".checkbox-sel-categoria").append("<div class='col-sm-9' id='mensaje-check' ><span class='help-block'></span></div>");
        $("#inlineCheckboxAll").on("change", checkAll);
          $("#inlineCheckboxAll").change(validar);
        $(".inlineCheckbox").change(validar);
    }

}

function checkAll() {
    if ($(this).is(':checked')) {

        $(".inlineCheckbox").each(function () {
            $(".inlineCheckbox").prop('checked', true);
        });

    } else {
        $(".inlineCheckbox").each(function () {
            $(".inlineCheckbox").prop('checked', false);
        });
    }

}

function rellenar(resultado) {

    if (resultado['registro']) {
        $.each(resultado['registro'], function (pos, $obj) {

            if (pos == 1) {
                $("#titulo").val($obj[1]);
                $("#descripcion").val($obj[2]);
                $("#fechaPublicado").val($obj[3]);
//                $('select').val($obj[5]);
//                seleccionarCategoria();
            }
            if ($(".inlineCheckbox")) {
                $(".inlineCheckbox").each(function (i) {
                    if ($(this).val() == $obj[6]) {
                        $(this).prop('checked', true);
                    }
                });
            } else {
                $('select').val($obj[5]);
            }


        });
    }
    if (resultado['imagenes']) {
//      $(".custom-input-file").remove(); 
//      $("#parrafo-img").empty(); 
        $.each(resultado['imagenes'], function (pos, $obj) {
            a = $obj.split("/");
            $("#import-img").prepend("<div class='idimg'><div class='custom-input-file'>\n\
                               <div class='vista-previa'><img src='" + $obj + "' width='150px' height='100px'></div>\n\
                               </div><p  class='text-muted text-center archivo'>" + a[a.length - 1] + "</p><br><br></div>");




        });
    }

    if (resultado['pdf']) {
        var a;
//         $(".custom-input-file-pdf").hide();
//        $("#parrafo-pdf").empty();
        $.each(resultado['pdf'], function (pos, obj) {

            a = obj.split("/");

            $("#grup-pdf").before("<div class='idpdf'><div class='custom-input-file-pdf'>" +
                    "<i class='fa fa-file-pdf-o' aria-hidden='true'></i></div>" +
                    "<p  class='text-muted text-center archivo'>" + a[a.length - 1] + "</p><br><br></div>");
            $(".custom-input-file-pdf").css("color", "#E14C11");




        });

    }
//        paginacion(resultado);
//        $('.pagination li a.btn').on("click", listarAnuncios);
//        $('.ver_publicacion').on("click", botonVer);
//        $('.btnEliminar').on("click", iniciarEliminar());









}



function editarDatos(resultado) {

    if (resultado["datos"]) {
        editarArchivos($('select').val());
    } else if (!resultado["datos"]) {
        alert("error al almacenar los datos");
    }

}

function subirFicheros() {
    comprobarImportacion("crear_anuncio");
}
