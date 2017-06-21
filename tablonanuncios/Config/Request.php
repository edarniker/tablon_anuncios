<?php

namespace Config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Request
 *
 * @author Edward
 */
class Request {

    private $controlador;
    private $metodo;
    private $argumentos;

    public function __construct() {

        if (isset($_GET['url'])) {
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            $url = array_filter($url);


            $this->controlador = strtolower(array_shift($url));
            $this->metodo = strtolower(array_shift($url));

            $this->argumentos = $url;
        }

        if (!$this->controlador) {
            $this->controlador = DEFAULT_CONTROLLER;
        }

        if (!$this->metodo) {
            $this->metodo = DEFAULT_CONTROLLER;
        }

        if (empty($this->argumentos)) {
            $this->argumentos = null;
        }
//        }else{
//            if (!$this->controlador) {
//                $this->controlador = "index";
//            }
//            
//        }
    }

    /**
     * 
     * @return type
     */
    public function getControlador() {
        return $this->controlador;
    }

    /**
     * 
     * @param type $controlador
     */
    public function setControlador($controlador) {
        $this->controlador = $controlador;
    }

    /**
     * 
     * @return type
     */
    public function getMetodo() {
        return $this->metodo;
    }

    /**
     * 
     * @return type
     */
    public function getArgumentos() {
        return $this->argumentos;
    }

}
