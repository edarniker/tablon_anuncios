<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;

/**
 * Description of Model
 *
 * @author Edward
 */
class Model extends Conexion{
   
    //put your code here
    protected static $dbh;
   


    protected static function singleton_conexion() {
         self::$dbh= parent::singleton_conexion();
    }
  
    /**
     * 
     * @param type $sql
     */
    protected function preparar($sql) {
        self::$dbh=parent::preparar($sql);
    }
    
   
    protected function cerrar_conexion() {       
        self::$dbh= parent::cerrar_conexion();
    }

    
    
    

}
