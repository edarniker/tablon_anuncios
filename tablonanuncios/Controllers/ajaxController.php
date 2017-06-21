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

class AjaxController extends \Config\Controller {

//put your code here
    private $accion;
    private $controlador;

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
            case 'editar':
                $this->_controladorEditar();
                break;
            case 'eliminar':
                $this->_controladorElimnar();
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
//                $this->_validarLogin();
                break;
            case 'imagenes':
                $this->_validarImagenes();
                break;
            case 'pdf':
                $this->_validarPdf();
                break;
            case 'file':
                $this->_validarFile();
                break;
        }
    }

    private function _validarImagenes() {
        if ($_FILES["imagenes"]["error"] == 0) {
            echo $validar = ImportarController::_comprobarImagenes($_FILES["imagenes"]);
        }
        echo false;
    }

    private function _validarPdf() {
        if ($_FILES["pdf"]["error"] == 0) {
//            self::getLibrary('importar');
            echo $validar = ImportarController::_comprobarPdf($_FILES["pdf"]);
        }
        echo false;
    }

    private function _validarFile() {
        echo $_POST["id"];
//        if ($_FILES["file"]["error"] == 0) {           
//            echo $validar = ImportarController::_importListAlumnos($_FILES["file"]);
//        }
////        echo false;
    }

    /**
     * Funciones para ver
     */
    private function _controladorVer() {
        switch ($this->controlador) {
            case 'lineaPublicacion':
                $this->_verLineaPublicacion();
                break;
            case 'lineaCategoria':
                $this->_verLineaCategoria();
                break;
        }
    }

    private function _verLineaPublicacion() {
        if (isset($_POST["ver"]) && isset($_POST["id"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["subCategoriaSel"])) {
            Session::set("idVer", $_POST["id"]);
            Session::set("idMail", UsuariosController::_getMail($_POST["nombre"], $_POST["apellido"]));
            Session::set("idCategoria", $_POST["categoriaSel"]);
            Session::set("idSubcategoria", $_POST["subCategoriaSel"]);
////            echo Session::get("idVer");
            echo Session::get("idMail");
        } else if (isset($_POST["ver"]) && !is_null(Session::get("idVer"))) {

//            $datos = PublicacionesController::_verLineaPublicacion();
//            if (!is_null($datos)) {
//                header('Content-Type: application/json');
//                echo $json = json_encode($datos);
//            }
        }


//        echo false;
    }

    private function _VerlineaCategoria() {
        if (!empty($this->getPostSingle($_POST['ver'])) && !is_null(Session::get("id"))) {
            $datos = AnunciosController::_verLineaCategoriaAnuncioM();
            if (!is_null($datos)) {
                header('Content-Type: application/json');
                echo $json = json_encode($datos);
            }
        }
        echo false;
    }

    /**
     * Funciones para crear
     */
    private function _controladorCrear() {
        switch ($this->controlador) {
            case 'anuncio':
                $this->_crearAnuncio();
                break;
            case 'anuncioAdministrativos':
                $this->_crearAnuncioAdministrativos();
                break;
            case 'ficheros':
                $this->_subirFicheros();
                break;
            case 'anuncioPublico':
                $this->_crearAnuncioPublico();
                break;
            case 'ficherosPublicos':
                $this->_subirFicherosPublicos();
                break;
            case 'autorizacion':
                $this->_crearAutorizacionAnuncio();
                break;
            case 'usuario':
                $this->_crearUsuario();
                break;
            case 'alumnos':
                $this->_crearAlumnos();
                break;

            default:
                echo "nada crear";
                break;
        }
    }

    private function _crearAnuncio() {
        if (Session::get(TIPO_USER) == ALUMNOS && $_POST['categoria'] == CURSO) {
            $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion'));
            if (!empty($arrayPost)) {
                $arrayPost['categoriaSel'] = json_encode(array(AlumnosController::_getCursoAlumno(Session::get(MAIL))));
            }
        } else if ($_POST['categoria'] == INSTITUTO) {
            $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion'));
            if (!empty($arrayPost)) {
                $arrayPost['categoriaSel'] = json_encode(array(Session::get(JORNADA)));
            }
        } else {
            $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion', 'categoriaSel'));
        }

        if (!empty($arrayPost)) {
            $valor = AnunciosController::_crearAnuncio($arrayPost["titulo"], $arrayPost["descripcion"], CategoriasController::_getIDCategoria($arrayPost["categoria"]), $arrayPost['categoriaSel'], $arrayPost["fechaPublicacion"]);
            header('Content-Type: application/json');
            $datos = array("datos" => $valor);
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _crearAnuncioAdministrativos() {

        $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'categoriaSel', 'fechaPublicacion', 'jornadas'));

        if (!empty($arrayPost)) {
            $valor = AnunciosController::_crearAnuncioAdministrativo($arrayPost["titulo"], $arrayPost["descripcion"], CategoriasController::_getIDCategoria($arrayPost["categoria"]), $arrayPost['categoriaSel'], $arrayPost["fechaPublicacion"], $arrayPost['jornadas']);
            header('Content-Type: application/json');
            $datos = array("datos" => $valor);
            echo $json = json_encode($datos);
        }
        echo false;
    }

    public function _subirFicheros() {
        if (isset($_FILES["imagenes"]) || isset($_FILES["pdf"]) && isset($_POST["categoria"])) {
            echo AnunciosController::_comprobarFicheros($_FILES["imagenes"], $_FILES["pdf"], $_POST["categoria"]);
        }
    }

    private function _crearAnuncioPublico() {
        $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion'));
        if (!empty($arrayPost)) {
            $valor = AnunciosController::_crearAnuncioPublico($_POST["titulo"], $_POST["descripcion"], CategoriasController::_getIDCategoriaPublico($_POST["categoria"]), $_POST["fechaPublicacion"]);
            header('Content-Type: application/json');
            $datos = array("datos" => $valor);
            echo $json = json_encode($datos);
        }
        echo false;
    }

    public function _subirFicherosPublicos() {
        if ((isset($_FILES["imagenes"]) || isset($_FILES["pdf"])) && isset($_POST["categoria"])) {
            $valor = AnunciosController::_comprobarFicherosPublicos($_FILES["imagenes"], $_FILES["pdf"], $this->convertSaveCategoriaPublica($_POST["categoria"]));
            header('Content-Type: application/json');
            $datos = array("datos" => $valor);
            echo $json = json_encode($datos);
        }
    }

    private function crearAutorizacionAnuncio() {
        if (isset($_POST["crear"]) && isset($_POST["id"]) && isset($_POST["mail"])) {

            $this->_crearPublicacion(true, $_POST["id"], $_POST["mail"]);
//            if ($_POST["crear"]) {
//                $this->_crearPublicacion(AutorizacionesAnunciosController::_crearAutorizacionAnuncioM($_POST["id"], $_POST["mail"], $_POST["crear"]),
//                        $_POST["id"],
//                        $_POST["mail"]);
//               
//            } else {
//                 echo AnunciosController::_editarAlumnosRevisarM($_POST["id"],$_POST["mail"]);
//            }
        }
        echo false;
    }

    private function _crearPublicacion($autorizado, $id, $mail) {
        if ($autorizado) {
            echo PublicacionesController::_crearPublicacion($id, $mail);
        }
        echo false;
    }

    private function _crearUsuario() {

        if (isset($_POST["dni"]) && isset($_POST["mail"]) && isset($_POST["nombre"]) && isset($_POST["primerApellido"]) && isset($_POST["segundoApellido"]) && isset($_POST["user"])) {

            echo UsuariosController::_agregarUsuario($_POST["dni"], $_POST["nombre"], $_POST["primerApellido"], $_POST["segundoApellido"], $_POST["mail"], $_POST["user"]);
        }
        echo false;
    }

    private function _crearAlumnos() {
        if (isset($_FILES['file']) && isset($_POST['user'])) {
            echo ImportarController::_importListAlumnos($_FILES['file'], $_POST['user']);
        }
        echo false;
    }

    /**
     * Funciones para listar
     */
    private function _controladorListar() {
        switch ($this->controlador) {
            case 'anunciosAutorizar':
                $this->_listarAnunciosAlumnos();
                break;
            case 'categorias':
                $this->_listarCategorias();
                break;
            case 'categoriasAutorizar':
                $this->_listarCategoriasAutorizar();
                break;
            case 'categoriaSeleccionada':
                $this->_listarCategoriaSel();
                break;
            case 'categoriaSeleccionadaAdministrativos':
                $this->_listarCategoriaSelAdministrativos();
                break;
            case 'categoriasPublico':
                $this->_listarCategoriasPublico();
                break;
            case 'publicacion':
                $this->_listarPublicacion();
                break;
            case 'publicacionAdministrativos':
                $this->_listarPublicacionAdministrativos();
                break;
            case 'busquedaPublicaciones':
                $this->_listarBusquedaPublicaciones();
                break;
            case 'anuncios':
                $this->_listarAnuncios();
                break;
            case 'lineaAnuncio':
                $this->_listarLineaAnuncio();
                break;
            case 'jornadas':
                $this->_listarJornadas();
                break;
            default:
                echo "nada listar";
                break;
        }
    }

    private function _listarAnunciosAlumnos() {
        $arrayPost = $this->getPost(array('listar', 'categoria', 'orden', 'pag'), array('categoria', 'pag'));
        if (!empty($arrayPost)) {
            $datos = AnunciosController::_listarAnunciosAlumnos($arrayPost['orden'], CategoriasController::_getIDCategoria($arrayPost['categoria']), $arrayPost['pag']);
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarCategorias() {
        $arrayPost = $this->getPost(array('listar'));
        if (!empty($arrayPost)) {

            $datos = CategoriasController::_listarCategorias();
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarCategoriasAutorizar() {
        $arrayPost = $this->getPost(array('listar'));
        if (!empty($arrayPost)) {

            $datos = CategoriasController::_listarCategoriasAutorizar();
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarCategoriaSel() {
        $arrayPost = $this->getPost(array('listar', 'categoria'));
        if (!empty($arrayPost)) {
            $sql = $this->objController(Session::get(TIPO_USER));
            $datos = CategoriasController::_listarCategoriaSel($sql, $arrayPost['categoria']);
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarCategoriaSelAdministrativos() {

        $arrayPost = $this->getPost(array('listar', 'categoria', 'jornada'), array('jornada'));
        if (!empty($arrayPost) && ($arrayPost['categoria'] != CURSOS || ALUMNOS != Session::get(TIPO_USER))) {
            $sql = $this->objController(Session::get(TIPO_USER));
            $datos = CategoriasController::_listarCategoriaSel($sql, $arrayPost['categoria'], JornadasController::_getJornadaCod($arrayPost['jornada']));
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarCategoriasPublico() {
        if (isset($_POST["listar"])) {
            $datos = CategoriasController::_listarCategoriasPublico();
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarPublicacion() {


        if (Session::get(BUSCAR) && Session::get("categoria")) {
            $this->_listarBusquedaPublicaciones();
        } else if ($_POST['listar']) {
            $arrayPost = $this->getPost(array('listar', 'orden', 'categoriaSel', 'pag'), array('pag'));
            if (!empty($arrayPost)) {
                $this->_publicaciones($arrayPost);
            }
        }
        echo false;
    }

    private function _listarPublicacionAdministrativos() {
        if (Session::get(BUSCAR) && Session::get("categoria")) {
            $this->_listarBusquedaPublicaciones();
        } else if ($_POST['listar']) {
            $array = $this->getPost(array('listar', 'orden', 'categoriaSel', 'jornada', 'pag'), array('pag', 'jornada'));
            if (!empty($array)) {
                $sql = $this->objController(ADMINISTRATIVOS);
                $arrayPost = $this->getPost(array("subCategoriaSel"));


                if (!empty($arrayPost)) {

                    $datos = PublicacionesController::_listarPublicacionesAdministrativos($sql, $array["categoriaSel"], $array["orden"], $array["pag"], $array["jornada"], $arrayPost["subCategoriaSel"]);
                } else {
                    $datos = PublicacionesController::_listarPublicacionesAdministrativos($sql, $array["categoriaSel"], $array["orden"], $array["pag"], $array["jornada"]);
                }
                header('Content-Type: application/json');
                echo $json = json_encode($datos);
            }
        }
        echo false;
    }

    private function _publicaciones($array) {
        $sql = $this->objController(Session::get(TIPO_USER));
        $arrayPost = $this->getPost(array("subCategoriaSel"));
        if (!empty($arrayPost)) {
            $datos = PublicacionesController::_listarPublicaciones($sql, $array["categoriaSel"], $array["orden"], $array["pag"], $arrayPost["subCategoriaSel"]);
        } else {
            $datos = PublicacionesController::_listarPublicaciones($sql, $array["categoriaSel"], $array["orden"], $array["pag"]);
        }


        header('Content-Type: application/json');
        echo $json = json_encode($datos);
    }

    private function _listarBusquedaPublicaciones() {

        $arrayPost = $this->getPost(array('listar', 'buscar', 'categoriaSel', 'orden', 'pag'), array('pag'));
        if (!empty($arrayPost)) {

            Session::set(BUSCAR, $arrayPost["buscar"]);
            Session::set("categoria", $arrayPost["categoriaSel"]);
            Session::set("orden", $arrayPost["orden"]);
            Session::set("pag", $arrayPost["pag"]);
            echo true;
        } else if (Session::get(BUSCAR) && Session::get("categoria")) {

            $sql = $this->objController(Session::get(TIPO_USER));
            $datos = array();


            if (isset($_POST["subCategoriaSel"]) && !empty($_POST["subCategoriaSel"])) {
                $datos = PublicacionesController::_listarPublicaciones($sql, $_POST["categoriaSel"], $_POST["subCategoriaSel"], $_POST["orden"], $_POST["pag"]);
            } else {

                $datos = PublicacionesController::_listarPublicaciones($sql, Session::get("categoria"), Session::get("orden"), Session::get("pag"));
            }

//            print_r($datos);
            if ($datos != 0) {
                $buscador = array(0 => Session::get(BUSCAR), 1 => Session::get("categoria"));
                $datos["buscador"] = $buscador;
            } else {
                $datos = null;
                $datos["buscador"] = array(0 => Session::get(BUSCAR), 1 => Session::get("categoria"));
//                print_r($datos);
            }

            Session::destroy(BUSCAR);
            Session::destroy("categoria");
            Session::destroy("orden");
            Session::destroy("pag");

            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _listarAnuncios() {
        $arrayPost = $this->getPost(array('listar', 'categoriaSel', 'orden', 'pag'), array('categoriaSel', 'pag'));
        if (!empty($arrayPost)) {
            $this->_anuncios($arrayPost);
        }
        echo false;
    }

    private function _anuncios($array) {
        $arrayPost = $this->getPost(array("subCategoriaSel"));
        if (!empty($arrayPost)) {

            $datos = AnunciosController::_listarAnuncios($array['orden'], CategoriasController::_getIDCategoria($array['categoriaSel']), $array['pag'], $arrayPost["subCategoriaSel"]);
        } else {
            $datos = AnunciosController::_listarAnuncios($array['orden'], CategoriasController::_getIDCategoria($array['categoriaSel']), $array['pag']);
        }

        header('Content-Type: application/json');
        echo $json = json_encode($datos);
    }

    private function _listarLineaAnuncio() {
        $arrayPost = $this->getPost(array('editar', 'id'));

        if (!empty($arrayPost)) {
            Session::set("id", $arrayPost["id"]);
            echo true;
        }
        echo false;
    }

    private function _listarJornadas() {
        $arrayPost = $this->getPost(array('listar', 'jornadas'));
        if (!empty($arrayPost)) {
            $datos = JornadasController::_getJornadas();
            header('Content-Type: application/json');
            echo $json = json_encode($datos);
        }
        echo false;
    }

    /**
     * Funciones para editar
     */
    private function _controladorEditar() {
        switch ($this->controlador) {
            case 'lineaAnuncio':
                $this->_lineaAnuncio();
                break;
            case 'anuncio':
                $this->_editarAnuncio();
                break;
            case 'ficheros':
                $this->_subirFicherosEditados();
                break;
        }
    }

    private function _lineaAnuncio() {
        if (!empty($this->getPostSingle($_POST['editar'])) && !is_null(Session::get("id"))) {
            $datos = AnunciosController::_editarLineaAnuncioM();
            if (!is_null($datos)) {
                header('Content-Type: application/json');
                echo $json = json_encode($datos);
            }
        }
        echo false;
    }

    private function _editarAnuncio() {

        if (Session::get(TIPO_USER) == ALUMNOS && $_POST['categoria'] == CURSOS) {
            $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion'));
            if (!empty($arrayPost)) {
                $arrayPost['categoriaSel'] = json_encode(array(AlumnosController::_getCursoAlumno(Session::get(MAIL))));
            }
        } else {
            $arrayPost = $this->getPost(array('titulo', 'descripcion', 'categoria', 'fechaPublicacion', 'categoriaSel'));
        }

        if (!empty($arrayPost)) {
            $valor = AnunciosController::_editarAnuncio($arrayPost["titulo"], $arrayPost["descripcion"], CategoriasController::_getIDCategoria($arrayPost["categoria"]), $arrayPost['categoriaSel'], $arrayPost["fechaPublicacion"]);
            header('Content-Type: application/json');
            $datos = array("datos" => $valor);
            echo $json = json_encode($datos);
        }
        echo false;
    }

    private function _subirFicherosEditados() {
        if (isset($_FILES["imagenes"]) || isset($_FILES["pdf"]) && isset($_POST["categoria"])) {
            echo AnunciosController::_comprobarFicherosEditar($_FILES["imagenes"], $_FILES["pdf"], $_POST["categoria"]);
        }
    }

    /**
     * Funciones para eliminar
     */
    private function _controladorElimnar() {
        switch ($this->controlador) {
            case 'anuncio':
                $this->_eliminarAnuncio();
                break;
//            case 'archivos':
//                $this->_eliminarArchivos();
//                break;
        }
    }

    private function _eliminarAnuncio() {

        $arrayPost = $this->getPost(array('eliminar', 'id'));
        if (!empty($arrayPost)) {
            AnunciosController::_eliminarAnuncio($arrayPost['id']);
        }
        echo false;
    }

    public function _getAccion() {
        return $this->accion;
    }

    public function _getControlador() {
        return $this->controlador;
    }

}
