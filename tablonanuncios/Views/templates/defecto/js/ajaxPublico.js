function conexion(url, tipo, data, retorno, accion) {
//    alert("si");
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
    alert(url + "?accion=" + accion);

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
        if (accion === "validar_login") {
            cerrarModal();     
        }
        //ver
        if (accion === "ver_linea_Publicacion") {
            verAnuncio(resultados);
//            cerrarModal();     
        }
        
        //crear         
        if (accion === "crear_anuncio") {
            guardadoDatos(resultados);
        }
        

        //listar
        if (accion === "listar_publicacion") {          
            listados(resultados);
        } else if (accion === "listar_noticias") {          
            listados(resultados);
        } 
        
        
        
    



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