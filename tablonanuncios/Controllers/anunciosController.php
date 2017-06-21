<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of AnunciosController
 *
 * @author Edward
 */
use Models\AnunciosModel;
use Config\Session;

class AnunciosController extends \Config\Controller {

//put your code here

    public function __construct() {
        parent::__construct();
        Session::sinAcceso();
//        echo "hola";
    }

    public function index() {
         header('location:' . BASE_URL . "error");
    }

    public function crear() {
        $this->objController(Session::get(TIPO_USER))->_crear();
    }

    public function publico() {

        if ($this->view->getArgumentos()[0] == CREAR) {
            $this->objController(Session::get(TIPO_USER))->_crearPublico();
        } else {
            $this->objController(Session::get(TIPO_USER))->_listarPublico();
        }
    }

    public static function _getIdLastUser() {
        return AnunciosModel::getIdLastUserM(Session::get(MAIL));
    }

    public static function _crearAnuncio($titulo, $descripcion, $categoria, $categoriaSel, $fechaPublicacion) {

        $id = self::_getIdLastUser() + 1;
        if (Session::get(TIPO_USER) === ALUMNOS) {
            $autorizado = false;
        } else {
            $autorizado = true;
        }



        if (AnunciosModel::addAnuncioM($id, Session::get(MAIL), $titulo, $descripcion, $fechaPublicacion, $autorizado)) {
            self::_crearAnuncioJornada($id, Session::get(MAIL), Session::get(JORNADA));
            $data = json_decode(stripslashes($categoriaSel));
            foreach ($data as $numSubanuncios => $nombreSubcategoria) {
                if (!AnunciosModel::addAnuncioFiltroM($id, Session::get(MAIL), $categoria, $numSubanuncios + 1, $nombreSubcategoria)) {
                    self::_eliminarAnuncio($id);
                    return false;
                }
            }
            if (Session::get(TIPO_USER) !== ALUMNOS) {
                PublicacionesController::_crearPublicacion($id, Session::get(MAIL));
            }
        }
        return true;
    }

    public static function _crearAnuncioAdministrativo($titulo, $descripcion, $categoria, $categoriaSel, $fechaPublicacion, $jornadas) {

        $id = self::_getIdLastUser() + 1;

        $autorizado = true;
        if (AnunciosModel::addAnuncioM($id, Session::get(MAIL), $titulo, $descripcion, $fechaPublicacion, $autorizado)) {
            if (self::_crearAnuncioJornada($id, Session::get(MAIL), JornadasController::_getJornadaCod($jornadas))) {

                $data = json_decode(stripslashes($categoriaSel));
                foreach ($data as $numSubanuncios => $nombreSubcategoria) {
                    if (!AnunciosModel::addAnuncioFiltroM($id, Session::get(MAIL), $categoria, $numSubanuncios + 1, $nombreSubcategoria)) {
                        self::_eliminarAnuncio($id);
                        return false;
                    }
                }
            } else {
                self::_eliminarAnuncio($id);
                return false;
            }
            
            return   PublicacionesController::_crearPublicacion($id, Session::get(MAIL));
           
            
        }
    }

    public static function _crearAnuncioJornada($id, $mail, $jornada) {

        return AnunciosModel::addAnuncioJornadaM($id, $mail, $jornada);
    }

//    public static function _agregarFiltro($id,$categoria,$cod_categoria){
//        $agregado= false;   
//        
//        switch ($categoria){
//            case "curso":               
//              $agregado=  AnunciosModel::addAnuncioFiltroCursoM($id, Session::get("mail"),$cod_categoria, Session::get("jornada"));
//             break;
//                
//        }
//        return $agregado;
//    }



    public static function _comprobarFicheros($filesImg, $filesPdf, $categoria) {

        $id = self::_getIdLastUser();
        $guardado = true;
        if ($filesImg["error"][0] == 0) {
            $guardado = ImportarController::_import($id, self::getUrlImg($categoria), $filesImg, "imagenes", Session::get(MAIL));
        }
        if ($filesPdf["error"][0] == 0) {
            $guardado = ImportarController::_import($id, self::getUrLPdf($categoria), $_FILES["pdf"], "pdf", Session::get(MAIL));
        }
        if (!$guardado) {
            self::_eliminarAnuncio($id);
        }

        return $guardado;
    }
    
