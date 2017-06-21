$(document).ready(function () {

    iniciar();




});

function iniciar() {   
    $("#botonCrearA").on("click", comprobar);



}


function comprobar() { 
    var valorPost = "dni=" +$.trim($("#dniCrear").val()) + 
            "&nombre=" + $.trim($("#nombreCrear").val())+
            "&primerApellido=" + $.trim($("#primerCrear").val())+
            "&segundoApellido=" + $.trim($("#segundoCrear").val())+
            "&mail=" + $.trim($("#mailCrear").val())+
            "&user=" + $.trim(2);
         
    enviarDatos("./../../ajax", "POST", valorPost, "TEXT", "crear_usuario");

}

function guardado(resultado){
    alert(resultado);
}
