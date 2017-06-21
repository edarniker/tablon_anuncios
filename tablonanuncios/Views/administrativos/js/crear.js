$(document).ready(function () {

    iniciar();




});

function iniciar() {
    enviarDatos("./../ajax", "POST", "listar=listar", "JSON", "listar_categorias");

    $("#categoria").change(seleccionarJornadas);
    calendario();

    $("#fechaCrearPublicacion").datepicker({minDate: 0, maxDate: "+1M"});
    $("#fechaCrearPublicacion").datepicker().datepicker("setDate", new Date());
    $("#botonCrearA").on("click", validar);
    $("#botonCrearA").on("click", crear);
}

function comprobar() {

    $("#categoria").change(validar);
    $("#titulo").keyup(validar);
    $("#descripcion").keyup(validar);
    $("#fechaPublicacion").keyup(validar);
    $("#fechaPublicacion").change(validar); 





}


function validar() {


    if (validarCrear()) {

        return true;

    }
    return false;
}

function crear() {

    var enviar = validar();
    if (enviar) {


        if ($('#categoria').val() !== "curso" && $('#categoria').val() !== "") {
            var selCategoria = []
            if ($(".inlineCheckbox").is(':checked')) {
                $(".inlineCheckbox:checked").each(function (i) {
                    selCategoria[i] = $(this).val();
                });
            } else {
                alertify.error("Selecciones un subCategoria");
            }
        }
        var f = $("#fechaPublicacion").datepicker("getDate");

        f = convertDateOrderYear(f, "-");

        var valorPost = "titulo=" + $("#tituloCrear").val() + "&" + "descripcion=" + $("#descripcionCrear").val()
                + "&" + "categoria=" + $('select').val() + "&fechaPublicacion=" + f;
        if ($('#categoria').val() !== "curso") {


            valorPost += "&categoriaSel=" + JSON.stringify(selCategoria);
        }


        enviarDatos("./../ajax", "POST", valorPost, "JSON", "crear_anuncio");

    }

}




function seleccionarCategoria() {
    $("#sub-categoria").remove();
    $("#jornadas").remove();
    enviarDatos("./../ajax", "POST", "listar=listar&categoria=" + $('#categoria').val() + "&jornada=" + $('#jornada').val(), "JSON", "listar_categoria_SeleccionadaAdministrativos");

}

function listarCategoria(resultado) {
    $("#categoria").prepend("<option></option>");
    $.each(resultado, function (pos, obj) {

        $("#categoria").prepend("<option>" + obj + "</option>");

    });

}

function listarCategoriaSeleccionada(resultado) {
    if (resultado) {
        $("#sub-categoria").remove();
        $("#grup-jornadas").after("<div class='form-group' id='sub-categoria'><label class='col-sm-3 control-label' id='sel-categoria'></label>"
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

        $("#inlineCheckboxAll").on("change", checkAll);


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



function comprobar() {

    var selCategoria = []
    if ($(".inlineCheckbox").is(':checked')) {
        $(".inlineCheckbox:checked").each(function (i) {
            selCategoria[i] = $(this).val();
        });
    } else {
        alert("no chekeado");
    }




    var f = $("#fechaCrearPublicacion").datepicker("getDate");
    comprobarDate(f);

    f = convertDateOrderYear(f, "-");

//    if(is(f:boolean)){
//        
////       f=convertDate(f,"-");
//    }
//    if (!$("#sub-jornadas")) {
//        var valorPost = "titulo=" + $("#tituloCrear").val() + "&" + "descripcion=" + $("#descripcionCrear").val()
//                + "&" + "categoria=" + $('#categoria').val() + "&categoriaSel=" + JSON.stringify(selCategoria) + "&fechaPublicacion=" + f;
//        enviarDatos("./../ajax", "POST", valorPost, "JSON", "crear_anuncio");
//
//    } else {
    var valorPost = "titulo=" + $("#tituloCrear").val() + "&" + "descripcion=" + $("#descripcionCrear").val()
            + "&" + "categoria=" + $('#categoria').val() + "&categoriaSel=" + JSON.stringify(selCategoria) + "&jornadas=" + $("#jornada").val() + "&fechaPublicacion=" + f;
    enviarDatos("./../ajax", "POST", valorPost, "JSON", "crear_anuncio_Administrativos");
//    }

}

function guardadoDatos(resultado) {
    alert("soy yo");
    if (resultado["datos"]) {
        comprobarImportacion("crear_anuncio");
    } else if (!resultado["datos"]) {
        alert("error al almacenar los datos");
    } else {
        alert("guardo correctamente");
    }

}


function seleccionarJornadas() {
    enviarDatos("./../ajax", "POST", "listar=listar&jornadas=jornadas", "JSON", "listar_jornadas");

}



function listarJornadas(resultado)
{
    $("#sub-categoria").remove();
    $("#grup-jornadas").remove();
    $("#grup-categoria").after("<div class='form-group' id='grup-jornadas'>" +
            "<label class='col-sm-3 control-label'>Jornada<span>*</span></label>" +
            "<div class='col-sm-7'>" +
            "<select id='jornada' class='form-control' name='jornada'>" +
            "<label><span>*</span></label>" +
            " </select>" +
            "</div>" +
            "</div>");


    $("#jornada").prepend("<option></option>");
    $.each(resultado, function (pos, obj) {
        $("#jornada").prepend("<option>" + obj + "</option>");
    });
    $("#jornada").change(seleccionarCategoria);

}



