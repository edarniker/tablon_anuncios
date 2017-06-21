function conexion(url, tipo, data, retorno, accion) {
//    alert(url + "?accion=" + accion);
//     alert("datos"+data);
    $.ajax({
        url: url + "?accion=" + accion,
        type: tipo,
        data: data,
        dataType: retorno


    })
            //cierto
            .done(function (resultados) {
                acciones(resultados, accion);
                console.log("success");
            })
            //falso
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });
}

function conexionFichero(url, tipo, data, retorno, accion) { 

    $.ajax({
        url: url + "?accion=" + accion,
        type: tipo,
        data: data,
        dataType: retorno,
        cache: false,
        contentType: false,
        processData: false

    })

            //cierto
            .done(function (resultados) {
                acciones(resultados, accion);
                console.log("success");
            })
            //falso
            .fail(function () {
                console.log("error");
            })
            .always(function () {
                console.log("complete");
            });




}


function acciones(resultados, accion) {
    try {
        //validar
//        if (accion === "validar_login") {
////            cerrarModal();     
//        }
        //ver
        if (accion === "ver_linea_Publicacion") {
            verAnuncio(resultados);
//            cerrarModal();     
        } else if (accion === "ver_linea_Categoria") {
            verCategoria(resultados);
        }
        //crear         
        if (accion === "crear_anuncio") {
            guardadoDatos(resultados);
        } else if(accion === "crear_ficheros"){
            resultado(resultado);
        }else if (accion === "crear_anuncio_Publico") {
            guardadoDatosPublicos(resultados);
        } else if (accion === "crear_autorizacion") {
            actualizar();
        } else if (accion === "crear_usuario") {
            guardado(resultados);
        }


        //listar
        if (accion === "listar_anuncios_Autorizar") {
            listados(resultados);
        } else if (accion === "listar_categorias") {
            listarCategoria(resultados);
        } else if (accion === "listar_categorias_Autorizar") {
            listarCategoria(resultados);
        } else if (accion === "listar_categorias_Publico") {
            listarCategoriaPublico(resultados);
        } else if (accion === "listar_categoria_Seleccionada") {
            listarCategoriaSeleccionada(resultados);
        } else if (accion === "listar_categoria_SeleccionadaAdministrativos") {
            listarCategoriaSeleccionada(resultados);
        } else if (accion === "listar_publicacion") {
            listados(resultados);
        } else if (accion === "listar_publicacion_Administrativos") {
            listados(resultados);
        } else if (accion === "listar_busqueda_Publicaciones") {
            categoria();
        } else if (accion === "listar_anuncios") {
            listados(resultados);
        } else if (accion === "listar_linea_Anuncio") {
            actualizarAnuncio();
        } else if (accion === "listar_jornadas") {
            listarJornadas(resultados);
        }


        //editar
        if (accion === "editar_linea_Anuncio") {
            rellenar(resultados);
        }
//        } else if (accion === "editar_anuncio") {
//            editarDatos(resultados);
//        }


        //eliminar
        if (accion === "eliminar_anuncio") {
            cerrarModal();
        } else if (accion === "eliminar_archivos") {
            subirFicheros();
        }





//        if (accion === "crearAnuncioAdministrativo") {
//
//
//
//
//
//        } else if (accion === "eliminarAnuncio") {
//           
//        } else if (accion === "publicacionCurso") {
//            listadosJ(resultados);
//        } else if (accion === "listarAnunciosAutorizar") {
//            listadosJ(resultados)
//        } else if (accion === "cargarDepartamentos") {
//            listarDepartamentos(resultados);
//        } else if (accion === "publicacionesPortada") {
//            listarPublicacionesPortada(resultados);
//        }







    } catch (error) {

    }
}



function enviarDatos(url, tipo, valorPost, retorno, accion) {

//    conexion("../ajax.php",tipo, valorPost,retorno, accion);
    conexion(url, tipo, valorPost, retorno, accion);
//    conexionFichero(url, tipo, valorPost, retorno, accion);
}

function enviarDatoFichero(url, tipo, valorPost, retorno, accion) {
//    conexion("../ajax.php",tipo, valorPost,retorno, accion);
    conexionFichero(url, tipo, valorPost, retorno, accion);

}