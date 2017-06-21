var p;

function iniciarEliminar(){
   $('.btn-danger').on("click", botonEliminar);
   $('.btnEliminar').on("click",eliminar);

 
}

function botonEliminar(){ 
    p=$(this).attr("value");
    $(this).attr({'data-title':'Delete','data-toggle':'modal', 'data-target':'#delete'});
}

function eliminar(){   
//   $('.modal').modal('hide');
 
   
    enviarDatos("../ajax", "POST", "eliminar=eliminar&id=" + p , "TEXT", "eliminar_anuncio");
}

function cerrarModal(){
  $(".modal .close").click()
    listarAnuncios();
}