    public static function _comprobarFicherosEditar($filesImg, $filesPdf, $categoria) {
        
        $guardado = true;
        if ($filesImg["error"][0] == 0) {
            self::_eliminarFicheros('imagenes', Session::get(ID_ANUNCIO), Session::get(MAIL), self::getUrlImg($categoria));
            $guardado = ImportarController::_import(Session::get(ID_ANUNCIO), self::getUrlImg($categoria), $filesImg, "imagenes", Session::get(MAIL));
        }
        if ($filesPdf["error"][0] == 0) {
                self::_eliminarFicheros('pdf', Session::get(ID_ANUNCIO), Session::get(MAIL), self::getUrLPdf($categoria));
            $guardado = ImportarController::_import(Session::get(ID_ANUNCIO), self::getUrLPdf($categoria), $_FILES["pdf"], "pdf", Session::get(MAIL));
        }
        if (!$guardado) {
            self::_eliminarAnuncio($id);
        }

        return $guardado;
    }

//    public static function _eliminarFicheros($categoria) {
//        $datos = AnunciosController::_getUrlSinHttp(Session::get(ID_ANUNCIO), Session::get(MAIL), $categoria);
//        return ImportarController::_deleteimport(Session::get(ID_ANUNCIO), Session::get(MAIL), $datos, 'imagenes');
//    }



    public static function _eliminarFicheros($f, $id, $mail, $getURL) {

        $datos = AnunciosModel::getFicherosM($f, $id, $mail);


        if (!is_null($datos)) {
            $url = $getURL;
            foreach ($datos as $key => $nombre) {
                $datos[$key] = $url . $nombre;
            }
            return ImportarController::_deleteimport($id, Session::get(MAIL), $datos, $f);
        }

        return $datos;
    }

    public static function _deleteFicheros($id, $mail, $f, $num) {
        return AnunciosModel::eliminarFicherosM($id, $mail, $f, $num);
    }

    public static function _guardarFicheros($id, $name, $tipoFichero, $num, $mail) {
        return AnunciosModel::addAnuncioFicheroM($id, $name, $tipoFichero, $num, $mail);
    }

    public function listar() {
        $this->objController(Session::get(TIPO_USER))->_listar();
    }

    public static function _listarAnuncios($orden, $categoria = null, $pagina = 0, $subCategoria = null) {

        $registros = AnunciosModel::countAnunciosRegisM(Session::get(MAIL), $categoria, $subCategoria);
        if ($registros > 0) {
            $datos = self::definirPagina($registros, $pagina, 5);
            $registros = null;
            $registros['registros'] = AnunciosModel::listarAnunciosPorMailPag(Session::get(MAIL), $datos['inicio'], $datos['limite'], $orden, $categoria, $subCategoria);
            $registros['paginacion'] = $datos['paginacion'];
            return $registros;
        }

        return $registros;
    }

    public static function _editarLineaAnuncioM() {
        $datos['registro'] = AnunciosModel::listarAnuncioPorIdMailM(Session::get(ID_ANUNCIO), Session::get(MAIL));
        if (!is_null($datos["registro"])) {
            foreach ($datos["registro"] AS $key => $nombre) {
                if (array_key_exists(5, $nombre)) {
                    $datos["registro"][$key][5] = CategoriasController::_getNombreCategoria($nombre[5]);
                }
            }

            $datos["imagenes"] = self::_getFicheros(Session::get(ID_ANUNCIO), Session::get(MAIL), self::getUrlImg($datos["registro"][1][5]),'imagenes');
            $datos["pdf"] = self::_getFicheros(Session::get(ID_ANUNCIO), Session::get(MAIL), self::getUrLPdf($datos["registro"][1][5]),'pdf');
        }
        return $datos;
    }

    public function editar() {
        $this->objController(Session::get(TIPO_USER))->_editar();
    }

    public static function _editarAnuncio($titulo, $descripcion, $categoria, $categoriaSel, $fechaPublicacion) {
        if (Session::get(TIPO_USER) === ALUMNOS) {
            $autorizado = false;
        } else {
            $autorizado = true;
        }

        $guardado = AnunciosModel::editarAnuncioM(Session::get(ID_ANUNCIO), Session::get(MAIL), $titulo, $descripcion, $fechaPublicacion, $autorizado);
        if ($guardado) {
            AnunciosModel::eliminarAnuncioFiltroM(Session::get(ID_ANUNCIO), Session::get(MAIL));
            $data = json_decode(stripslashes($categoriaSel));
            foreach ($data as $numSubanuncios => $nombreSubcategoria) {
                if (!AnunciosModel::addAnuncioFiltroM(Session::get(ID_ANUNCIO), Session::get(MAIL), $categoria, $numSubanuncios + 1, $nombreSubcategoria)) {
                    return false;
                }
            }
        }

        return $guardado;
    }

    public static function _editarAlumnosRevisarM($id, $mail) {
        return AnunciosModel::editarAnuncioAlumnoRevisar($id, $mail);
    }

    public static function _eliminarAnuncio($id) {
        $categoria = self::_getCategoriaAnuncio($id, Session::get(MAIL));
        $categoria = CategoriasController::_getNombreCategoria($categoria);
        self::_eliminarFicheros('imagenes', $id, Session::get(MAIL), self::getUrlImg($categoria));
        self::_eliminarFicheros('pdf', $id, Session::get(MAIL), self::getUrLPdf($categoria));
        return AnunciosModel::eliminarAnuncioM($id, Session::get(MAIL));


    }

