<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of administracionesController
 *
 * @author Edward
 */
use Models\AdministrativosModel;
use Config\Session;

class AdministrativosController extends \Config\Controller {

    //put your code here
    public function __construct() {
        parent::__construct();
        Session::accesoEstricto(array(ADMINISTRATIVOS));
    }

    
    public function index() {      
     header('location:' . BASE_URL . "error");
    }

   
    public function _crear() {
        $this->pintar("Crear Anuncio", CREAR, Session::get(TIPO_USER), null, array('importar', 'fecha'), array(CREAR));
    }

    public function _crearPublico() {

        $this->pintar("Crear Anuncio Publico", CREAR, Session::get(TIPO_USER), null, array('importarAdministrativo', 'fecha'), array(CREAR), null, DS . PUBLICO);
    }

    public function _listar() {
       $this->pintar("Listar Anuncios", LISTAR, Session::get(TIPO_USER), null, array('pagination', 'fecha'), array(LISTAR,ELIMINAR));
     
    }
    
    public function _listarPublico() {

        $this->pintar("Listar Anuncios Publicos", LISTAR, Session::get(TIPO_USER), null, array('pagination','importarAdministrativo', 'fecha'), array(LISTAR), null, DS . PUBLICO);
    }

    public function alumnos() {
        switch ($this->view->getArgumentos()[0]) {
            case CREAR:
                $this->pintar('Crear Alumno', CREAR, 'administrativos', null, null, array('crear'), null, DS . 'alumnos');
                break;
            case 'crearlistado':
                $this->pintar('Crear Alumno listado', 'crear listado', 'administrativos', null, array('importar'), array('crear listado'), null, DS . 'alumnos');
                break;
        }
    }

    public function _StrSQLSubCategoria($categoria) {
        $str = "";

        switch ($categoria) {
            case GRUPOS:
                $str = AdministrativosModel::StrSQLSubCategoriaGM();
                break;
            case CURSOS:
                $str = AdministrativosModel::StrSQLSubCategoriaCM();
                break;
            case PROFESORES:
                $str = AdministrativosModel::StrSQLSubCategoriaMM();
                break;
            case DEPARTAMENTOS:              
                $str = AdministrativosModel::StrSQLSubCategoriaDM();
                break;

        }
        return $str;
    }
    
    
     public function _StrSQLPubliRegis($categoria,$jornada=null, $subcategoria = null, $buscar = null) {
        $str = "";
        switch ($categoria) {
            case CURSOS:
                $str = AdministrativosModel::StrSQLPubliRegisCM($jornada,$subcategoria, $buscar);
                break;
            case GRUPOS:
                $str = AdministrativosModel::StrSQLPubliRegisGM($jornada,$subcategoria, $buscar);
                break;
            case DEPARTAMENTOS:
                $str = AdministrativosModel::StrSQLPubliRegisDM($jornada,$subcategoria, $buscar);
                break;

        }
        return $str;
    }



public function _StrSQLPubli($categoria,$jornada=null, $subcategoria = null, $orden = null, $buscar = null) {
        $str = "";
        switch ($categoria) {
            case CURSOS:
                $str = AdministrativosModel::StrSQLPubliCursoM($subcategoria,$jornada, $orden, $buscar);
                break;
            case GRUPOS:                 
                $str = AdministrativosModel::StrSQLPubliGruposM($subcategoria,$jornada, $orden, $buscar);
               break;            
            case DEPARTAMENTOS:          
                $str = AdministrativosModel::StrSQLPubliDepartamentosM($subcategoria,$jornada, $orden, $buscar);
                break;

        }
        return $str;
    }

}