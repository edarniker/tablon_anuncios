<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;

/**
 * Description of Session
 *
 * @author Edward
 */
class Session {

    
    
    public static function init() {
        session_start();
    }

    /**
     * 
     * @param type $clave
     */
    public static function destroy($clave = false) {
        if ($clave) {
            if (is_array($clave)) {
                for ($i = 0; $i < count($clave); $i++) {
                    if (isset($_SESSION[$clave[$i]])) {
                        unset($_SESSION[$clave[$i]]);
                    }
                }
            } else {
                if (isset($_SESSION[$clave])) {
                    unset($_SESSION[$clave]);
                }
            }
        } else {
            session_destroy();
        }
    }

    /**
     * 
     * @param type $clave
     * @param type $valor
     */
    public static function set($clave, $valor) {

        if (!empty($clave)) {
            $_SESSION[$clave] = $valor;
        }
    }

    /**
     * 
     * @param type $clave
     * @return type
     */
    public static function get($clave) {
        if (isset($_SESSION[$clave]))
            return $_SESSION[$clave];
    }

    /**
     * 
     * @param type $tipo
     */
    public static function acceso($tipo) {
        if (!Session::get('acceso')) {
            header('location:' . BASE_URL . 'error/access/5058');
            exit;
        }
        if (Session::getLevel($tipo) > Session::getLevel(Session::get('tipo'))) {
            header('location:' . BASE_URL . 'error/access/5053');
            exit;
        }
    }

    
    public static function sinAcceso() {
        if (!Session::get('acceso')) {
            header('location:' . BASE_URL);
            exit;
        }
    }

    public static function accesoProfesorValidador() {
        if (Session::getLevel("profesores_validadores") != Session::getLevel(Session::get('tipo'))) {
            header('location:' . BASE_URL);
            exit;
        }
    }

    /**
     * 
     * @param type $level
     * @return boolean
     */
    public static function accesoView($level) {
        if (!Session::get('acceso')) {
            return false;
        }
        if (Session::getLevel($level) > Session::getLevel(Session::get('tipo'))) {
            return false;
        }
        return true;
    }

    /**
     * 
     * @param type $tipo
     * @return int
     * @throws \Exception
     */
    private static function getLevel($tipo) {
        $role['admin'] = 6;
        $role['administrativos'] = 5;
        $role['profesores_validadores'] = 4;
        $role['profesores'] = 3;
        $role['alumnos'] = 2;
//        echo $role[$level];
        if (!array_key_exists($tipo, $role)) {
            throw new \Exception('Error de acceso');
        } else {
            return $role[$tipo];
        }
    }

    /**
     * 
     * @param array $level
     * @param type $noAdmin
     * @return boolean
     */
    public static function accesoViewEstricto(array $level, $noAdmin = false) {

        if (!Session::get('acceso')) {
            return false;
        }


        if ($noAdmin == false) {
            if (Session::get('tipo') == 'admin') {
                return true;
            }
        }


        if (count($level)) {
            if (in_array(Session::get('tipo'), $level)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * 
     * @param array $level
     * @param type $noAdmin
     * @return boolean
     */
    public static function accesoEstricto(array $level, $noAdmin = false) {

        if (!Session::get('acceso')) {
            header('location:' . BASE_URL);
            return false;
        }


        if ($noAdmin == false) {
            if (Session::get('tipo') == 'admin') {
                return true;
            }
        }


        if (count($level)) {
            if (in_array(Session::get('tipo'), $level)) {
                return true;
            }
        }
        header('location:' . BASE_URL);
        return false;
    }

}