    public static function _contarAnuncio($id) {
        return AnunciosModel::contarAnuncioM($id);
    }

//    public static function editarAnuncioM($pagina) {
//
//        $registros = AnunciosModel::CountAnunciosPorMail(Session::get('tipo'),Session::get('mail'));
//        if ($registros > 0) {
//            self::getLibrary('paginador2');
//            $paginador = new \libs\Paginador();
//            $datos = $paginador->paginar($registros, $pagina);
//            $registros = AnunciosModel::listarAnunciosPorMailPag(Session::get('tipo'),Session::get('mail'), $datos['inicio'], $datos['limite']);
//            $datos['registros'] = $registros;
//            return $datos;
//        }
//        return false;
//    }

    public static function _listarAnunciosAlumnos($orden, $categoria = null, $pagina = 0) {
        $registros = AnunciosModel::CountAnunciosPorNoAutorizado($categoria);

        if ($registros > 0) {
            $datos = self::definirPagina($registros, $pagina);
            $registros = null;
            $registros['registros'] = AnunciosModel::listarAnunciosPorAutorizadoPag($orden, $datos['inicio'], $datos['limite'], $categoria);
            $registros['paginacion'] = $datos['paginacion'];
            return $registros;
        }

        return $registros;
    }

    public static function _verLineaCategoriaAnuncioM() {
        $datos['registro'] = AnunciosModel::verLineaCategoriaAnuncioM(Session::get(ID_ANUNCIO), Session::get(MAIL));
        if (!is_null($datos["registro"])) {
            foreach ($datos["registro"] AS $key => $nombre) {
                if (array_key_exists(0, $nombre)) {
                    $datos["registro"][$key][0] = CategoriasController::_getNombreCategoria($nombre[0]);
                }
            }
        }
        return $datos;
    }

//    public static function crearM($titulo, $descripcion) {
////        for($i=0;$i<=300;$i++){
////        AnunciosModel::addAnuncio(Session::get('mail'), Session::get('tipo'), "TALLER DE ADMINISTRACIÓN ELECTRÓNICA $i", "Los alumnos de segundo curso del grado superior de Administración y Finanzas han pasado a la fase final del concurso Expertemprende organizado por el equipo de cultura emprendedora de la Junta de Extremadura. Para más información aquí tenéis el enlace a la noticia EXPERTEMPRENDE
////Desde el departamento de Administración queremos transmitir nuestra enhorabuena a los promotores de los tres proyectos seleccionados y desearle mucha suerte para la defensa de sus planes de negocio el próximo 24 de abril en la Escuela de Hostelería y Turismo de Mérida.
////Los tres proyectos finalistas desarrollados en el módulo profesional de SIMULACIÓN EMPRESARIAL son:
////DREAMSCASE elaborado por los promotores:
////Patricia Martínez González.
////Alejandro Rebollo Morales.
////Elena Murillo Pacheco.
////IDEA DE NEGOCIO: Asesoramiento a empresas a través de tres servicios creativos e innovadores: rediseño de oficinas, marketing sensorial y fintech (financiación alternativa usando nuevas tecnologías)");
////        }
//        return AnunciosModel::addAnuncio(Session::get('mail'), Session::get('tipo'), $titulo, $descripcion);
//    }
//
//    public static function listarM($pagina) {
//        $registros = AnunciosModel::CountAnunciosPorMail(Session::get('mail'));
//        if ($registros > 0) {
//            self::getLibrary('paginador2');
//            $paginador = new \libs\Paginador();
//
//            $datos = $paginador->paginar(300, $pagina);
//            $registros = AnunciosModel::listarAnunciosPorMailPag(Session::get('mail'), $datos['inicio'], $datos['limite']);
//
//            $datos['registros'] = $registros;
//            return $datos;
//
//
//
//
////
////        return AnunciosModel::listarAnuncios();
//        }
//    }

//    public static function _comprobarImagenesAnuncios($registros, $categoria) {
//
//        if (!is_null($registros)) {
//
//            foreach ($registros as $key => $nombre) {
//                if (is_null(self::_getImagenes($nombre[0], Session::get(MAIL)))) {
//                    $url = BASE_URL;
//                    $url .= str_replace('./', '', self::getUrlImg(DEFAUL_CATEGORY));
//                    array_push($registros[$key], $url);
//                } else {
//
//                    $imagenes = self::_getImagenes($nombre[0], Session::get(MAIL), $categoria);
//                    array_push($registros[$key], $imagenes[1]);
//                }
//            }
//
//            return $registros;
//        }
//    }
    
