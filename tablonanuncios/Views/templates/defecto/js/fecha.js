/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function calendario() {

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
//    $(function () {
//        $("#fecha").datepicker();
//    });

}



function convertDate(inputFormat, simbolo) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join(simbolo);
}

function FechaDiaNombre(inputFormat) {
//    function pad(s) {
//        return (s < 10) ? '0' + s : s;
//    }
    var d = new Fecha(inputFormat);
    return [d.getDiaMes(), d.getNombreMes(), d.getAnio()].join("-");
}

function convertDateOrderYear(inputFormat, simbolo) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [d.getFullYear(), pad(d.getMonth() + 1), pad(d.getDate())].join(simbolo);
}


function convertHora(inputFormat) {
    var d = new Date(inputFormat);
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    return [pad(d.getHours()), pad(d.getMinutes()), pad(d.getSeconds())].join(':');
}

function comprobarDate(f1) {
    if (f1 != null) {
        var d = f1;
        var d2 = new Date();
        d.setHours(0, 0, 0, 0);
        d2.setHours(0, 0, 0, 0);


    }


    if (f1 == null) {
        return "Ingrese un fecha";
    } else if (d < d2) {
        return "Fecha menor que la actual";
    } else if (d > d2) {
        d2.setMonth(d2.getMonth() + 1);
        if (d > d2) {
            return "Fecha mayor al limite maximo de publicacion";
        }
    } else if (!(/^([012][1-9]|3[01])-(0[1-9]|1[012])-(\d{4})$/.test($("#fechaPublicacion").val()))) {
        return "Formato incorrecto";
    } else {
        return true;
    }
    return true;
}


var Fecha = function (fecha) {
    var nombres_dias = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    var nombres_meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    var fecha_actual = new Date(fecha);



    this.dia_mes = fecha_actual.getDate(); //dia del mes
    this.dia_semana = fecha_actual.getDay(); //dia de la semana
    this.mes = fecha_actual.getMonth() + 1;
    this.anio = fecha_actual.getFullYear();


    var horas = fecha_actual.getHours();
    var minutos = fecha_actual.getMinutes();
    var segundos = fecha_actual.getSeconds();

    if (this.dia_mes < 10) {
        this.dia_mes = "0" + this.dia_mes;
    }
    if (this.mes < 10) {
        this.mes = "0" + this.mes;
    }

//    var sufijo = "AM";
    if (horas > 12) {
        horas = horas - 12;
//        sufijo = "PM";
    }

    if (horas < 10) {
        horas = "0" + horas;
    }
    if (minutos < 10) {
        minutos = "0" + minutos;
    }
    if (segundos < 10) {
        segundos = "0" + segundos;
    }
    this.horas = horas;
    this.minutos = minutos;
    this.segundos = segundos;
//    var setName = function(newname) {
//        if (newname) {
//            dia_mes = newname;
//        }
//    }

    this.getNombreMes = function () {
        return nombres_meses[parseInt(this.mes)];
        ;

    };

    this.getDiaMes = function () {
        return this.dia_mes;
    };

    this.getDiaSemana = function () {
        return nombres_dias[this.dia_semana];
    };

    this.getMes = function () {
        return this.mes;
    };

    this.getAnio = function () {
        return this.anio;
    };

    this.getFechaActual = function () {
        return this.dia_mes + "-" + this.mes + "-" + this.anio;
    };

//    return {
////        getName: getName,
//        setName: setFecha
//    };
};


