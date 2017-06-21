<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of publicaciones
 *
 * @author Edward
 */
use Models\PublicacionesModel;
use Config\Session;
use Controllers\CategoriasController;

class PublicacionesController extends \Config\Controller {

//put your code here
    private $arrayCategoria;
    private $controlador;
    private $metodo;
    private $argumentos;

    public function __construct() {
        parent::__construct();
        Session::sinAcceso();
//        $this->url();
        $this->arrayCategoria = CategoriasController::_listarCategorias();
//        if(is_null($this->arrayCategoria)){
//            
//        }
    }

     /*******************************************************************************
     *                                
     *                                *****FUNCIONES*****
     *    
     *******************************************************************************/
    

    public function index() {

        if (Session::get(TIPO_USER) != ADMINISTRATIVOS) {
            $categoria = $this->arrayCategoria[1];
            header('location:' . BASE_URL . "publicaciones" . DS . $categoria);
            exit;
        } else {
            $categoria = $this->arrayCategoria[7];
            header('location:' . BASE_URL . "publicaciones" . DS . $categoria);
            exit;
        }
//  
    }

    public function curso($anuncio = false, $id = false) {
        if (!$anuncio && !$id) {

            $this->pintar('Publicar Curso', INDEX, 'publicaciones', null, array('listWiev', 'pagination','fecha'), array('categorias'));
        } else {
            $this->_anuncio($anuncio, $id);
        }
    }

    public function cursos($anuncio = false, $id = false) {
        if (!$anuncio && !$id) {

            $this->pintar('Publicar Curso', INDEX, 'publicaciones', null, array('listWiev', 'pagination','fecha'), array('categorias_2'));
        } else {
            $this->_anuncio($anuncio, $id);
        }
    }