     public static function _comprobarImagenesAnuncios($registros, $categoria) {

        if (!is_null($registros)) {

            foreach ($registros as $key => $nombre) {
                if (is_null(self::_getFicheros($nombre[0], Session::get(MAIL),self::getUrlImg($categoria),"imagenes")) ){
                    $url = BASE_URL;
                    $url .= str_replace('./', '', self::getUrlImg(DEFAUL_CATEGORY));
                    array_push($registros[$key], $url);
                } else {

                    $imagenes = self::_getFicheros($nombre[0], Session::get(MAIL),self::getUrlImg($categoria),"imagenes");
                    array_push($registros[$key], $imagenes[1]);
                }
            }

            return $registros;
        }
    }

//    public static function _comprobarImagenesAnuncio($registros) {
//        echo $categorria = CategoriasController::_getNombreCategoria($registros[6]);
//        if (!is_null($registros)) {
//            foreach ($registros as $key => $nombre) {
//                if (!is_null(self::_getImagenes($nombre[0], Session::get(MAIL)))) {
//                    $imagenes = self::_getImagenes($nombre[0], Session::get(MAIL), $categoria);
//                    array_push($registros[$key], $imagenes[1]);
//                }
//            }
//            return $registros;
//        }
//    }
//    
   private static function _getFicheros($id, $mail,$urlFiles,$f) {
        $datos = AnunciosModel::getFicherosM($f, $id, $mail);
        if (!is_null($datos)) {

            $url = BASE_URL;
            $url .= str_replace('./', '',$urlFiles);
            foreach ($datos as $key => $nombre) {
                $datos[$key] = $url . $nombre;
            }
            return $datos;
        }

        return $datos;
    }
    
    
    
//    private static function _getImagenes($idAnuncio, $mail, $categoria = null) {
//        $datos = AnunciosModel::getImagenesM($idAnuncio, $mail);
//        if (!is_null($datos)) {
//
//            $url = BASE_URL;
//            $url .= str_replace('./', '', self::getUrlImg($categoria));
//            foreach ($datos as $key => $nombre) {
//                $datos[$key] = $url . $nombre;
//            }
//            return $datos;
//        }
//
//        return $datos;
//    }

    private static function _getUrlSinHttp($idAnuncio, $mail, $categoria) {
        $datos = AnunciosModel::getImagenesM($idAnuncio, $mail);
        if (!is_null($datos)) {
            $url = self::getUrlImg($categoria);
            foreach ($datos as $key => $nombre) {
                $datos[$key] = $url . $nombre;
            }
            return $datos;
        }

        return $datos;
    }

    public static function _getCategoriaAnuncio($id, $mail) {
        return AnunciosModel::getCategoriaAnuncioM($id, $mail);
    }

    public static function _guardarFicherosPublicos($id, $name, $tipoFichero, $num) {
        return AnunciosModel::addAnuncioFicheroPublicoM($id, $name, $tipoFichero, $num);
    }

    public static function _getIdLastAnuncio() {
        return AnunciosModel::getIdLastAnuncioM();
    }

    public static function _crearAnuncioPublico($titulo, $descripcion, $categoria, $fechaPublicacion) {

        if (AnunciosModel::addAnuncioPublicoM(Session::get(MAIL), $categoria, $titulo, $descripcion, $fechaPublicacion)) {

            if (self::compararFecha($fechaPublicacion)) {
                $id = self::_getIdLastAnuncio();
                if (!PublicacionesController::_crearPublicacionPublico($id, $fechaPublicacion)) {
                    self::_eliminarAnuncio($id);
                    return false;
                }
            }
            return true;
        }

        return false;
    }

    public static function _comprobarFicherosPublicos($filesImg, $filesPdf, $categoria) {

        $id = self::_getIdLastAnuncio();
        $guardado = true;
        if ($filesImg["error"][0] == 0) {
            $guardado = ImportarController::_importPublico($id, self::getUrlImgPublico($categoria), $filesImg, "imagenes");
        }
        if ($filesPdf["error"][0] == 0) {
            $guardado = ImportarController::_importPublico($id, self::getUrLPdfPublico($categoria), $filesPdf, "pdf");
        }
        if (!$guardado) {
            self::_eliminarAnuncio($id);
        }

        return $guardado;
    }

    public static function _eliminarFicherosPublicos($idAnuncio, $getURL) {
        $datos = AnunciosModel::getFicherosPublicosM($idAnuncio);
        if (!is_null($datos)) {
            $url = $getURL;
            foreach ($datos as $key => $nombre) {
                $datos[$key] = $url . $nombre;
            }
            return $datos;
        }

        return ImportarController::_deleteimport(Session::get(ID_ANUNCIO), Session::get(MAIL), $datos, 'imagenes');
    }

    public static function _deleteFicheroPublicos($id, $mail, $f, $num) {
        return AnunciosModel::eliminarFicherosM($id, $mail, $f, $num);
    }

}
