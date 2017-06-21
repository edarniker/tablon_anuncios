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
use Models\CategoriasModel;
use Config\Session;

class CategoriasController extends \Config\Controller {

    //put your code here
    private $arrayCategoria;

    public function __construct() {
        parent::__construct();
        Session::sinAcceso();

//        echo "hola";
    }

    public function index() {
        header('location:' . BASE_URL . "error");
    }

    public static function _listarCategorias() {
        return CategoriasModel::listarCategoriasM(Session::get(NIVEL));
    }

    public static function _listarCategoriasAutorizar() {
        return CategoriasModel::listarCategoriasM(NIVEL_ALUMNOS);
    }

    public static function _listarCategoriasPublico() {
        return CategoriasModel::listarCategoriasPublicoM();
    }

    public static function _listarCategoriasindex() {
        return CategoriasModel::listarCategoriasindexM(Session::get(NIVEL));
    }

    public static function _listarCategoriaSel($sql, $categoria, $jornada = null) {
        $resultado = null;
        switch ($categoria) {
            case CURSO:
                if (Session::get(TIPO_USER) == ALUMNOS) {
                    $resultado = array(ALUMNOS, PROFESORES);
                } else {
                    $resultado = CategoriasModel::listarCategoriaCursosM($sql->_StrSQLSubCategoria($categoria), Session::get(MAIL));
                }
                break;
            case MATERIAS:
                $resultado = CategoriasModel::listarCategoriaMateriaM($sql->_StrSQLSubCategoria($categoria), Session::get(MAIL));
                break;
            case DEPARTAMENTOS_PROFESOR:
                $resultado = CategoriasModel::listarCategoriaDepartamentoM($sql->_StrSQLSubCategoria($categoria),Session::get(MAIL));
                break;
            case DEPARTAMENTOS:
                $resultado = CategoriasModel::listarCategoriaDepartamentoAdministrativosM($sql->_StrSQLSubCategoria($categoria), $jornada);
                break;
            case ALLDEPARTAMENTOS:
                $resultado = CategoriasModel::listarCategoriaDepartamentoM($sql->_StrSQLSubCategoria($categoria), null);
                break;
            case CURSOS_PROFESORES:
                $resultado = CategoriasModel::listarCategoriaCursosM($sql->_StrSQLSubCategoria($categoria), Session::get(MAIL));
                break;            
            case PROFESORES:
                if (Session::get(TIPO_USER) == ADMINISTRATIVOS) {
                    $resultado = CategoriasModel::listarCategoriaDepartamentoProfesoresM($sql->_StrSQLSubCategoria($categoria));
                } else {
                    $resultado = CategoriasModel::listarCategoriaInstitutoM($sql->_StrSQLSubCategoria($categoria));
                }
                break;
            case GRUPOS:
                $resultado = CategoriasModel::listarCategoriaGruposM($sql->_StrSQLSubCategoria($categoria), $jornada);
                break;
            case CURSOS:
                $resultado = CategoriasModel::listarCategoriaCursosAdministrativosM($sql->_StrSQLSubCategoria($categoria), $jornada);
                break;
            case INSTITUTO:
                $resultado = CategoriasModel::listarCategoriaInstitutoM($sql->_StrSQLSubCategoria($categoria));
                break;
        }
        return $resultado;
    }

    public static function _getIDCategoria($nombre) {
        return CategoriasModel::getIDCategoriaM($nombre);
    }

    public static function _getNombreCategoria($id) {
        return CategoriasModel::getNombreCategoriaM($id);
    }

    public static function _getIDCategoriaPublico($nombre) {
        return CategoriasModel::getIDCategoriaPublicoM($nombre);
    }

}