    public function materia() {
        $this->pintar('Publicaciones Materia', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
    }

    public function departamento() {
        $this->pintar('Publicaciones Departamento', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
    }

    public function departamentos() {
        $this->pintar('Publicaciones Departamentos', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias_2'));
    }

    public function todoslosdepartamentos() {


        $this->pintar('Publicaciones  Departamentos', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
    }

    public function cursoprofesores() {
        $this->pintar('Publicaciones  Curso profesores', INDEX, null, null, array('anuncios', 'pagination','fecha'), array('categorias'));
    }

    public function profesores() {
        $this->pintar('Publicaciones  Profesores', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
    }

    public function grupos() {

        if (Session::get(TIPO_USER) == ADMINISTRATIVOS) {
            $this->pintar('Publicaciones  Grupos', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias_2'));
        } else {
            $this->pintar('Publicaciones  Grupos', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
        }
    }

    public function instituto() {
        $this->pintar('Publicaciones  Instituto', INDEX, null, null, array('listWiev', 'pagination','fecha'), array('categorias'));
    }

    public function _anuncio($anuncio = false, $id = false) {
        if ($anuncio == "anuncio" && $id) {
            if (!empty(Session::get("idVer")) && $id === Session::get("idVer")) {
                $this->pintar('Anuncio', INDEX, "publicaciones", null, array('listWiev', 'pagination','fecha'), array('mostrar'), null, DS . "anuncio");
            } else {
                header('location:' . BASE_URL . 'publicaciones');
            }
        } else {
            header('location:' . BASE_URL . 'publicaciones');
        }
    }
    

    
    /*******************************************************************************
     *                                
     *                                *****FUNCIONES*****
     *    
     *******************************************************************************/

    public static function _crearPublicacion($id, $mail) {
        return PublicacionesModel::addPublicacionM($id, $mail);
          
    }

    public static function _listarPublicaciones($sql, $categoria, $orden = null, $pagina = 0, $subcategoria = null) {
//      echo $sql->_StrSQLPubliRegis($categoria, $subcategoria,Session::get(BUSCAR)); 
//   $sql->_StrSQLPubli($categoria, $subcategoria,$orden);



        if ($categoria != ALLDEPARTAMENTOS && $categoria != INSTITUTO && $categoria != PROFESORES) {
            $mail = Session::get(MAIL);
            $jornada = Session::get(JORNADA);
        } else if ($categoria == ALLDEPARTAMENTOS) {
            $mail = null;
            $jornada = Session::get(JORNADA);
        } else if($categoria == INSTITUTO){
            $mail = null;
            $jornada=null;
            
        }else if ($categoria == PROFESORES) {
            $mail = null;
            $jornada = JornadasController::_getJornadaNombre(Session::get(JORNADA));
            if (!is_null($subcategoria)) {
                $subcategoria = JornadasController::_getJornadaCod($subcategoria);
            }
        }

$registros = PublicacionesModel::CountPublicacionesM($sql->_StrSQLPubliRegis($categoria, $subcategoria, Session::get(BUSCAR)), $jornada, $categoria, Session::get(TIPO_USER), $mail, $subcategoria, Session::get(BUSCAR));

        if ($registros > 0) {

            $datos = self::definirPagina($registros, $pagina);
            $registros = null;
            if (Session::get(BUSCAR)) {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaPagBuscarM($sql->_StrSQLPubli($categoria, $subcategoria, $orden, Session::get(BUSCAR)), $jornada, $datos['inicio'], $datos['limite'], Session::get(TIPO_USER), $mail, Session::get(BUSCAR), $categoria);
                $registros['registros'] = AnunciosController::_comprobarImagenesAnuncios($registros['registros'], $categoria);
            } else {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaPagM($sql->_StrSQLPubli($categoria, $subcategoria, $orden), $jornada, $datos['inicio'], $datos['limite'], Session::get(TIPO_USER), $mail, $subcategoria, $categoria);
                $registros['registros'] = AnunciosController::_comprobarImagenesAnuncios($registros['registros'], $categoria);
            }
            $registros['paginacion'] = $datos['paginacion'];
            return $registros;
        }

        return $registros;
    }

    public static function _listarPublicacionesAdministrativos($sql, $categoria, $orden = null, $pagina = 0, $jornada = null, $subcategoria = null) {


     $registros = PublicacionesModel::CountPublicacionesAdministrativosM($sql->_StrSQLPubliRegis($categoria, $jornada, $subcategoria, Session::get(BUSCAR)), $categoria, JornadasController::_getJornadaCod($jornada), $subcategoria, Session::get(BUSCAR));

        if ($registros > 0) {

            $datos = self::definirPagina($registros, $pagina, 3);
            $registros = null;
            if (Session::get(BUSCAR)) {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaPagBuscarM($sql->_StrSQLPubli($categoria, $jornada, $subcategoria, $orden, Session::get(BUSCAR)), $jornada, $datos['inicio'], $datos['limite'], Session::get(BUSCAR), $categoria);
                $registros['registros'] = AnunciosController::_comprobarImagenesAnuncios($registros['registros'], $categoria);
            } else {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaAdministrativosPagM($sql->_StrSQLPubli($categoria, $jornada, $subcategoria, $orden), $categoria, $datos['inicio'], $datos['limite'], JornadasController::_getJornadaCod($jornada), $subcategoria);
//                $registros['registros'] = AnunciosController::_comprobarImagenesAnuncios($registros['registros'], $categoria);
            }
            $registros['paginacion'] = $datos['paginacion'];
            return $registros;
        }

        return $registros;
    }

    public static function _verLineaPublicacion() {
              
       echo $datos["registro"] = PublicacionesModel::verLineaPublicacionM(Session::get('idVer'), Session::get('idMail'), Session::get('idSubcategoria'));
//        if (!is_null($datos["registro"])) {
//            $datos["imagenes"] = AnunciosController::_getImagenes(Session::get('idVer'), Session::get('idMail'));
//        }
//        return $datos;
    }

    public static function _listarPublicacionesNoticias($categoria, $pagina = 0, $orden = null, $subcategoria = null) {

        $registros = PublicacionesModel::CountPublicacionesPublicoM($categoria, $subcategoria, Session::get(BUSCAR));
        if ($registros > 0) {
            $datos = self::definirPagina($registros, $pagina,2);
            $registros = null;
            if (Session::get(BUSCAR)) {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaPublicoPagBuscarM($categoria, $datos['inicio'], $datos['limite'], Session::get(BUSCAR));
                $registros['registros'] = self::_comprobarImagenes($registros['registros']);
            } else {
                $registros['registros'] = PublicacionesModel::listarAnunciosPorCategoriaPublicoM($categoria, $datos['inicio'], $datos['limite'], $subcategoria);
//                $registros['registros'] = AnunciosController::_comprobarImagenesAnuncios($registros['registros'], $categoria);
            }
            $registros['paginacion'] = $datos['paginacion'];
            return $registros;
        }
//         
        return $registros;
    }

    public static function _crearPublicacionPublico($id, $fechaPublicacion) {
        return PublicacionesModel::addPublicacionPublicoM($id, $fechaPublicacion);
    }

}

//    public function categoria($categoria = 0, $publicacion = false,$id=false) {
//       if (array_key_exists($categoria, $this->arrayCategoria) && !$publicacion && !$id) {
//           $this->pintar('Publicaciones '.$categoria, 'index', "publicaciones", null,null, array('listar'), null, DS . $categoria);
//        
//        } else if (array_key_exists($categoria, $this->arrayCategoria) && $publicacion == "anuncio") {
//            $this->_publicar($id);
//        } else {
//            header('location:' . BASE_URL . 'publicaciones');
//        }
//
//        
//    }

// public function _publicar($id) {
//        if (!empty(Session::get("idVer")) && $id === Session::get("idVer")) {
//            $this->pintar('Anuncio', INDEX, "publicaciones", null, array('mostrar'), null, DS . "curso" . DS . "anuncio");
//        } else {
//            header('location:' . BASE_URL . 'publicaciones/categoria/curso');
//        }
//    }

// private static function _getImagenes($idAnuncio, $mail, $categoria = null) {
//        $datos = PublicacionesModel::getImagenesM($idAnuncio, $mail);
//        if (!is_null($datos)) {
//
//            $url = BASE_URL;
//            $url .= str_replace('./', '', self::getUrlImg($categoria));
//            foreach ($datos as $key => $nombre) {
////           $img = substr($nombre, 0, strpos($nombre, '-')) . strrchr($nombre, '.');
//                $datos[$key] = $url . $nombre;
//            }
////        Session::destroy("idVer");
////        Session::destroy("idMail");
////        Session::destroy("idCategoria");
////        Session::destroy("idSubcategoria");
//
//
//            return $datos;
//        }
//        return $datos;
//    }

//    public function categoria($categoria = 0, $publicacion = false,$id=false) {
//       
//       if (array_key_exists($categoria, $this->arrayCategoria) && !$publicacion && !$id) {
//           $this->pintar('Publicaciones '.$categoria, 'index', "publicaciones", null,null, array('listar'), null, DS . $categoria);
//        
//        } else if (array_key_exists($categoria, $this->arrayCategoria) && $publicacion == "anuncio") {
//            $this->_publicar($id);
//        } else {
//           $this->pintar('publicar', 'curso/index',null,null,array('pagination'),array('categorias'));
//        }
//
//        
//    }