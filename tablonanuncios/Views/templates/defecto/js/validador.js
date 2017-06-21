function validarCrear() {
//    $("span.help-block").hide();


    var v1 = 0, v2 = 0, v3 = 0, v4 = 0, v5=0;
    v1 = validacion('categoria');
    v2 = validacion('categoria-check');
    v3 = validacion('titulo');
    v4 = validacion('descripcion');
    v5 = validacion('fecha');
    if (v1 === false || v2 === false || v3 === false || v4 === false || v5===false) {
        return false;
    }
    return true;



}



function validacion(campo) {
    if (campo === 'categoria') {
        var valor = $("#categoria").val();
        if (valor == null || valor.length == 0) {
            $("#categoria").parent().parent().attr("class", "form-group has-error");
            $("#categoria").parent().children("span").text("Debe seleccionar una Categoria").show();
            return false;
        } else if (!isNaN(valor)) {
            $("#categoria").parent().parent().attr("class", "form-group has-error");
            $("#categoria").parent().children("span").text("Debe seleccionar una Categoria").show();
            return false;
        } else {
            $("#categoria").parent().parent().attr("class", "form-group");
            $("#categoria").parent().children("span").hide();
            return true;
        }
    }

    if (campo === 'categoria-check' && $('#categoria').val() !== "instituto"  && $('#categoria').val() !== "curso") {
    
        if (!$(".inlineCheckbox").is(':checked')) {
        
//             $(".inlineCheckbox").parent().parent().parent().attr("class", "col-sm-9 checkbox-sel-categoria has-error");
            $("#mensaje-check").attr("class", "col-sm-9 has-error");
            $("#mensaje-check").children("span").text("Debe seleccionar una Opción").show();
            return false;
        } else {
            $("#mensaje-check").attr("class", "col-sm-9");
            $("#mensaje-check").children("span").hide();
         
            return true;

        }
    }else if(campo === 'categoria-check' && $('#categoria').val() ==="curso" && $("#sub-categoria").length > 0){
        if (!$(".inlineCheckbox").is(':checked')) {
        alert("bbbbbb");
//             $(".inlineCheckbox").parent().parent().parent().attr("class", "col-sm-9 checkbox-sel-categoria has-error");
            $("#mensaje-check").attr("class", "col-sm-9 has-error");
            $("#mensaje-check").children("span").text("Debe seleccionar una Opción").show();
            return false;
        } else {
            $("#mensaje-check").attr("class", "col-sm-9");
            $("#mensaje-check").children("span").hide();
         
            return true;

        } 
    }
    
    



    if (campo === 'titulo') {
        var valor = $("#titulo").val();

        if (valor == null || valor.length == 0) {
            $("#titulo").parent().parent().attr("class", "form-group has-error");
            $("#titulo").parent().children("span").text("Debe Escribir un Titulo").show();
            return false;
        } else if (!isNaN(valor)) {
            $("#titulo").parent().parent().attr("class", "form-group has-error");
            $("#titulo").parent().children("span").text("NO se permite Escribir numeros").show();
            return false;
        } else if (valor.length < 10) {
            $("#titulo").parent().parent().attr("class", "form-group has-error");
            $("#titulo").parent().children("span").text("Debe Escribi un Titulo con mas contenido").show();
            return false;
        } else {
            $("#titulo").parent().parent().attr("class", "form-group");
            $("#titulo").parent().children("span").hide();
            return true;
        }
    }


    if (campo === "descripcion") {
        var valor = $("#descripcion").val();

        if (valor == null || valor.length == 0) {
            $("#descripcion").parent().parent().attr("class", "form-group has-error");
            $("#descripcion").parent().children("span").text("Debe Escribir un descripcion").show();
            return false;
        } else if (!isNaN(valor)) {
            $("#descripcion").parent().parent().attr("class", "form-group has-error");
            $("#descripcion").parent().children("span").text("NO se permite Escribir numeros").show();
            return false;
        } else if (valor.length < 10) {
            $("#descripcion").parent().parent().attr("class", "form-group has-error");
            $("#descripcion").parent().children("span").text("Debe Escribi un Descripcion con mas contenido").show();
            return false;
        } else {
            $("#descripcion").parent().parent().attr("class", "form-group");
            $("#descripcion").parent().children("span").hide();
            return true;
        }

    }


    if (campo === 'fecha') {
        var f = $("#fechaPublicacion").datepicker("getDate");

//       comprobarDate(f);

// alert(!(/^([0-9]{2}\-[0-9]{2}\-[0-9]{4})$/.test($("#fechaPublicacion").val())));
        if (comprobarDate(f) !== true) {
            $("#fechaPublicacion").parent().parent().attr("class", "form-group has-error");
            $("#fechaPublicacion").parent().children("span").text(comprobarDate(f)).show();
            return false;
        } else {
            $("#fechaPublicacion").parent().parent().attr("class", "form-group");
            $("#fechaPublicacion").parent().children("span").hide();
            return true;
        }
    }
}
