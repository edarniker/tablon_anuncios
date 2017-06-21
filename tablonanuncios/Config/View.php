<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;

use Views\templates\defecto\Head;
use Views\templates\defecto\Header;
use Views\templates\defecto\Nav;
use Views\templates\defecto\Footer;
use Views\templates\defecto\HeadPublico;
use Views\templates\defecto\NavPublico;

/**
 * Description of View
 *
 * @author Edward
 */
class View {

    //put your code here
    private $controlador;
    private $jsD;
    private $js;
    private $jsf;
    private $css;
    private $rutaView;

    public function __construct(Request $request) {
        $this->controlador = $request->getControlador();
        $this->metodo = $request->getMetodo();
        $this->argumentos = $request->getArgumentos();
        $this->jsD = array();
        $this->js = array();
        $this->jsf = array();
        $this->css = array();
        $this->rutaView = "";
    }

   /**
    * 
    * @param type $vista
    * @param type $controlador
    * @param type $item
    */
    public function renderizar($vista, $controlador = false, $item = false) {


        $nav = $this->arraysNav();
        $subNav = $this->arraySubNav();
        
        $templateParams = array(
            'ruta_css' => BASE_URL . "Views/templates/" . DEFAULT_TEMPLATE . "/css/",
            'ruta_img' => BASE_URL . "Views/templates/" . DEFAULT_TEMPLATE . "/img/",
            'ruta_js' => BASE_URL . "Views/templates/" . DEFAULT_TEMPLATE . "/js/",
            'nav' => $nav,
            'subNav' => $subNav,
            'jsD' => $this->jsD,
            'js' => $this->js,
            'jsf' => $this->jsf,
            'css' => $this->css,
            'controlador'=>ucwords($this->controlador),
            'metodo'=>ucwords($this->metodo)
        );
        $templateParamsP = array(
            'ruta_css' => BASE_URL . PUBLIC_TEMPLATE . "/css/",
            'ruta_js' => BASE_URL . PUBLIC_TEMPLATE . "/js/",
            'ruta_img' => BASE_URL . PUBLIC_TEMPLATE . "/images/",
        );


        if ($controlador) {
            $this->rutaView = ROOT . 'Views' . DS . $controlador . DS . $vista . '.php';
        } else {
            $this->rutaView = ROOT . 'Views' . DS . $this->controlador . DS . $vista . '.php';
        }
//        echo $rutaView;
        if (is_readable($this->rutaView)) {

            if (Session::get('acceso')) {
                Head::pintar($templateParams, $templateParamsP, $this->titulo);
                Header::pintarTitulo();
                Header::salir();
                Nav::pintar($templateParams);
            } else {
                HeadPublico::pintar($templateParams, $templateParamsP, $this->titulo);
                Header::pintarTitulo();
                Header::pintarLogin();
                NavPublico::pintar($templateParams);
            }

            include_once $this->rutaView;
            Footer::pintar($templateParams);
        } else {
            header('location:' . BASE_URL . "error");
        }
    }

    /**
     * 
     * @param array $js
     * @param type $controlador
     * @throws \Exception
     */
    public function setJs(array $js, $controlador = false) {
        try {
            if (is_array($js) && count($js)) {
                for ($i = 0; $i < count($js); $i++) {
                    if ($controlador) {
                        $this->js[] = BASE_URL . 'Views/' . $controlador . '/js/' . $js[$i] . '.js';
                    } else {
                        $this->js[] = BASE_URL . 'Views/' . $this->controlador . '/js/' . $js[$i] . '.js';
                    }
                }
            }
        } catch (Exception $e) {
            throw new \Exception('Error de js');
        }
    }

    
    /**
     * 
     * @param array $jsD
     * @throws \Exception
     */
    public function setJsDefault(array $jsD) {
        try {
            if (is_array($jsD) && count($jsD)) {
                for ($i = 0; $i < count($jsD); $i++) {
                    $this->jsD[] = BASE_URL . "Views/templates/" . DEFAULT_TEMPLATE . "/js/" . $jsD[$i] . '.js';
                    ;
                }
            }
        } catch (Exception $e) {
            throw new \Exception('Error de js');
        }
    }

    /**
     * 
     * @param array $jsf
     * @param type $controlador
     * @throws \Exception
     */
    public function setJsFooter(array $jsf, $controlador = false) {
        try {
            if (is_array($jsf) && count($jsf)) {
                for ($i = 0; $i < count($jsf); $i++) {
                    if ($controlador) {
                        $this->jsf[] = BASE_URL . 'Views/' . $controlador . '/js/' . $jsf[$i] . '.js';
                    } else {
                        $this->jsf[] = BASE_URL . 'Views/' . $this->controlador . '/js/' . $jsf[$i] . '.js';
                    }
                }
            }
        } catch (Exception $e) {
            throw new \Exception('Error de js');
        }
    }

    /**
     * 
     * @param array $css
     * @param type $controlador
     * @throws \Exception
     */
    public function setCss(array $css, $controlador = false) {
        try {
            if (is_array($css) && count($css)) {
                for ($i = 0; $i < count($css); $i++) {
                    if ($controlador) {
                        $this->css[] = BASE_URL . 'Views/' . $controlador . '/css/' . $css[$i] . '.css';
                    } else {
                        $this->css[] = BASE_URL . 'Views/' . $this->controlador . '/css/' . $css[$i] . '.css';
                    }
                }
            }
        } catch (Exception $e) {
            throw new \Exception('Error de css');
        }
    }

