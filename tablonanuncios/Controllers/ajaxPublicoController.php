<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of ajaxController
 *
 * @author Edward
 */
use Config\Session;

//use Controllers\ProfesoresController;

class AjaxPublicoController extends \Config\Controller {

//put your code here
    private $accion;
    private $controlador;
    private $objControl;

    public function __construct() {
        parent::__construct();
    }

    public function index($argumentos = false) {

        if (isset($_GET['accion']) && !empty($_GET['accion'])) {
//            $url = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_URL);
            $accion = explode('_', $_GET['accion']);
            $accion = array_filter($accion);
            $this->accion = strtolower(array_shift($accion));
            $this->controlador = strtolower(array_shift($accion));
            $this->controlador .= array_shift($accion);
//            $this->objControl=$this->objController($this->controlador);

            $this->acciones();
        } else {
//            $this->redireccionar();
        }
    }

    /**
     * Funciones de accion
     */
    private function acciones() {
        switch ($this->accion) {
            case 'validar':
                $this->_controladorValidar();
                break;
            case 'ver':
                $this->_controladorVer();
                break;
            case 'crear':
                $this->_controladorCrear();
                break;
            case 'listar':
                $this->_controladorListar();
                break;
            default:
                echo "perdido";
        }
    }

    /**
     * Funciones para validar
     */
    private function _controladorValidar() {
        switch ($this->controlador) {
            case 'login':
                $this->_validarLogin();
                break;

        }
    }

    private function _validarLogin() {
        $arrayPost = $this->getPost(array('mail', 'contrasena'));
        if (!empty($arrayPost)) {
            if (loginController::_exitsLogin($arrayPost['mail'], $arrayPost['contrasena'])) {
                echo UsuariosController::_getUsuarioLogin($arrayPost['mail']);
            }
        }
        echo false;
    }

  

    /**
     * Funciones para ver
     */
    private function _controladorVer() {
        switch ($this->controlador) {
            case 'lineaPublicacion':
//                $this->_verLineaPublicacion();
                break;
        }
    }

    private function _verLineaPublicacion() {
        if (isset($_POST["ver"]) && isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["subCategoriaSel"])) {
            Session::set("idVer", $_POST["id"]);
            Session::set("idMail", UsuariosController::_getMail($_POST["nombre"], $_POST["apellido"]));
            Session::set("idCategoria", $_POST["categoriaSel"]);
            Session::set("idSubcategoria", $_POST["subCategoriaSel"]);
            echo Session::get("idVer");
        } else if (isset($_POST["ver"]) && !is_null(Session::get("idVer"))) {
            $datos = PublicacionesController::_verLineaPublicacion();
            if (!is_null($datos)) {
                header('Content-Type: application/json');
                echo $json = json_encode($datos);
            }
        }


//        echo false;
    }

    /**
     * Funciones para crear
     */
    private function _controladorCrear() {
        switch ($this->controlador) {
            case 'login':
                $this->_crearLogin();
                break;

            default:
                echo "nada crear";
                break;
        }
    }

    private function _crearLogin() {
        $getPost = $this->getPost(array('dni', 'mail', 'contrasena'));
        if (!empty($getPost)) {
            if (LoginController::_verificarLogin($getPost['mail'])) {
                if (UsuariosController::_getExits($getPost['dni'])) {                  
                    return LoginController::_agregarLogin($getPost['mail'], UsuariosController::_getUsuarioNivel($getPost['dni'], $getPost['mail']), $getPost['contrasena']);
                }
            }
        }
        echo false;
    }

  

    private function _crearPublicacion($autorizado, $id, $mail) {
        if ($autorizado) {
            echo PublicacionesController::_crearPublicacion($id, $mail);
        }
        echo false;
    }


    /**
     * Funciones para listar
     */
    private function _controladorListar() {
        switch ($this->controlador) {
            case 'noticias':
                $this->_listarNoticias();
                break;
            case 'publicacion':
                $this->_listarPortada();
                break;
//        
            default:
                echo "nada listar";
                break;
        }
    }

    private function _listarPortada() {
        $arrayPost = $this->getPost(array('listar', 'pag'), array('pag'));
        if (!empty($arrayPost)) {
            $datos = PublicacionesController::_listarPublicacionesNoticias("Portada", $arrayPost['pag']);
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    

    private function _listarCategorias() {
        if (isset($_POST["listar"])) {

            $datos = CategoriasController::_listarCategorias();
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarNoticias() {
        $arrayPost = $this->getPost(array('listar', 'categoria', 'pag'), array('pag'));
        if (!empty($arrayPost)) {
            switch (true) {
                case(ADMISION == $arrayPost['categoria']):
                    $this->_listarPublicacionNoticias("Admisión", $arrayPost['pag']);
                    break;
                case(MATRICULA == $arrayPost['categoria']):
                    $this->_listarPublicacionNoticias('Matricula', $arrayPost['pag']);
                    break;
                default :
                    echo false;
                    break;
            }
        }
        echo false;
    }

    private function _listarPublicacionNoticias($categoria, $pagina) {
        $datos = PublicacionesController::_listarPublicacionesNoticias($categoria, $pagina);
        header('Content-Type: application/json');
        echo $json = json_encode($datos);
    }



    private function _listarBusquedaPublicaciones() {
        if (isset($_POST["listar"]) && isset($_POST["buscar"]) && isset($_POST["categoriaSel"]) && isset($_POST["orden"]) && isset($_POST["pag"])) {
            Session::set(BUSCAR, $_POST["buscar"]);
            Session::set("categoria", $_POST["categoriaSel"]);
            echo true;

//        $datos = CategoriasController::_listarCategorias();       
//        $sql = $this->objController(Session::get(TIPO_USER));
//                    
//             
//                    $registros = PublicacionesController::_listarPublicacionesTodas($datos,$sql, $_POST["pag"],$_POST["buscar"], $_POST["orden"]);
//                    
////                    array_push($registros,$registros);
//           
//              header('Content-Type: application/json');
//                echo $json = json_encode($registros);
        } else if (Session::get(BUSCAR) && Session::get("categoria")) {
            $sql = $this->objController(Session::get(TIPO_USER));
            $datos = array();
            if (isset($_POST["subCategoriaSel"]) && !empty($_POST["subCategoriaSel"])) {
                $datos = PublicacionesController::_listarPublicaciones($sql, $_POST["categoriaSel"], $_POST["subCategoriaSel"], $_POST["orden"], $_POST["pag"]);
            } else {
                $datos = PublicacionesController::_listarPublicaciones($sql, $_POST["categoriaSel"], null, $_POST["orden"], $_POST["pag"]);
            }
//            echo $datos["registros"];
            if ($datos != 0) {
                $buscador = array(0 => Session::get(BUSCAR), 1 => Session::get("categoria"));
                $datos["buscador"] = $buscador;
            } else {
                $datos = array(0 => Session::get(BUSCAR), 1 => Session::get("categoria"));
            }

            Session::destroy(BUSCAR);
            Session::destroy("categoria");

            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

}
