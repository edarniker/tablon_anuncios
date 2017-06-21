<?php

namespace Controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexController
 *
 * @author Edward
 */
class IndexController extends \Config\Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        switch ($this->view->getMetodo()) {
            case INDEX:
                $this->pintar("Portada", INDEX, false, null, array('pagination','fecha'), array(LOGIN,PORTADA));
                break;
            case NUESTRO_CENTRO:
                $this->pintar("Centro", NUESTRO_CENTRO, false, null, null, array(LOGIN));
                break;
            case HISTORIA:
                $this->pintar("Historia", HISTORIA, false, null, null, array(LOGIN));
                break;
            case HORARIO:
                $this->pintar("Horario", HORARIO, false, null,null, array(LOGIN));
                break;
            case ADMISION:
                $this->pintar("Admisión",NOTICIAS , false, null, array('importar', 'fecha', 'pagination'), array(LOGIN, NOTICIAS));
                break;
            case MATRICULA:
                $this->pintar("Matricula",NOTICIAS , false, null, array('importar', 'fecha', 'pagination'), array(LOGIN, NOTICIAS));
                break;
            default :
                 header('location:' . BASE_URL . "error");
                break;
        }
    }

//    public function centro(){
//        $this->pintar("Portada","prueba", false, null, array('importar', 'fecha','pagination'), array(LOGIN,PORTADA));
//    }
}
