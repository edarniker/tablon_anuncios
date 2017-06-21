<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controllers;

/**
 * Description of usuarioController
 *
 * @author Edward
 */
use Models\JornadasModel;
use Config\Session;

class JornadasController extends \Config\Controller {

    //put your code here

    public function index() {
         header('location:' . BASE_URL . "error");
    }

 
    public static function _getJornadaNombre($codigo){
           return JornadasModel::getJornadaNombreM($codigo);
    }
    
    
    public static function _getJornadaCod($nombre){
           return JornadasModel::getJornadaCodM($nombre);
    }
    
     public static function _getJornadas(){
           return JornadasModel::getJornadasM();
    }
    
    

}
