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
use Models\ProfesoresModel;
use Config\Session;

class ProfesoresController extends \Config\Controller {

   

    public function __construct() {
        parent::__construct();
//        Session::sinAcceso();
        Session::accesoEstricto(array(PROFESORES,PROFESORES_VALIDADORES));
    }

    public function index() {
         header('location:' . BASE_URL . "error");
    }

    public function _crear() {
        $this->pintar("Crear Anuncio", CREAR, Session::get(TIPO_USER), null, array('importar', 'fecha','validador'), array(CREAR));
    }

    public function _listar() {
        $this->pintar("Listar Anuncio", LISTAR, Session::get(TIPO_USER), null, array('pagination', 'fecha'), array(LISTAR, ELIMINAR));
    }

    public function _editar() {
        $this->pintar("Editar Anuncio", EDITAR, Session::get(TIPO_USER), null, array('pagination', 'fecha'), array(EDITAR));
    }

    public function _crearAutorizacion() {
        $this->pintar("Autorizar Anuncio", INDEX, Session::get(TIPO_USER), null, array('pagination', 'fecha'), array(AUTORIZAR, CREAR), null, DS . 'autorizar');
    }


    public function _StrSQLPubliRegis($categoria, $subcategoria = null, $buscar = null) {
        $str = "";
        switch ($categoria) {
            case CURSO:
                $str = ProfesoresModel::StrSQLPubliRegisCM($subcategoria, $buscar);
                break;
            case CURSOS_PROFESORES:
                $str = ProfesoresModel::StrSQLPubliRegisCPM($subcategoria, $buscar);
                break;
            case MATERIAS:
                $str = ProfesoresModel::StrSQLPubliRegisMM($subcategoria, $buscar);
                break;
            case DEPARTAMENTOS_PROFESOR:
                $str = ProfesoresModel::StrSQLPubliRegisDM($subcategoria, $buscar);
                break;
            case ALLDEPARTAMENTOS:
                $str = ProfesoresModel::StrSQLPubliRegisTDM($subcategoria, $buscar);
                break;
            case PROFESORES:
                $str = ProfesoresModel::StrSQLPubliRegisPM($subcategoria, $buscar);
                break;
            case INSTITUTO:
                $str = ProfesoresModel::StrSQLPubliRegisIM($subcategoria, $buscar);
                break;
        }
        return $str;
    }

    public function _StrSQLPubli($categoria, $subcategoria = null, $orden = null, $buscar = null) {
        $str = "";
        switch ($categoria) {
            case CURSO:
                $str = ProfesoresModel::StrSQLPubliCursoM($subcategoria, $orden, $buscar);
                break;
            case CURSOS_PROFESORES:
                $str = ProfesoresModel::StrSQLPubliCursoProfesoresM($subcategoria, $orden, $buscar);
                break;
            case MATERIAS:
                $str = ProfesoresModel::StrSQLPubliMateriaM($subcategoria, $orden, $buscar);
                break;
            case DEPARTAMENTOS_PROFESOR:
                $str = ProfesoresModel::StrSQLPubliDepartamentoM($subcategoria, $orden, $buscar);
                break;
            case ALLDEPARTAMENTOS:
                $str = ProfesoresModel::StrSQLPubliDepartamentoAllM($subcategoria, $orden, $buscar);
                break;
            case PROFESORES:
                $str = ProfesoresModel::StrSQLPubliProfesoresM($subcategoria, $orden, $buscar);
                break;
            case INSTITUTO:
                $str = ProfesoresModel::StrSQLPubliInstitutoM($subcategoria, $orden, $buscar);
                break;
        }
        return $str;
    }

    public function _StrSQLSubCategoria($categoria) {
        $str = "";

        switch ($categoria) {
            case CURSO:
                $str = ProfesoresModel::StrSQLSubCategoriaCM();
                break;
            case CURSOS_PROFESORES:
                $str = ProfesoresModel::StrSQLSubCategoriaCM();
                break;
            case MATERIAS:
                $str = ProfesoresModel::StrSQLSubCategoriaMM();
                break;
            case DEPARTAMENTOS_PROFESOR:
                $str = ProfesoresModel::StrSQLSubCategoriaDM();
                break;
            case ALLDEPARTAMENTOS:
                $str = ProfesoresModel::StrSQLSubCategoriaTDM();
                break;
            case PROFESORES:
                $str = ProfesoresModel::StrSQLSubCategoriaJM();
                break;
            case INSTITUTO:
                $str = ProfesoresModel::StrSQLSubCategoriaJM();
                break;
        }
        return $str;
    }

}