    /**
     * 
     * @return array
     */
    private function arraysNav() {

        if (Session::get('acceso')) {

            $nav = array(
                array(
                    'id' => 'inicio',
                    'titulo' => 'Inicio',
                    'enlace' => BASE_URL,
                ),
                array(
                    'id' => PUBLICACIONES,
                    'titulo' => PUBLICACIONES,
                    'enlace' => BASE_URL . PUBLICACIONES,
                ),
                array(
                    'id' => 'crearAnuncio',
                    'titulo' => 'Crear Anuncio',
                    'enlace' => BASE_URL . ANUNCIOS . DS . CREAR,
                ),
                array(
                    'id' => 'misAnuncios',
                    'titulo' => 'Mis Anuncios',
                    'enlace' => BASE_URL . ANUNCIOS . DS . LISTAR,
                ),
            );
            if (Session::accesoViewEstricto(array(PROFESORES_VALIDADORES))) {
                array_push($nav, array(
                    'id' => 'autorizaciones',
                    'titulo' => 'Autorizar Anuncios',
                    'enlace' => BASE_URL . AUTORIZACIONES
                        )
                );
            };
            if (Session::accesoViewEstricto(array(ADMINISTRATIVOS))) {
                $nav[2] = array(
                    'id' => 'Anuncios Privados',
                    'titulo' => 'Anuncios Privados',
                    'enlace' => BASE_URL . ANUNCIOS,
                    'sub' => true
                );
                $nav[3] = array(
                    'id' => 'Anuncios Publicos',
                    'titulo' => 'Anuncios Publicos ',
                    'enlace' => BASE_URL . ANUNCIOS . DS . CREAR,
                    'sub' => true
                );
                array_push($nav, array(
                    'id' => 'Alumnos',
                    'titulo' => 'Alumnos',
                    'enlace' => BASE_URL . ADMINISTRATIVOS . DS . ALUMNOS,
                    'sub' => true
                        )
                );
            }
        } else {
            $nav = array(
                array(
                    'id' => 'inicio',
                    'titulo' => 'INICIO',
                    'enlace' => BASE_URL
                ),
                array(
                    'id' => 'centro',
                    'titulo' => 'EL CENTRO',
                    'enlace' => BASE_URL,
                    'sub' => true
                ),
                array(
                    'id' => 'secretaria',
                    'titulo' => 'SECRETARIA',
                    'enlace' => BASE_URL,
                     'sub' => true
                ),
            );
        }
        return $nav;
    }

    /**
     * 
     * @return array
     */
    private function arraySubNav() {

        if (Session::get('acceso')) {

            $subNav = array(
                array(
                    array(
                        'titulo' => 'Crear Anuncio',
                        'enlace' => BASE_URL . ANUNCIOS . DS . CREAR
                    ),
                    array(
                        'titulo' => 'Mis Anuncios',
                        'enlace' => BASE_URL . ANUNCIOS . DS . LISTAR
                    ),
                ),
                array(
                    array(
                        'titulo' => 'Crear Anuncio',
                        'enlace' => BASE_URL . ANUNCIOS . DS . PUBLICO . DS . CREAR,
                    ),
                    array(
                        'titulo' => 'Mis Anuncios',
                        'enlace' => BASE_URL .ANUNCIOS . DS . PUBLICO . DS . LISTAR
                    )
                ),
                array(
                    array(
                        'titulo' => 'Agregar Alumno',
                        'enlace' => BASE_URL . 'administrativos' . DS . 'alumnos' . DS . 'crear'
                    ),
                    array(
                        'titulo' => 'Agregar Alumnos',
                        'enlace' => BASE_URL . 'administrativos' . DS . 'alumnos' . DS . 'crear listado'
                    )
                )
            );
            if (Session::accesoViewEstricto(array("profesores_validadores"))) {
                array_push($subNav, array(
                    'titulo' => 'Autorizar Anuncios',
                    'enlace' => BASE_URL . 'autorizacionesAnuncios'
                ));
            };
        } else {
            $subNav = array(
                array(
                    array(
                        'titulo' => 'Nuestro Centro',
                        'enlace' => BASE_URL . INDEX . DS . NUESTRO_CENTRO
                    ),
                    array(
                        'titulo' => 'Historia',
                        'enlace' => BASE_URL . INDEX . DS . HISTORIA
                    ),
                ),
                array(
                    array(
                        'titulo' => 'Horario',
                        'enlace' => BASE_URL . INDEX . DS . HORARIO
                    ),
                    array(
                        'titulo' => 'Admisión',
                        'enlace' => BASE_URL . INDEX . DS . ADMISION
                    ),
                    array(
                        'titulo' => 'Matricula',
                        'enlace' => BASE_URL . INDEX . DS . MATRICULA
                    ),
                ),
            );
        }
        return $subNav;
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

    /**
     * 
     * @param type $vista
     * @param type $controlador
     */
    public function setRuta($vista, $controlador) {

        if ($controlador) {
            $this->rutaView = ROOT . 'Views' . DS . $controlador . DS . $vista . '.php';
        } else {
            $this->rutaView = ROOT . 'Views' . DS . $this->controlador . DS . $vista . '.php';
        }
    }

}
