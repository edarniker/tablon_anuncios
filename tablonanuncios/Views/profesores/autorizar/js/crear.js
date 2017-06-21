

function iniciarEliminar(){
   $('.btn-info').on("click", botones);
   $('.btn-danger').on("click", botones);

 
}



function botones(){
   var autorizar=0; 
  if($(this).text()==="Autorizar"){
     autorizar=1; 
  }
   
    enviarDatos("./ajax", "POST", "crear="+autorizar+"&id=" +
            $(this).attr("value")+"&mail="+
            $(this).parents('tr').children(':eq(8)').attr('value') , 
            "TEXT", 
            "crear_autorizacion");
}





function actualizar(){  
    listarAnuncios();
}