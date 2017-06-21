<?php

namespace Config;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Edward
 */
use Libs\xss as filtrado;

abstract class Controller {

    //put your code here

    protected $view;
    protected $registry;

    public function __construct() {
        $this->registry = Registry::singleton();
//        $this->view=new View($registry->request);
        $this->view = $this->registry->view;
    }

    abstract public function index();

    /**
     * 
     * @param type $modelo
     * @return type
     * @throws \Exception
     */
    protected function loadModel($modelo) {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'Models' . DS . $modelo . '.php';
        if (is_readable($rutaModelo)) {
            require_once $rutaModelo;
//            require_once ROOT.'Models/postModel.php';
//            require_once ROOT.'Config/Model.php';
//            $modelo= "Models\\".$modelo;
//            return $rutaModelo;
//            $modelo = new $modelo;

            $modelo = Registry::objControllerRegistry($this->registry, $modelo);
//           $modelo= new \Models\postModel();
//              $modelo::singleton();

            return $modelo;
        } else {
            throw new \Exception("Error de modelo");
        }
    }

    /**
     * 
     * @param type $controller
     * @return type
     * @throws \Exception
     */
    protected function objController($controller) {
        $controller = explode('_', $controller);
        $controller = array_shift($controller);
        $controlador = $controller . 'Controller';

        $rutaModelo = ROOT . 'Controllers' . DS . $controlador . '.php';
        if (is_readable($rutaModelo)) {
//            require_once $rutaModelo;
//            require_once ROOT.'Models/postModel.php';
//            require_once ROOT.'Config/Model.php';

            $controlador = "Controllers\\" . $controlador;
            $controller = Registry::objControllerRegistry($controlador);
//            return $rutaModelo;
//            $controller = Registry::objControllerRegistry(Registry::singleton(), $controlador);;
//           $modelo= new \Models\postModel();
//              $modelo::singleton();

            return $controller;
        } else {
            throw new \Exception("Error de controlador");
        }
    }

    /**
     * 
     * @param array $clavePost
     * @param array $sinValor
     * @return type
     */
    protected function getPost(array $clavePost, array $sinValor = null) {
        $arrayAso = array();



        $this->getLibrary('xss\inputfilter');
        $filter = new \Libs\xss\InputFilter(array('b', 'i', 'img'), array('src'));
        foreach ($clavePost as $valor) {

            if ((isset($_POST[$valor]) && !empty($_POST[$valor]))) {
                $post = trim($_POST[$valor]);
                $arrayAso[$valor] = $filter->process($post);

            } else if (isset($_POST[$valor]) && !empty($sinValor)) {
                if ((isset($_POST[$valor]) && in_array($valor, $sinValor, true) == true && $_POST[$valor] == 0)) {
                    $post = trim($_POST[$valor]);
                    $arrayAso[$valor] = $filter->process($post);
                }
            } else {
                return null;
            }
        }
        return $arrayAso;
    }

    /**
     * 
     * @param type $valor
     * @return type
     */
    protected function getPostSingle($valor) {
        $post = null;

        $this->getLibrary('xss\inputfilter');
        $filter = new \Libs\xss\InputFilter(array('b', 'i', 'img'), array('src'));

        if (isset($_POST[$valor]) && !empty($_POST[$valor])) {
            $post = trim($_POST[$valor]);
            $post = $filter->process($post);
        }
        return $post;
    }

    /**
     * 
     * @param type $ruta
     */
    protected static function redireccionar($ruta = false) {
        if ($ruta) {
            header('location:' . BASE_URL . $ruta);
            exit;
        } else {
            header('location:' . BASE_URL);
            exit;
        }
    }

    /**
     * 
     * @param type $id
     * @return int
     */
    protected function filtrarInt($id) {
        $id = (int) $id;
        if (is_int($id)) {
            return $id;
        } else {
            return 0;
        }
    } 


    protected static function getLibrary($libreria) {
        $rutalibreria = ROOT . 'Libs' . DS . $libreria . '.php';
        if (is_readable($rutalibreria)) {
            require_once $rutalibreria;
        } else {
            throw new Exception("Error de libreria");
        }
    }
   
