

function botonesEliminar(){
   $('.btn-danger').on("click", botonEliminar);
   $('#btnModal-Eliminar').on("click",eliminar);

 
}

function botonEliminar(){ 
//     id=$(this).parents("tr").children().eq(0).attr('value');   
    $(this).attr({'data-title':'Delete','data-toggle':'modal', 'data-target':'#delete'});
    $("#btnEliminar").val($(this).parents("tr").children().eq(0).attr('value'));
}

function eliminar(){  

    enviarDatos("../ajax", "POST", "eliminar=eliminar&id=" +$(this).attr("value") , "TEXT", "eliminar_anuncio");
}

function cerrarModal(){   
  $(".modal .close").click();
//    $(".pagination li").remove();
//    $("#listar tbody").empty();
    listarAnuncios();
   
  

}