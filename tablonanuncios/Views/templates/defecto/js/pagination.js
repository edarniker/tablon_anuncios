$(document).ready(function () {
    
    
    
     $(".pagina").on("click", paginacion);
    
  
});

function paginacion(resultado) {
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
                $(".pagination").append("<li class='active' value="+parseInt($i)+"><a>" + $i + "</a></li>");
            }else{
                $(".pagination").append("<li><a class='btn' value="+$i+">" + parseInt($i) + "</a></li>");
                
                  
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
    }else{
        alert("pasa algo");
    }
    
      
}

function paginar(valor) {
//   alert($('.pagination li a.btn').attr("value"));
    if(!isNaN(valor)){
        pag = valor; 
    }else if ($('.pagination li a.btn').attr("value")) {
        pag = 1;    
   }else {
        pag = 0;
    }

    return pag;

}