    /**
     * 
     * @param type $titulo
     * @param type $metodo
     * @param type $controllador
     * @param array $css
     * @param array $jsD
     * @param array $js
     * @param array $jsf
     * @param type $url
     */
    protected function pintar($titulo, $metodo, $controllador = false, array $css = null, array $jsD = null, array $js = null, array $jsf = null, $url = '') {

        if ($controllador) {
            $controllador = explode('_', $controllador);
            $controllador = array_filter($controllador);
            $controllador = array_shift($controllador); //          
        }


        $controllador .= $url;
        $this->view->titulo = $titulo;
        if (!is_null($css)) {
            $this->view->setCss($css, $controllador);
        }

        if (!is_null($jsD)) {
            $this->view->setJsDefault($jsD);
        }

        if (!is_null($js)) {
            $this->view->setJs($js, $controllador);
        }
        if (!is_null($jsf)) {
            $this->view->setJsFooter($jsf, $controllador);
        }
        $this->view->renderizar($metodo, $controllador);
    }

    /**
     * 
     * @param type $categoria
     * @return type
     */
    protected static function getUrlImg($categoria) {
        $url[CURSO] = URL_UPLOADS_CURSO_IMG;
        $url[MATERIAS] = URL_UPLOADS_MATERIA_IMG;
        $url[DEPARTAMENTOS] = URL_UPLOADS_DEPARTAMENTO_IMG;
        $url[INSTITUTO] = URL_UPLOADS_INSTITUTO_IMG;
        $url[DEFAUL_CATEGORY] = URL_UPLOADS_DEFAULT;

        if (!array_key_exists($categoria, $url)) {
            return null;
        } else {
            return $url[$categoria];
        }
    }

    /**
     * 
     * @param type $categoria
     * @return type
     */
    protected static function getUrLPdf($categoria) {
        $url[CURSO] = URL_UPLOADS_CURSO_PDF;
        $url[MATERIAS] = URL_UPLOADS_MATERIA_PDF;
        $url[DEPARTAMENTOS] = URL_UPLOADS_DEPARTAMENTO_PDF;
        $url[INSTITUTO] = URL_UPLOADS_INSTITUTO_PDF;
        if (!array_key_exists($categoria, $url)) {
            return null;
        } else {
            return $url[$categoria];
        }
    }

    /**
     * 
     * @param type $categoria
     * @return type
     */
    protected static function getUrlImgPublico($categoria) {
        $url[PORTADA] = URL_UPLOADS_PUBLICO_PORTADA_IMG;
        $url[ADMISION] = URL_UPLOADS_PUBLICO_ADMISION_IMG;

        if (!array_key_exists($categoria, $url)) {
            return null;
        } else {
            return $url[$categoria];
        }
    }

    /**
     * 
     * @param type $categoria
     * @return type
     */
    protected static function getUrLPdfPublico($categoria) {
        $url[PORTADA] = URL_UPLOADS_PUBLICO_PORTADA_PDF;
        $url[ADMISION] = URL_UPLOADS_PUBLICO_ADMISION_PDF;

        if (!array_key_exists($categoria, $url)) {
            return null;
        } else {
            return $url[$categoria];
        }
    }

    /**
     * 
     * @param type $fecha
     * @return boolean
     */
    protected static function compararFecha($fecha) {
        $fecha_actual = date('Y-m-d');
        if ($fecha_actual == $fecha) {
            return true;
        }
        return false;
    }

    /**
     * 
     * @param type $registros
     * @param type $pagina
     * @param type $limite
     * @return type
     */
    protected static function definirPagina($registros, $pagina, $limite = null) {
        self::getLibrary('paginador\paginador2');
        $paginador = new \libs\Paginador();
        if ($pagina == 0 && is_null(Session::get(PAGINA))) {
            Session::set(PAGINA, 1);
        } else if ($pagina == 0 && !is_null(Session::get(PAGINA))) {
            Session::set(PAGINA, Session::get(PAGINA));
        } else {
            Session::set(PAGINA, $pagina);
        }

        return $datos = $paginador->paginar($registros, Session::get(PAGINA), $limite);
    }

    /**
     * 
     * @param type $categoria
     * @return type
     */
    protected function convertSaveCategoriaPublica($categoria) {

        switch ($categoria) {
            case 'Admisión':
                $categoria = ADMISION;
                break;
        }

        return $categoria;
    }

    /**
     * 
     * @param string $categoria
     * @return string
     */
    protected function convertCategoriaPublica($categoria) {
        if ($this->view->getMetodo() == $categoria) {
            switch ($categoria) {
                case(ADMISION):
                    $categoria = 'Admisión';
                    break;
            }
        }
        return $categoria;
    }
    
    /**
     * 
     * @param type $mail
     * @return boolean
     */
    protected function validarEmail($mail){
        if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }

}
