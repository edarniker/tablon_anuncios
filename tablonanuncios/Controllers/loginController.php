<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of loginController
 *
 * @author Edward
 */
use Models\LoginModel;
use Config\Session;
use Config\Hash;

class LoginController extends \Config\Controller {

    public function index() {
         header('location:' . BASE_URL . "error");
    }

    public static function _exitsLogin($mail, $pass) {

        $nivel = LoginModel::exitsLoginM($mail, Hash::getHash('sha1', $pass, HASH_KEY));

        if ($nivel) {

            Session::set(NIVEL, $nivel['id']);
            Session::set(TIPO_USER, $nivel['tipo']);
            return true;
        }
        return false;
    }

    public function cerrar() {
        Session::destroy();
        foreach ($_COOKIE as $key => $value) {
            unset($value);
            setcookie($key, '', time() - 3600);
        }
        $this->redireccionar();
    }

    public static function _agregarLogin($mail, $nivel, $pass) {
        if (LoginModel::addLoginM($mail, $nivel, Hash::getHash('sha1', $pass, HASH_KEY), $codigo)) {

            self::getLibrary('phpMailer\class.phpmailer');
            $correo = new \PHPMailer();
            $paginador = new \libs\Paginador();
            $codigo = rand(1000000000, 99999999999);
            $usuario = LoginModel::verificarLoginM($mail);
            if ($usuario) {
                $correo->From = 'www.tablonanuncios.esy.es';
                $correo->FromName = 'Tablón Anuncios';
                $correo->Subject = 'Activacion cuenta';
                $correo->Body = 'Hola <strong>Querido usuario</strong>' .
                        '<p>Estas a un paso de activar tu cuenta, para activar su cuenta' .
                        'haga clic sobre el siguiente enlace</br>' .
                        '<a href="' . BASE_URL . 'login/activar' .
                        $usuario['mail'] . '/' . $usuario['codigo'] . '">' .
                        BASE_URL . 'index/activar' .
                        $usuario['mail'] . '/' . $usuario['codigo'] . '</a>';
                $correo->AltBody = 'Su servidor de correo no soporta Html';
                $correo->$mail;
                $correo->send();
            }
        }

        return false;
    }
    
    public function activar($mail,$codigo){
    
        if(!$this->validarEmail($mail)||!$this->filtrarInt($codigo)){
            $this->pintar("Activar", 'index');
            exit;
        }
    }

    public static function _verificarLogin($mail) {
        return LoginModel::verificarLoginM($mail);
    }

}
