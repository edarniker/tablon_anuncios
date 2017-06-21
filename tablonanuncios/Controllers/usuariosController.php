<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of usuarioController
 *
 * @author Edward
 */
use Models\UsuariosModel;
use Config\Session;

class UsuariosController extends \Config\Controller {

    //put your code here



    public function index() {
         header('location:' . BASE_URL . "error");
    }

    public static function _getUsuarioLogin($mail) {

        $datos = UsuariosModel::getUsuarioLoginM($mail);
        if (is_array($datos)) {
            Session::set(ACCESO, true);

            if (Session::get(TIPO_USER) != ADMIN) {
                Session::set(JORNADA, UsuariosModel::getJornadaIdNivelM(Session::get(TIPO_USER), $mail));
            }

            foreach ($datos as $clave => $valor) {
                if (!is_int($clave)) {
                    Session::set($clave, $valor);
                }
            }
            return true;
//
////         header("Location:index.php"); 
////        echo "<script> $(location).attr('href','" . URL . "')</script>";
        }
        return false;
    }

    public static function _getMail($nombre, $apellido) {
        return UsuariosModel::getMailM($nombre, $apellido);
    }

    public static function _agregarUsuario($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel) {
        if (!UsuariosController::_getExits($dni)) {
            return UsuariosModel::addUsuarioM($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel);
        }
        return true;
    }

    public static function _getExits($dni) {
        return UsuariosModel::getExistsM($dni);
    }

    public static function _eliminarUsuario($dni) {
        return UsuariosModel::eliminarUsuarioM($dni);
    }
    
    public static function _getUsuarioNivel($dni,$mail){
        return UsuariosModel::getUsuarioNivelM($dni,$mail);
    } 

}
