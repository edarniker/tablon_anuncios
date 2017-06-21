<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of alumnosController
 *
 * @author Edward
 */
use Models\AlumnosModel;
use Config\Session;

class AlumnosController extends \Config\Controller {

    public function __construct() {
        parent::__construct();
        Session::accesoEstricto(array(ALUMNOS));
    }

    public function index() {
         header('location:' . BASE_URL . "error");
    }

    public function _crear() { 
         $this->pintar("Crear Anuncio", CREAR, Session::get(TIPO_USER), null, array('importar', 'fecha','validador'), array(CREAR));
//        $this->pintar("Crear Anuncio",CREAR,,array('estilo'), Session::get(TIPO_USER),array(CREAR));
    }
    
    public function _listar(){      
        $this->pintar("Listar Anuncio", LISTAR, Session::get(TIPO_USER), null, array('pagination', 'fecha'),array(LISTAR));
      
        
    }
    
    public function _editar() {
        $this->pintar("Editar Anuncio", EDITAR, Session::get(TIPO_USER), null, array('importar','fecha','validador'),array(EDITAR));
       
    }

    public function _get(){
        return AlumnosModel::getAlumnoM(Session::get(MAIL));
    
//         if(!is_null($cod)){       
//            Session::set('curso',$cod);
//          return true;
//        }
//        return false;   
       
    }
    
    public static function _agregarAlumno($mail, $curso, $jornada){
        return AlumnosModel::addAlumnoM($mail, $curso, $jornada);
    }
    
    public static function _getCursoAlumno($mail){
        return AlumnosModel::getCursoAlumnoM($mail);
    }
    
     public function _StrSQLPubliRegis($categoria, $subcategoria = null,$buscar=null) {
        $str = "";       
        switch ($categoria) {
            case CURSO:               
                $str = AlumnosModel::StrSQLPubliRegisCM($subcategoria,$buscar);
                break;
//            case CURSOS_PROFESORES:
//                $str = ProfesoresModel::StrSQLPubliRegisCPM($subcategoria,$buscar);
//                break;
            case MATERIAS:
                $str = AlumnosModel::StrSQLPubliRegisMM($subcategoria,$buscar);
                break;
            case INSTITUTO:
                $str = AlumnosModel::StrSQLPubliRegisIM($subcategoria,$buscar);
                break;        
        }
        return $str;
    }
    
    
      public function _StrSQLPubli($categoria, $subcategoria = null, $orden = null, $buscar = null) {
        $str = "";
      
        switch ($categoria) {
            case CURSO:
                $str = AlumnosModel::StrSQLPubliCursoM($subcategoria, $orden, $buscar);
                break;
//            case CURSOS_PROFESORES:
//                $str = ProfesoresModel::StrSQLPubliCursoProfesoresM($subcategoria, $orden, $buscar);
//                break;
            case MATERIAS:
                $str = AlumnosModel::StrSQLPubliMateriaM($subcategoria, $orden, $buscar);
                break;
        case INSTITUTO:
                $str = AlumnosModel::StrSQLPubliInstitutoM($subcategoria, $orden, $buscar);
                break;
//            case ALLDEPARTAMENTOS:
//                $str = ProfesoresModel::StrSQLPubliDepartamentoAllM($subcategoria, $orden, $buscar);
//                break;
        }
        return $str;
    }

    public function _StrSQLSubCategoria($categoria) {
        $str = "";
    
        switch ($categoria) {
//            case CURSOS:
//                $str = AlumnosModel::StrSQLSubCategoriaCM();
//                break;
//            case CURSOS_PROFESORES:
//                $str = ProfesoresModel::StrSQLSubCategoriaCM();
//                break;
            case MATERIAS:
                $str = AlumnosModel::StrSQLSubCategoriaMM();
                break;
            case INSTITUTO:
                $str = AlumnosModel::StrSQLSubCategoriaIM();
                break;
//            case ALLDEPARTAMENTOS:
//                $str = ProfesoresModel::StrSQLSubCategoriaTDM();
//                break;
        }
        return $str;
    }
    
}
