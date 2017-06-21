$(document).ready(function () {
    
      iniciar();
   

   
});


function iniciar(){
    enviarDatos("./../ajax", "POST", "listar=listar", "JSON", "listar_categorias");
    listarLineaAnuncio();
    $("#botonEditarA").on("click", comprobar);
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
    if ($('#categoria').val() !== "curso") {
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

function rellenar(resultado) {

    if (resultado['registro']) {
        $.each(resultado['registro'], function (pos, $obj) {

            if (pos == 1) {
                $("#tituloEditar").val($obj[1]);
                $("#descripcionEditar").val($obj[2]);
                $("#fechaEditarPublicado").val($obj[3]);
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

//        paginacion(resultado);
//        $('.pagination li a.btn').on("click", listarAnuncios);
//        $('.ver_publicacion').on("click", botonVer);
//        $('.btnEliminar').on("click", iniciarEliminar());



    }




}

function comprobar() {
    if ($('#categoria').val() !== "curso") {
        var selCategoria = []
        if ($(".inlineCheckbox").is(':checked')) {
            $(".inlineCheckbox:checked").each(function (i) {
                selCategoria[i] = $(this).val();
            });
        } else {
            alert("no chekeado");
        }
    }


    var f = $("#fechaEditarPublicacion").datepicker("getDate");
    comprobarDate(f);

    f = convertDateOrderYear(f, "-");

    var valorPost = "titulo=" + $("#tituloEditar").val() + "&" + "descripcion=" + $("#descripcionEditar").val()
            + "&" + "categoria=" + $('select').val() + "&fechaPublicacion=" + f;
    if ($('#categoria').val() !== "curso") {


        valorPost += "&categoriaSel=" + JSON.stringify(selCategoria);
    }

    enviarDatos("./../ajax", "POST", valorPost, "JSON", "editar_anuncio");
}

function editarDatos(resultado) {

    if (resultado["datos"]) {
        borrarArchivos($('select').val());
    } else if (!resultado["datos"]) {
        alert("error al almacenar los datos");
    }

}

function subirFicheros() {
    comprobarImportacion("crear_anuncio");
}
