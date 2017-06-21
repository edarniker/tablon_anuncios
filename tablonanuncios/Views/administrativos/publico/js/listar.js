$(document).ready(function () {
    iniciar();
});

function iniciar() {


    listarAnuncios();

}



function listarAnuncios() {
 

   var pag = paginar($(this).attr("value"));

        $(".pagination li").remove();
        $("#listar li").remove();

        enviarDatos("../ajax", "POST", "listar&pag=" + pag, "JSON", "listarAnuncioMail");
    
}

function listadosJ(resultado) {
    
    if (resultado['registros'] !== null) {

        $.each(resultado['registros'], function (pos, obj) {
              
             $("#listar").prepend("<tr><td><img src='images/m1.jpg' title='' alt=''/></td>\n\
//               <td><h6 class='title'>" + obj.titulo + "</h6></td>\n\
//\n\            <td><p>" + obj.descripcion + "</p></td>\
//               </td><span class='adprice'>$290</span></td>\
//                </td><p class='catpath'>Mobile Phones » Brand</p></td>\
//              <td><span class='date'>Today, 17:55</span></td>\n\
//              </td><span class='cityname'>Grupo </span></td>\n\
//\n              </td><span class='cityname'>Curso</span></td>\n\
\n\       </tr>");

        });

    } else {
        $("#listar").html("<h4>**No existen Anuncios**</h4>");
    }

//    if (resultado['registros'] !== null) {
//
//        $.each(resultado['registros'], function (pos, obj) {
//
//            $("#listar").prepend("<li><img src='images/m1.jpg' title='' alt=''/>\n\
//            <section class='list-left'>\n\
//                <h5 class='title'>" + obj.titulo + "</h5>\n\
//\n\             <p>" + obj.descripcion + "</p>\
//                <span class='adprice'>$290</span>\
//                <p class='catpath'>Mobile Phones » Brand</p>\
//            </section>\
//            <section class='list-right'>\n\
//                <span class='date'>Today, 17:55</span>\n\
//                <span class='cityname'>Grupo </span>\n\
//\n               <span class='cityname'>Curso</span>\n\
//            </section>\n\
//            <div class='clearfix'></div>\n\
//            </li>");
//
//        });
//
//    } else {
//        $("#listar").html("<h4>**No existen Anuncios**</h4>");
//    }

alert("D"+resultado['paginacion']['ajD']);
alert("I"+resultado['paginacion']['ajI']);

    if (resultado['paginacion'] !== null) {

        if (resultado['paginacion']['primero']) {
            $(".pagination").append("<li><a class='btn' value="+ resultado['paginacion']['primero'] +">Primero</a></li>");
        } else {
            $(".pagination").append("<li class='disabled'><a>Primero</a></li>");
        }
        if (resultado['paginacion']['anterior']) {
            $(".pagination").append("<li><a class='btn' value="+ resultado['paginacion']['anterior'] +">Anterior</a></li>");
        } else {
            $(".pagination").append("<li class='disabled'><a>Anterior</a></li>");
        }
        
        for($i=resultado['paginacion']['pmin'];$i<=resultado['paginacion']['pmax'];$i++){
          
                
            if($i-1>0 && resultado['paginacion']['ajI'] === $i-1){
                   if(resultado['paginacion']['ajI'] !==resultado['paginacion']['avI'])
                   $(".pagination").append("<li><a  class='btn' value=" + resultado['paginacion']['avI'] + ">"+ resultado['paginacion']['avI']+"</a></li>");                
                   
                $(".pagination").append("<li><a>...</a></li>");
              
                }
       
             if (resultado['paginacion']['actual'] === $i) {                   
                $(".pagination").append("<li class='active'><a>" + $i + "</a></li>");
            }else{
                $(".pagination").append("<li><a class='btn'>" + $i + "</a></li>");
                
                  
            }
               
            
             if(resultado['paginacion']['ajD'] === $i+1){
                    
                     $(".pagination").append("<li><a>...</a></li>");
                     if(resultado['paginacion']['ajD'] !==resultado['paginacion']['avD'] && resultado['paginacion']['avD']!==resultado['paginacion']['ajD']-1)
                     $(".pagination").append("<li><a class='btn' value=" + resultado['paginacion']['ultimo'] +">"+ resultado['paginacion']['avD']+"</a></li>");
                   
//                     if(resultado['paginacion']['avD']===$i){
//                         
//                     }
                   
                }
        }
        
//        $.each(resultado['paginacion']['rango'], function (pos, obj) {
//
//            if (resultado['paginacion']['actual'] === obj) {
//                $(".pagination").append("<li class='active'><a>" + obj + "</a></li>");
//            } else {
//                if(resultado['paginacion']['ajD'] === obj || resultado['paginacion']['ajI'] === obj){
//                     $(".pagination").append("<li><a>...</a></li>");
//                    
////                }else if(resultado['paginacion']['ajD'] === obj){
////                    
//                }
//                else{                                  
//                    
//                $(".pagination").append("<li><a class='btn'>" + obj + "</a></li>");
//               }
//            }


//        });
        if (resultado['paginacion']['siguiente']) {
            $(".pagination").append("<li><a class='btn' value=" + resultado['paginacion']['siguiente'] + ">Siguiente</a></li>");
        } else {
            $(".pagination").append("<li class='disabled'><a>Siguiente</a></li>");
        }
        if (resultado['paginacion']['ultimo']) {
            $(".pagination").append("<li><a class='btn' value=" + resultado['paginacion']['ultimo'] + ">Ultimo</a></li>");
        } else {
            $(".pagination").append("<li class='disabled'><a>Ultimo</a></li>");
        }
    }

    $('.pagination li a.btn').on("click", listarAnuncios);

}

