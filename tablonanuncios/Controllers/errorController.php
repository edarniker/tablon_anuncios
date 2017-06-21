<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of ErrorController
 *
 * @author Edward
 */
class ErrorController extends \Config\Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->mensaje = $this->getError();
        $this->pintar("Error", INDEX, null, null, null, null);

//        $this->view->mensaje = $this->getError();
//        $this->view->renderizar('index');
    }

    public function access($codigo) {
        $this->view->titulo = 'Error';
        $this->view->mensaje = $this->getError($codigo);
        $this->view->renderizar('access');
    }

    private function getError($codigo = false) {

        echo $codigo;
        if ($codigo) {
            $codigo = $this->filtrarInt($codigo);
            if (is_int($codigo))
                $codigo = $codigo;
        }else {
            $codigo = 'default';
        }


        $error['default'] = 'Ha ocurrido un error y la página no puede mostrarse';
        $error['5050'] = 'Acceso restringido';
        if (array_key_exists($codigo, $error)) {
            return $error[$codigo];
        }
    }

}
