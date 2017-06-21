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
use Models\AutorizacionesAnunciosModel;
use Config\Session;

class AutorizacionesController extends \Config\Controller {

    public function __construct() {
        parent::__construct();
        Session::sinAcceso();
        Session::accesoProfesorValidador();
       
    }

    public function index() {
        $this->objController(Session::get(TIPO_USER))->_crearAutorizacion();
    }


    public static function _crearAutorizacionAnuncioM($id,$mail) {
        return AutorizacionesAnunciosModel::addAutorizacion($id,$mail,Session::get(MAIL));
    }

}
