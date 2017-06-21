<?php

namespace Config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author Edward
 */
//put your code here
define('BASE_URL',"http://localhost/tablonanuncios/");

define('DEFAULT_CONTROLLER', "index");
define('DEFAULT_TEMPLATE', "defecto");
define('PUBLIC_TEMPLATE', "public");


define('APP_NAME', "Mi fraweor");
define('APP_COMPANY', "www.edward.com");
define('APP_SLOGAN', "mi primer framework");

define('DB_HOST','localhost');
define('DB_USER','dwes');
define('DB_PASS','1234');
define('DB_NAME','tablon_anuncios');
define('DB_CHAR','utf8');
define('HASH_KEY','5946ef12beead');


//vistas
define('INDEX', 'index');
define('CREAR','crear');
define('LISTAR','listar');
define('EDITAR','editar');
define('ELIMINAR','eliminar');
define('LOGIN','login');
define('AUTORIZAR','autorizar');
define('PUBLICO','publico');
define('ANUNCIOS','anuncios');
define('PUBLICACIONES','publicaciones');
define('AUTORIZACIONES','autorizaciones');



//vistas publicas
define('PORTADA','portada');
define('CENTRO','centro');
define('NUESTRO_CENTRO','nuestro-centro');
define('HISTORIA','historia');
define('SECRETARIA','secretaria');
define('HORARIO','horario');
define('ADMISION','admision');
define('MATRICULA','matricula');
define('NOTICIAS','noticias');






define('DEBUG','true');


//SESSIONES
define('NIVEL','nivel');
define('TIPO_USER','tipo');
define('ACCESO','acceso');
define('JORNADA','jornada');
define('MAIL','mail');
define('ID_ANUNCIO', 'id');
define('PAGINA', 'pag');
define('BUSCAR', 'buscar');






//usuarios

define('ALUMNOS','alumnos');
define('PROFESORES','profesores');
define("PROFESORES_VALIDADORES",'profesores_validadores');
define('ADMIN','admin');
define('ADMINISTRATIVOS','administrativos');


//niveles
define('NIVEL_ALUMNOS','2');


//Categorias
define('CURSO','curso');
define('CURSOS','cursos');
define('MATERIAS','materia');
define('DEPARTAMENTOS_PROFESOR','departamento');
define('ALLDEPARTAMENTOS','todos los departamentos');
define('DEPARTAMENTOS','departamentos');
define('CURSOS_PROFESORES','curso profesores');
define('GRUPOS', 'grupos');
define('INSTITUTO','instituto');
define('DEFAUL_CATEGORY','default');




//uploads

define('URL_UPLOADS_CURSO_IMG','./Uploads/curso/img/');
define('URL_UPLOADS_CURSO_PDF','./Uploads/curso/pdf/');
define('URL_UPLOADS_MATERIA_IMG','./Uploads/materia/img/');
define('URL_UPLOADS_MATERIA_PDF','./Uploads/materia/pdf/');
define('URL_UPLOADS_DEPARTAMENTO_IMG','./Uploads/departamento/img/');
define('URL_UPLOADS_DEPARTAMENTO_PDF','./Uploads/departamento/pdf/');
define('URL_UPLOADS_INSTITUTO_IMG','./Uploads/instituto/img/');
define('URL_UPLOADS_INSTITUTO_PDF','./Uploads/instituto/pdf/');
define('URL_UPLOADS_DEFAULT','./Uploads/default/img/pin.jpg');



//uploads Publico

define('URL_UPLOADS_PUBLICO_PORTADA_IMG','./Uploads_Publico/portada/img/');
define('URL_UPLOADS_PUBLICO_PORTADA_PDF','./Uploads_Publico/portada/pdf/');
define('URL_UPLOADS_PUBLICO_CENTRO_IMG','./Uploads_Publico/centro/img/');
define('URL_UPLOADS_PUBLICO_CENTRO_PDF','./Uploads_Publico/centro/pdf/');
define('URL_UPLOADS_PUBLICO_ADMISION_IMG','./Uploads_Publico/admision/img/');
define('URL_UPLOADS_PUBLICO_ADMISION_PDF','./Uploads_Publico/admision/pdf/');

//define('URL_UPLOADS_MATERIA_IMG','./Uploads/materia/img/');
//define('URL_UPLOADS_MATERIA_PDF','./Uploads/materia/pdf/');
//define('URL_UPLOADS_DEPARTAMENTO_IMG','./Uploads/departamento/img/');
//define('URL_UPLOADS_DEPARTAMENTO_PDF','./Uploads/departamento/pdf/');
//define('URL_UPLOADS_DEFAULT','./Uploads/default/img/pin.jpg');

define('URL_IMG_PUBLICO','public/img/');



