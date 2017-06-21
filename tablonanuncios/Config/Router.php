<?php

namespace Config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Router
 *
 * @author Edward
 */
class Router {

    private $controlador2;

    /**
     * 
     * @param \Config\Request $request
     */
    public static function run(Request $request) {

        $controlador = $request->getControlador() . 'Controller';
        $rutaController = ROOT . 'Controllers' . DS . $controlador . '.php';

        $metodo = 'index';
        $argumentos = $request->getArgumentos();


        if (is_readable($rutaController)) {

            $controlador = "Controllers\\" . $controlador;
            $controlador = Registry::objControllerRegistry($controlador);



            if (is_callable(array($controlador, $request->getMetodo()))) {

                if (strpos($request->getMetodo(), '_') !== 0) {

                    $metodo = $request->getMetodo();
                }
            }

            if (isset($argumentos)) {
                call_user_func_array(array($controlador, $metodo), $argumentos);
            } else {
                call_user_func(array($controlador, $metodo));
            }
        } else {
            header('location:' . BASE_URL . "error");
        }
    }

}
