$(document).ready(function () {
    iniciar();
});
var alertify;

function iniciar() {
    enviarDatos("./../ajax", "POST", "listar=listar", "JSON", "listar_categorias");
    $("#categoria").change(seleccionarCategoria);
    calendario();
    $("#fechaPublicacion").datepicker({minDate: 0, maxDate: "+1M"});
    $("#fechaPublicacion").datepicker().datepicker("setDate", new Date());
    $("#botonEnviar").on("click", crear);

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
        enviarDatos("./../ajax", "POST", valorPost, "JSON", "crear_anuncio");
    }else{
     alertify.error("Algunos datos están incompletos"); 
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
function guardadoDatos(resultado) {
    if (resultado["datos"]) {
        comprobarImportacion("crear_ficheros");
    } else if (!resultado["datos"]) {
        alertify.error("error al almacenar los datos");
        $('#botonEnviar').attr("disabled", false);
    }

}


function resultado(resultado) {
    alertify.success('!Anuncio Guardado!');
   
    

}